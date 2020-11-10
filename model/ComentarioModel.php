<?php class ComentarioModel extends EntidadBase{
    private $id;
    private $id_publicacion;
    private $id_usuario;
    private $id_usuario_respuesta;
    private $texto;
    
    public function __construct() {
        $table="vd_publicaciones_comentarios";
        parent::__construct($table);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getIdPublicacion() {
        return $this->id_publicacion;
    }

    public function setIdPublicacion($id_publicacion) {
        $this->id_publicacion = $id_publicacion;
    }
    
    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }
    
    public function getIdUsuarioRespuesta() {
        return $this->id_usuario_respuesta;
    }

    public function setIdUsuarioRespuesta($id_usuario_respuesta) {
        $this->id_usuario_respuesta = $id_usuario_respuesta;
    }
    
    public function getTexto() {
        return $this->texto;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function getComentariosPublicacion($id_publicacion){
        $query=$this->db()->query("SELECT * FROM vd_publicaciones_comentarios WHERE id_publicacion='$id_publicacion' ORDER BY id DESC");

        while($row = $query->fetch_object())
           $resultSet[] = (array)$row;
        
        return isset($resultSet) ? $resultSet : NULL;
    }
} ?>