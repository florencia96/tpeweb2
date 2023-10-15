<?php
require_once "controller/NoticiaController.php";
require_once "controller/SeccionController.php";
require_once "controller/UserController.php";
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');



// lee la acción
if (!empty($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'noticias';     // acción por defecto si no envían

$params = explode('/', $action);

$noticiaController = new NoticiaController();
$seccionController = new SeccionController();
$userController = new UserController();

switch ($params[0]) {
    case 'noticias':
        //Verificacion para que no pasen parametros extra por la url
        if (!isset($params[1]))
            $noticiaController->showHome($params);
        else
            $noticiaController->showHome();
        break;

    case 'noticia':
        if (isset($params[1]) && isset($params[2]))
            $noticiaController->filterArticle($params[1], $params[2]);
        else
        $seccionController->redirectHome();
        break;

    case 'secciones':
        if (!isset($params[1]))
            $seccionController->showSections();
        else
            $seccionController->redirectHome();
        break;

    case 'detalle':
        if (isset($params[2], $params[1]))
            $seccionController->filterSection($params[2], $params[1]);
        else
            $seccionController->redirectHome();
        break;

    case 'login':
        $userController->showLogin();
        break;

    case 'logout':
        $userController->logOut();
        break;

    case 'verify':
        $userController->verifyLogin();
        break;

    case 'registro':
        $userController->showRegistro();
        break;

    case 'signup':
        $userController->registrarUsuario();
        break;

    case 'modifyrol':
        if (isset($params[1])){
           $userController->modifyRol($params[1]); 
        }
        
    case 'panel':
        $userController->showPanel();
        break;
     case 'borrarusuario':
            $userController->borrarUsuario($params[1]);
            break;
        //   ------------------------------VISTA AGREGAR SECCION NOTICIA------------------------------------------------

    case 'agregarnoticia':
        $noticiaController->formArticle();
        break;
    case 'agregarseccion':
        $seccionController->formSection();
        break;
        //   ------------------------------AGREGAR NOTICIA SECCION------------------------------------------------
    case 'agregar-noticia':
        $noticiaController->addArticle();
        break;

    case 'agregar-seccion':
        $seccionController->addSection();
        break;
        //   ------------------------------EDITAR BORRAR NOTICIA------------------------------------------------
    case 'tablanoticias':
        $noticiaController->showTableOfArticles();
        break;

    case 'borrarnoticia':
        if (isset($params[1]))
            $noticiaController->deleteArticle($params[1]);
     
        break;

    case 'editarnoticia':
        if (isset($params[1])) {
            $noticiaController->editArticle($params[1]);
        } else
            $noticiaController->redirectHome();
        break;
        //   ------------------------------EDITAR BORRAR SECCION------------------------------------------------
    case 'tablasecciones':
        $seccionController->showTableOfSections();
        break;

    case 'borrarseccion':
        if (isset($params[1]))
            $seccionController->deleteSection($params[1]);
        else
            $seccionController->redirectHome();
        break;

    case 'editarseccion':
        if (isset($params[1]))
            $seccionController->editSection($params[1]);
        else
            $seccionController->redirectHome();
        break;
        //   ------------------------------AGREGAR NOTICIA SECCION------------------------------------------------

    case 'agregarnoticia':
        $noticiaController->formArticle();
        break;
    case 'agregarseccion':
        $seccionController->formSection();
        break;


    default:
        echo "404 NOT FOUND";
        break;
}
