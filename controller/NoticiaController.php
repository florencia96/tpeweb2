<?php
require_once "helpers/AuthHelper.php";
require_once "model/NoticiaModel.php";
require_once "model/SeccionModel.php";
require_once "view/NoticiaView.php";
require_once "view/UserView.php";
class NoticiaController
{
    private $model;
    private $view;
    private $view_user;
    private $helper;
    private $model_seccion;

    public function __construct()
    {
        $this->model = new NoticiaModel();
        $this->view = new NoticiaView();
        $this->helper = new AuthHelper();
        $this->model_seccion = new SeccionModel();
        $this->view_user = new UserView();
    }

    public function showHome()
    {
        $noticias = $this->model->getArticle();
        $this->view->showHome($noticias);
    }


    public function filterArticle($titulo_noticia, $id_noticia)
    {
        $titulo_con_espacios = str_replace('-', ' ', $titulo_noticia);
        $secciones = $this->model->filterArticle($id_noticia, $titulo_con_espacios);
        if (!empty($secciones))
            $this->view->renderArticle($secciones, $titulo_con_espacios);
        else
            $this->view->showHomeLocation();
    }
    //MUESTRA FORMULARIO AGREGAR NOTICIA
    public function formArticle()
    {
        $isAdmin = $this->helper->checkLoggedIn();
        $this->view->FormAddArticle("",$isAdmin);
    }
    //AGREGAR NOTICIA
    public function addArticle()
    {

          $isAdmin = $this->helper->checkLoggedIn();
          
            if (!empty($_POST['titulo']) && !empty($_POST['autor'])) {
                $this->model->addArticle($_POST['titulo'], $_POST['autor']);
                $this->view->showLocationToAddFormArticle();
          
        }else{
           $this->view->formAddArticle("faltan completar campos",$isAdmin);
    }
}
    //TABLA EDITAR Y BORRAR NOTICIA
    public function showTableOfArticles()
    {
        $isAdmin = $this->helper->checkLoggedIn();
        $tablaNoticias = $this->model->getTableArticle();
        $this->view->renderTableArticles($isAdmin, $tablaNoticias);
    }
    //borrar noticia
    public function deleteArticle($id_noticia)
    {
        $isAdmin = $this->helper->checkLoggedIn();
        if ($isAdmin == true) {
            $seccionesAsociados = $this->model_seccion->searchIdArticleByTableSections($id_noticia);
         
            if (count($seccionesAsociados) == 0) {
                $this->model->deleteArticle($id_noticia);
                $this->view->renderTableOfLocationArticles();
            } else {

                $tablaNoticias =  $this->model->getTableArticle();
                $this->view->renderTableArticles($isAdmin, $tablaNoticias, "El noticia seleccionado no se puede borrar porque tiene asociados secciones");
            }
        } else {
            $this->view_user->renderLogin();
        }
    }
    public function editArticle($id_noticia)
    {
        $isAdmin = $this->helper->checkLoggedIn();
        if ($isAdmin == true) {
            $this->model->editArticle($_POST['titulo'], $_POST['autor'], $id_noticia);
            $this->view->renderTableOfLocationArticles();
        } else {
            $this->view_user->renderLogin();
        }
    }
}
