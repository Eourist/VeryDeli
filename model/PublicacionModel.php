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
    private $estado;
    
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
    
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function modificacion(){
        $query= "UPDATE vd_publicaciones SET 
            id_usuario              = '$this->id_usuario', 
            id_direccion_origen     = '$this->id_direccion_origen', 
            id_direccion_destino    = '$this->id_direccion_destino', 
            tipo_vehiculo           = '$this->tipo_vehiculo', 
            titulo                  = '$this->titulo', 
            fecha_salida            = '$this->fecha_salida', 
            hora_salida             = '$this->hora_salida', 
            peso                    = '$this->peso', 
            medida_alto             = '$this->medida_alto', 
            medida_largo            = '$this->medida_largo', 
            medida_ancho            = '$this->medida_ancho', 
            descripcion             = '$this->descripcion', 
            fecha                   = '$this->fecha', 
            estado                  = '$this->estado' 
            WHERE id = $this->id";
        return $this->db()->query($query);
    }

    public function cambiarEstado($id_publicacion, $estado){
        $query= "UPDATE vd_publicaciones SET estado = '$estado' WHERE id = $id_publicacion";
        return $this->db()->query($query);
    }

    public function desactivarPostulacionesPublicacion($id_publicacion){
        $query = "UPDATE vd_publicaciones_postulaciones SET estado = 2 WHERE vd_publicaciones_postulaciones.id_publicacion = $id_publicacion";
        return $this->db()->query($query);
    }

    public function getPublicacionesFiltro($filtro){
        $query =   "SELECT DISTINCT publicacion.*
                    FROM vd_publicaciones publicacion 
                        JOIN vd_direcciones ubi ON publicacion.id_direccion_origen = ubi.id
                                                OR publicacion.id_direccion_destino = ubi.id
                    ".$filtro;
        $query = $this->db()->query($query);

        while($row = $query->fetch_object())
           $resultSet[] = $row;
        
        return isset($resultSet) ? $resultSet : NULL;
    }
} ?>