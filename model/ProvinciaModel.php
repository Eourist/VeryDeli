<?php class ProvinciaModel extends EntidadBase{
    private $id;
    private $nombre;
    
    public function __construct() {
        $table="vd_direcciones_provincias";
        parent::__construct($table);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
} ?>