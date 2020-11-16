<?php class EnvioModel extends EntidadBase{
    private $id;
    private $id_postulacion;

    private $confirmacion_solicitante;
    private $confirmacion_responsable;

    private $calificacion_solicitante;
    private $calificacion_responsable;

    private $comentario_solicitante;
    private $comentario_responsable;
    
    public function __construct() {
        $table="vd_envios";
        parent::__construct($table);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getIdPostulacion() {
        return $this->id_postulacion;
    }

    public function setIdPostulacion($id_postulacion) {
        $this->id_postulacion = $id_postulacion;
    }
    
    public function getConfirmacionSolicitante() {
        return $this->confirmacion_solicitante;
    }

    public function setConfirmacionSolicitante($confirmacion_solicitante) {
        $this->confirmacion_solicitante = $confirmacion_solicitante;
    }
    
    public function getCalificacionSolicitante() {
        return $this->calificacion_solicitante;
    }

    public function setCalificacionSolicitante($calificacion_solicitante) {
        $this->calificacion_solicitante = $calificacion_solicitante;
    }
    
    public function getComentarioSolicitante() {
        return $this->comentario_solicitante;
    }

    public function setComentarioSolicitante($comentario_solicitante) {
        $this->comentario_solicitante = $comentario_solicitante;
    }
    
    public function getConfirmacionResponsable() {
        return $this->confirmacion_responsable;
    }

    public function setConfirmacionResponsable($confirmacion_responsable) {
        $this->confirmacion_responsable = $confirmacion_responsable;
    }
    
    public function getCalificacionResponsable() {
        return $this->calificacion_responsable;
    }

    public function setCalificacionResponsable($calificacion_responsable) {
        $this->calificacion_responsable = $calificacion_responsable;
    }
    
    public function getComentarioResponsable() {
        return $this->comentario_responsable;
    }

    public function setComentarioResponsable($comentario_responsable) {
        $this->comentario_responsable = $comentario_responsable;
    }

    public function alta(){
        $query = "INSERT INTO vd_envios (id, id_postulacion, confirmacion_solicitante, confirmacion_responsable, calificacion_solicitante, calificacion_responsable, comentario_solicitante, comentario_responsable) VALUES (
            NULL,
            '".$this->id_postulacion."', 
            '".$this->confirmacion_solicitante."', 
            '".$this->confirmacion_responsable."', 
            '".$this->calificacion_solicitante."', 
            '".$this->calificacion_responsable."', 
            '".$this->comentario_solicitante."', 
            '".$this->comentario_responsable."'
        );";
        return $this->db()->query($query);
    }

    public function modificacion($id_envio, $data){
        $query = "UPDATE `vd_envios` SET ";

        foreach ($data as $key => $value)
            $query .= $key." = '".$value."', ";
        $query = substr($query, 0, -2);

        $query .= " WHERE id = $id_envio";
        // echo $query; exit();
        return $this->db()->query($query);
    }
    
} ?>