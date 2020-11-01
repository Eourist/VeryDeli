<?php class PublicacionModel extends EntidadBase{
    private $id;
    private $id_usuario;
    private $id_direccion_origen;
    private $id_direccion_destino;
    private $tipo_vehiculo;
    private $titulo;
    private $fecha_salida;
    private $hora_salida;
    private $peso;
    private $medida_ancho;
    private $medida_alto;
    private $medida_profundo;
    private $descripcion;
    
    public function __construct() {
        $table="vd_publicaciones";
        parent::__construct($table);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }
    
    public function getIdDireccionOrigen() {
        return $this->id_direccion_origen;
    }

    public function setIdDireccionOrigen($id_direccion_origen) {
        $this->id_direccion_origen = $id_direccion_origen;
    }
    
    public function getIdDireccionDestino() {
        return $this->id_direccion_destino;
    }

    public function setIdDireccionDestino($id_direccion_destino) {
        $this->id_direccion_destino = $id_direccion_destino;
    }
    
    public function getTipoVehiculo() {
        return $this->tipo_vehiculo;
    }

    public function setTipoVehiculo($tipo_vehiculo) {
        $this->tipo_vehiculo = $tipo_vehiculo;
    }
    
    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    
    public function getFechaSalida() {
        return $this->fecha_salida;
    }

    public function setFechaSalida($fecha_salida) {
        $this->fecha_salida = $fecha_salida;
    }
    
    public function getHoraSalida() {
        return $this->hora_salida;
    }

    public function setHoraSalida($hora_salida) {
        $this->hora_salida = $hora_salida;
    }
    
    public function getPeso() {
        return $this->peso;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }
    
    public function getMedidaAlto() {
        return $this->medida_alto;
    }

    public function setMedidaAlto($medida_alto) {
        $this->medida_alto = $medida_alto;
    }

    public function getMedidaLargo() {
        return $this->medida_largo;
    }

    public function setMedidaLargo($medida_largo) {
        $this->medida_largo = $medida_largo;
    }
    
    public function getMedidaAncho() {
        return $this->medida_ancho;
    }

    public function setMedidaAncho($medida_ancho) {
        $this->medida_ancho = $medida_ancho;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
} ?>