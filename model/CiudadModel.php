<?php class CiudadModel extends EntidadBase{
    private $id;
    private $id_provincia;
    private $nombre;
    
    public function __construct() {
        $table="vd_direcciones_ciudades";
        parent::__construct($table);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getIdProvincia() {
        return $this->id_provincia;
    }

    public function setIdProvincia($id_provincia) {
        $this->id_provincia = $id_provincia;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
} ?>