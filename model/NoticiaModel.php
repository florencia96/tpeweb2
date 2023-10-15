<?php

class NoticiaModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=eclipse;charset=utf8', 'root', '');
    }

    public function __destruct()
    {
        $this->db = null;
    }

    
    //PARA LA VISTA PRINCIPAL, Y PARA EL SELECT
    function getArticle()
    {
        $sentencia = $this->db->prepare('SELECT titulo, autor, id_noticia FROM noticia');
        $sentencia->execute(array());
        $noticias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $noticias;
    }
    // -------------------------------------MOSTRAR TABLAS----------------------------------------
    function getTableArticle()
    {
        $sentencia = $this->db->prepare('SELECT * FROM noticia');
        $sentencia->execute(array());
        $tablaNoticias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $tablaNoticias;
    }
  


    public function filterArticle($id_noticia, $titulo_noticia)
    {
        $sentencia = $this->db->prepare("SELECT seccion.tipo, noticia.id_noticia, seccion.id_seccion FROM noticia INNER JOIN seccion
                                            ON noticia.id_noticia = seccion.id_noticia WHERE noticia.id_noticia = ? AND noticia.titulo = ?");
        $sentencia->execute(array($id_noticia, $titulo_noticia));

        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getTableSections($id, $titulo)
    {
        $sentencia = $this->db->prepare('SELECT titulo, id_noticia FROM noticia WHERE id_noticia= ? AND titulo = ? ');
        $sentencia->execute(array($id, $titulo));
        $noticias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $noticias;
    }

    //   ------------------------------AGREGAR NOTICIA---------------------------------------------
    //AGREGAR NOTICIA

    function addArticle($titulo, $autor)
    {
        $sentencia = $this->db->prepare("INSERT INTO noticia(titulo,autor) VALUES(?,?)");
        $sentencia->execute(array($titulo, $autor));
    }



    //   ------------------------------EDITAR BORRAR NOTICIA----------------------------------------------       

    // buscarIdNoticiaEnTablaseccion
    public function searchIdArticleByTableSections($id_noticia)
    {
        $sentencia = $this->db->prepare("SELECT id_noticia FROM 'seccion' WHERE id_noticia=?");
        $sentencia->execute(array($id_noticia));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    //BORRAR Noticia
    public function deleteArticle($id_noticia)
    {
        $sentencia = $this->db->prepare("DELETE FROM noticia WHERE id_noticia=?");
        $sentencia->execute(array($id_noticia));
    }
    //EDITAR NOTICIA
    public function editArticle($titulo, $autor, $id_noticia)
    {
        $sentencia = $this->db->prepare("UPDATE `noticia` SET `titulo`=?,`autor`=?WHERE `id_noticia`=?");
        $sentencia->execute(array($titulo, $autor, $id_noticia));
    }
}
