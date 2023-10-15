<?php

class seccionModel
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

        //----------Secciones POR id----------
    public function getSectionById($id_seccion)
    {
        $sentencia = $this->db->prepare("SELECT * FROM seccion WHERE id_seccion = ?");
        $sentencia->execute(array($id_seccion));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    
    public function getSection()
    {
        $sentencia = $this->db->prepare("SELECT tipo, id_seccion FROM seccion");
        $sentencia->execute(array());
        $secciones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $secciones;
    }

     function getSections()
    {
        $sentencia = $this->db->prepare("SELECT * FROM seccion");
        $sentencia->execute(array());
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

   function searchForMatches($id_noticia, $tipo){
    {
        $sentencia = $this->db->prepare('SELECT tipo, id_noticia FROM seccion WHERE id_noticia = ? AND tipo = ?');    
        $sentencia->execute(array($id_noticia, $tipo));
        $noticias = $sentencia->fetch(PDO::FETCH_OBJ);
        return  $noticias;
    }
   }
        //-----------------------INSERTAR SECCION ------------------------------------------------     

    function  addSection($tipo, $descripcion, $orden, $id_noticia)
    {
        $sentencia = $this->db->prepare("INSERT INTO seccion(tipo,descripcion,orden,id_noticia) VALUES(?,?,?,?)");
        $sentencia->execute(array($tipo, $descripcion, $orden, $id_noticia));

    }
        function getTableOfSections()
    {
        $sentencia = $this->db->prepare('SELECT * FROM seccion');
        $sentencia->execute(array());
        $tablaSecciones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $tablaSecciones;
    }

        //   ------------------------------EDITAR BORRAR SECCIONES----------------------------------------------       

    //BORRAR SECCION
    public function deleteSection($id_seccion)
    {
        $sentencia = $this->db->prepare("DELETE FROM seccion WHERE id_seccion=?");
        $sentencia->execute(array($id_seccion));
    }

    public function editSection($tipo, $descripcion, $orden, $id_noticia, $id_seccion)
    {
        $sentencia = $this->db->prepare("UPDATE `seccion` SET `tipo`=?,`descripcion`=?,`orden`=?,`id_noticia`=? WHERE `id_seccion`=?");
        $sentencia->execute(array($tipo, $descripcion, $orden, $id_noticia, $id_seccion));
    }
    // buscarIdNoticiaEnTablaSeccion
    public function searchIdArticleByTableSections($id_noticia)
    {
        $sentencia = $this->db->prepare("SELECT id_noticia FROM `seccion` WHERE id_noticia=?");
        $sentencia->execute(array($id_noticia));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
      
    }
 
}
