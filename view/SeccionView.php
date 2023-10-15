<?php


require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class SeccionView
{

    private $smarty;
  

    public function __construct()
    {
        $this->smarty = new Smarty();

    }


    public function renderSection($id_seccion)
    {
        $this->smarty->assign('seccion', $id_seccion);
        $this->smarty->display("templates/detalle.tpl");
    }



    //   --------------------------FORMULARIO---------------------------------------
    //   -------------------VISTAS AGREGAR-----------------------------------

    //VISTA FORMULARIO PARA INGRESAR SECCION ->ESTAN LOS NOTICIAS PARA EL SELECT.
    public function renderFormSection($noticias,$isAdmin)
    {
        $this->smarty->assign('noticias', $noticias);
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->display("templates/ingresaseccion.tpl");
    }
    
    public function showLocationToAddFormSections()
    {
        header("Location: " . BASE_URL . "agregarseccion");
    }

    //   -----------------------------VISTA TABLAS SECCION----------------------------------------
    public function renderTableSections($tablasSecciones,$isAdmin)
    {
        
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->assign('tablaSecciones', $tablaSecciones);
    
        $this->smarty->display("templates/editarborrarseccion.tpl");
    }

    //   ----------------------------location seccion----------------------------------------    
    public function renderTableOfLocationSections()
    {
        header("Location: " . BASE_URL . "tablasecciones");
    }

    public function showHome()
    {
        header("Location: " . BASE_URL . "noticias");
    }

    public function renderSections($secciones, $mostrarTodo = true)
    {
        $this->smarty->assign('secciones', $secciones);
        $this->smarty->assign('mostrarTodo', $mostrarTodo);
        $this->smarty->display("templates/secciones.tpl");
    }
}
