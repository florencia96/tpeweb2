<?php
require_once "helpers/AuthHelper.php";
require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class NoticiaView {

    private $smarty;
 

    public function __construct() {
        $this->smarty = new Smarty();
        $this->helper = new AuthHelper();
        $this->smarty->assign('mostrarTodo', true);
        $this->smarty->assign('titulo_noticia', "");
      
    }

    public function showHome($noticias=""){
        $this->smarty->assign('noticias', $noticias);
        $this->smarty->display('templates/noticias.tpl');
    }

    public function renderArticle($secciones, $titulo = ""){
        $this->smarty->assign('secciones', $secciones);
        $this->smarty->assign('titulo_noticia', $titulo);
        $this->smarty->display('templates/secciones.tpl');
    }


    //   -------------------------------FORMULARIO---------------------------------------
    //   -------------------VISTAS AGREGAR-----------------------------------
    //vista noticia
    public function formAddArticle($aviso="",$isAdmin=""){
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->assign('aviso', $aviso);
        $this->smarty->display("templates/ingresanoticia.tpl");
    }

    

     //   -----------------------------VISTA TABLAS noticia----------------------------------------
     public function renderTableArticles($isAdmin,$tablaNoticias,$aviso=""){
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->assign('tablaNoticias', $tablaNoticias);
      
        $this->smarty->assign('aviso', $aviso);
   
        $this->smarty->display("templates/editarborrarnoticia.tpl");
    }
      //   ----------------------------location noticias----------------------------------------    
    public function renderTableOfLocationArticles(){
        header("Location: ".BASE_URL."tablanoticias");
    }


//   ----------------------------location----------------------------------------      
    public function showHomeLocation(){
        header("Location: ".BASE_URL."noticias");
    }

    public function showLocationToAddFormArticle(){

        header("Location: ".BASE_URL."agregarnoticia");   
    }

   

}