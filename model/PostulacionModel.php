<?php class PostulacionModel extends EntidadBase{
    private $id;
    private $id_usuario;
    private $id_publicacion;
    private $id_vehiculo;
    private $precio;
    
    public function __construct() {
        $table="vd_publicaciones_postulaciones";
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
    
    public function getIdPublicacion() {
        return $this->id_publicacion;
    }

    public function setIdPublicacion($id_publicacion) {
        $this->id_publicacion = $id_publicacion;
    }
    
    public function getIdVehiculo() {
        return $this->id_vehiculo;
    }

    public function setIdVehiculo($id_vehiculo) {
        $this->id_vehiculo = $id_vehiculo;
    }
    
    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getDatosPostulantesPublicacion($id_publicacion){
        $query = $this->db()->query("SELECT COUNT(*) AS cantidad, MIN(precio) as precio_minimo FROM vd_publicaciones_postulaciones WHERE id_publicacion=$id_publicacion AND estado != 2");

        if($row = $query->fetch_object())
         $resultSet = (array)$row;

        return isset($resultSet) ? $resultSet : NULL;
    }

    public function getPostulantesPostulacion($id_publicacion){
        $query = $this->db()->query("
            SELECT  usu.id id_usuario, 
                    usu.nombre nombre_usuario, 
                    usu.avatar avatar_usuario, 
                    pos.id id_postulacion, 
                    pos.fecha fecha_postulacion, 
                    pos.precio precio_postulacion, 
                    veh.id id_vehiculo, 
                    veh.tipo tipo_vehiculo, 
                    veh.marca marca_vehiculo, 
                    veh.modelo modelo_vehiculo, 
                    veh.patente patente_vehiculo
            FROM vd_publicaciones_postulaciones pos 
                JOIN vd_publicaciones pub ON pos.id_publicacion = pub.id
                JOIN vd_usuarios usu ON pos.id_usuario = usu.id
                JOIN vd_usuarios_vehiculos veh ON pos.id_vehiculo = veh.id
            WHERE pub.id = ".$id_publicacion." AND pos.estado != 2 ORDER BY pos.precio ASC");

        while($row = $query->fetch_object())
           $resultSet[] = (array)$row;
        
        return isset($resultSet) ? $resultSet : NULL;
    }

    public function getPostulacionUsuarioPublicacion($id_usuario, $id_publicacion){
        $query = $this->db()->query("SELECT * FROM vd_publicaciones_postulaciones WHERE id_usuario=$id_usuario AND id_publicacion = $id_publicacion AND estado != 2");

        if($row = $query->fetch_object())
           $resultSet = (array)$row;

        return isset($resultSet) ? $resultSet : NULL;
    }

    public function cambiarEstado($id_postulacion, $estado){
        $query= "UPDATE vd_publicaciones_postulaciones SET estado = '$estado' WHERE id = $id_postulacion";
        return $this->db()->query($query);
    }

    public function modificacion($id_postulacion, $data){
        $query = "UPDATE `vd_publicaciones_postulaciones` SET ";

        foreach ($data as $key => $value)
            $query .= $key." = '".$value."', ";
        $query = substr($query, 0, -2);

        $query .= " WHERE id = $id_postulacion";
        // echo $query; exit();
        return $this->db()->query($query);
    }
} ?>