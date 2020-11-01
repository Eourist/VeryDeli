<?php class DireccionModel extends EntidadBase{
    private $id;
    private $id_provincia;
    private $id_ciudad;
    private $calle;
    private $numero;
    private $piso;
    private $depto;
    private $descripcion;
    
    public function __construct() {
        $table="vd_direcciones";
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
    
    public function getIdCiudad() {
        return $this->id_ciudad;
    }

    public function setIdCiudad($id_ciudad) {
        $this->id_ciudad = $id_ciudad;
    }
    
    public function getCalle() {
        return $this->calle;
    }

    public function setCalle($calle) {
        $this->calle = $calle;
    }
    
    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }
    
    public function getPiso() {
        return $this->piso;
    }

    public function setPiso($piso) {
        $this->piso = $piso;
    }
    
    public function getDepto() {
        return $this->depto;
    }

    public function setDepto($depto) {
        $this->depto = $depto;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
} ?>