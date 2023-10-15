<?php
require_once "model/SeccionModel.php";
require_once "view/SeccionView.php";
require_once "helpers/AuthHelper.php";
require_once "model/NoticiaModel.php";
require_once "view/UserView.php";
//Section=seccion 
class SeccionController
{
    private $model;
    private $view;
    private $view_user;
    private $helper;
    private $noticia_model;

    public function __construct()
    {
        $this->model = new SeccionModel();
        $this->noticia_model = new NoticiaModel();
        $this->view = new SeccionView();
        $this->view_user = new UserView();
        $this->helper = new AuthHelper();
    }
    //filtrar secciones
    public function filterSection($id_seccion, $tipo)
    {
        if (isset($id_seccion, $tipo))
            if ($this->model->getSectionById($id_seccion)) {
                $seccion = $this->model->getSectionById($id_seccion);
                $this->view->renderSection($id_seccion);
                
            } else
                $this->redirectHome();
        else
            $this->redirectHome();
    } 



    //MOSTRAR FORMULARIO INSERTAR SECCION
    public function formSection()
    {

        $isAdmin = $this->helper->checkLoggedIn();
        $noticias = $this->noticia_model->getArticle();
        $this->view->renderFormSection($noticias, $isAdmin);
    }


    //AGREGAR SECCION
    public function addSection()
    {

        if (isset($_POST['tipo'], $_POST['descripcion'], $_POST['orden'], $_POST['id_noticia'])) {
            if (!$this->searchForMatches())
                $this->model->addSection($_POST['tipo'], $_POST['descripcion'], $_POST['orden'], $_POST['id_noticia']);
            $this->view->showLocationToAddFormSections();
        }
    }
    //buscamos si hay coincidencias (una noticia que tenga esa seccion)
    private function searchForMatches()
    {
        $noticia = $this->model->searchForMatches($_POST['id_noticia'], $_POST['tipo']);
        return !empty($noticia);
    }
    //MOSTRAR SECCIONES
    public function showSections()
    {
        $secciones = $this->model->getSections();
        $this->view->renderSections($secciones, false);
    }

    //   ------------------------------EDITAR BORRAR SECCIONES----------------------------------------------

    //MOSTRAR TABLA BORRAR EDITAR SECCIONES

    public function showTableOfSections()
    {

        $isAdmin = $this->helper->checkLoggedIn();
        $tablasSecciones = $this->model->getTableOfSections();
        $this->view->renderTableSections($tablasSecciones, $isAdmin);
    }
    //   BORRAR SECCION
    public function deleteSection($id)
    {
        $isAdmin = $this->helper->checkLoggedIn();
        if ($isAdmin == true) {
            $this->model->deleteSection($id);
            $this->view->renderTableOfLocationSections();
        } else {
            $this->view_user->renderLogin();
        }
    }

    //EDITAR SECCION
    public function editSection($id_seccion)
    {
        $isAdmin = $this->helper->checkLoggedIn();
        if ($isAdmin == true) {
            $this->model->editSection($_POST['tipo'], $_POST['descripcion'], $_POST['orden'], $_POST['id_noticia'], $id_seccion);
            $this->view->renderTableOfLocationSections();
        } else {
            $this->view_user->renderLogin();
        }
    }
    public function redirectHome()
    {
        $this->view->showHome();
    }
}
