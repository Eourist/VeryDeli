<?php
class UsuarioModel extends EntidadBase{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $dni;
    private $contraseña;
    private $avatar;
    private $fecha_registro;
    
    public function __construct() {
        $table="vd_usuarios";
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

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getDNI() {
        return $this->dni;
    }

    public function setDNI($dni) {
        $this->dni = $dni;
    }

    public function getContraseña() {
        return $this->contraseña;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }
	
    public function save(){
		if($this->id){
			$query= "UPDATE vd_usuarios SET nombre = '$this->nombre', apellido = '$this->apellido', email = '$this->email', dni = '$this->dni', contraseña = '$this->contraseña', WHERE id = $this->id";
			$save=$this->db()->query($query);
			//$this->db()->error;
			return $save;
		}
		else{	
			$query= "INSERT INTO vd_usuarios (id, nombre, apellido, email, dni, contraseña) VALUES (NULL,'".$this->nombre."', '".$this->apellido."', '".$this->email."', '".$this->dni."', ".$this->contraseña.");";
			$save=$this->db()->query($query);
			//$this->db()->error;
			return $save;
		}	
    }

    public function alta(){
        $query = "INSERT INTO vd_usuarios (id, nombre, apellido, email, dni, contraseña, avatar) VALUES (
            NULL,
            '".$this->nombre."', 
            '".$this->apellido."', 
            '".$this->email."', 
            '".$this->dni."', 
            '".$this->contraseña."', 
            '".$this->avatar."'
        );";
        return $this->db()->query($query);
    }

    public function modificacion(){
        $query= "UPDATE vd_usuarios SET 
            nombre      = '$this->nombre', 
            apellido    = '$this->apellido', 
            email       = '$this->email',
            dni         = '$this->dni', 
            contraseña  = '$this->contraseña', 
            avatar      = '$this->avatar' 
            WHERE id = $this->id";
        return $this->db()->query($query);
    }

    public function baja(){ // testear
        $query = "DELETE FROM vd_usuarios WHERE id = ".$this->id;
        return $this->db()->query($query);
    }

    public function borrarTodos(){
        $query = "DELETE FROM vd_usuarios";
        $this->db()->query($query);
        return 0;
    }

    public function getDatosEnvios($id_usuario){
        $query = "SELECT 
                    ROUND(((solicitante.total_puntos+responsable.total_puntos) / (solicitante.cantidad+responsable.cantidad)),2) as promedio, 
                    ROUND((responsable.total_puntos/responsable.cantidad),2) as promedio_responsable, 
                    ROUND((solicitante.total_puntos/solicitante.cantidad),2) as promedio_solicitante, 
                    (responsable.cantidad) as cantidad_responsable, 
                    (solicitante.cantidad) as cantidad_solicitante,
                    (responsable.cantidad+solicitante.cantidad) as cantidad_total,
                    CASE
                        WHEN (responsable.cantidad+solicitante.cantidad) <= 5 THEN 'Normal'
                        WHEN ROUND(((solicitante.total_puntos+responsable.total_puntos) / (solicitante.cantidad+responsable.cantidad)),2)*20 < 20 THEN 'Pésima'
                        WHEN ROUND(((solicitante.total_puntos+responsable.total_puntos) / (solicitante.cantidad+responsable.cantidad)),2)*20 < 40 THEN 'Mala'
                        WHEN ROUND(((solicitante.total_puntos+responsable.total_puntos) / (solicitante.cantidad+responsable.cantidad)),2)*20 < 80 THEN 'Normal'
                        WHEN ROUND(((solicitante.total_puntos+responsable.total_puntos) / (solicitante.cantidad+responsable.cantidad)),2)*20 < 90 THEN 'Buena'
                        ELSE 'Excelente'
                    END as reputacion
                FROM
                    (SELECT IFNULL(COUNT(envios.calificacion_solicitante),0) as cantidad, IFNULL(SUM(envios.calificacion_solicitante),0) as total_puntos
                        FROM vd_envios envios
                            JOIN vd_publicaciones_postulaciones postulaciones ON envios.id_postulacion = postulaciones.id
                        WHERE postulaciones.id_usuario = $id_usuario
                    ) as responsable,
                    (SELECT IFNULL(COUNT(envios.calificacion_responsable),0) as cantidad, IFNULL(SUM(envios.calificacion_responsable),0) as total_puntos
                        FROM vd_envios envios
                            JOIN vd_publicaciones_postulaciones postulaciones ON envios.id_postulacion = postulaciones.id
                            JOIN vd_publicaciones publicaciones ON postulaciones.id_publicacion = publicaciones.id
                        WHERE publicaciones.id_usuario = $id_usuario
                    ) as solicitante";

        $query = $this->db()->query($query);

        if($row = $query->fetch_object())
            $resultSet = (array)$row;

        return isset($resultSet) ? $resultSet : NULL;
    }

    public function getPublicaciones($id_usuario){
        $query=$this->db()->query("SELECT vd_publicaciones.* FROM vd_publicaciones WHERE id_usuario = $id_usuario AND vd_publicaciones.estado != 2 ORDER BY vd_publicaciones.id DESC");

        while($row = $query->fetch_object())
            $resultSet[] = (array)$row;

        return isset($resultSet) ? $resultSet : NULL;
    }

    public function getPostulaciones($id_usuario){
        $query=$this->db()->query("SELECT vd_publicaciones.*, vd_publicaciones_postulaciones.id as id_postulacion FROM vd_publicaciones JOIN vd_publicaciones_postulaciones ON vd_publicaciones_postulaciones.id_publicacion = vd_publicaciones.id WHERE vd_publicaciones_postulaciones.id_usuario = $id_usuario AND vd_publicaciones_postulaciones.estado != 2 ORDER BY vd_publicaciones_postulaciones.id DESC");

        while($row = $query->fetch_object())
            $resultSet[] = (array)$row;

        return isset($resultSet) ? $resultSet : NULL;
    }

    public function getSolicitudes($id_usuario){
        // $query=$this->db()->query("SELECT * FROM vd_envios en JOIN vd_publicaciones_postulaciones po ON en.id_postulacion = po.id JOIN vd_publicaciones pu ON po.id_publicacion = pu.id WHERE po.id_usuario='$id_usuario'");

        // while($row = $query->fetch_object())
        //    $resultSet[] = (array)$row;
        
        // return isset($resultSet) ? $resultSet : NULL;
        $query=$this->db()->query("SELECT en.id as id_envio, po.id as id_postulacion, pu.id as id_publicacion, po.id_usuario as id_responsable, pu.id_usuario as id_solicitante, po.id_vehiculo as id_vehiculo FROM vd_envios en JOIN vd_publicaciones_postulaciones po ON en.id_postulacion = po.id JOIN vd_publicaciones pu ON po.id_publicacion = pu.id WHERE pu.id_usuario='$id_usuario' ORDER BY en.id DESC");

        while($row = $query->fetch_object())
            $resultSet[] = (array)$row;

        $enModel = new EnvioModel();
        $puModel = new PublicacionModel();
        $usModel = new UsuarioModel();
        $veModel = new VehiculoModel();
        $poModel = new PostulacionModel();
        //             envio.confirmaciones (2)
        //             envio.comentarios (2)
        //             envio.calificaciones (2)
        //             publicacion.titulo
        //             publicacion.id
        //             usuario.avatares (2)
        //             usuario.nombres (2)
        //             usuario.ids (2)
        if (isset($resultSet)){
            $data = array(); $i = 0;
            foreach ($resultSet as $r) {
                $data[$i]['envio']          = $enModel->getByIdAsArray($r['id_envio']);
                $data[$i]['publicacion']    = $puModel->getByIdAsArray($r['id_publicacion']);
                // $data[$i]['postulacion']    = $poModel->getByIdAsArray($r['id_postulacion']);
                $data[$i]['responsable']    = $usModel->getByIdAsArray($r['id_responsable']);
                $data[$i]['solicitante']    = $usModel->getByIdAsArray($r['id_solicitante']);
                // $data[$i]['vehiculo']       = $veModel->getByIdAsArray($r['id_vehiculo']);
                $i++;
            }
        }
        return isset($data) ? $data : NULL;
    }

    public function getTransportes($id_usuario){
        $query=$this->db()->query("SELECT en.id as id_envio, po.id as id_postulacion, pu.id as id_publicacion, po.id_usuario as id_responsable, pu.id_usuario as id_solicitante, po.id_vehiculo as id_vehiculo FROM vd_envios en JOIN vd_publicaciones_postulaciones po ON en.id_postulacion = po.id JOIN vd_publicaciones pu ON po.id_publicacion = pu.id WHERE po.id_usuario='$id_usuario' ORDER BY en.id DESC");

        while($row = $query->fetch_object())
            $resultSet[] = (array)$row;

        $enModel = new EnvioModel();
        $puModel = new PublicacionModel();
        $usModel = new UsuarioModel();
        $veModel = new VehiculoModel();
        $poModel = new PostulacionModel();

        if (isset($resultSet)){
            $data = array(); $i = 0;
            foreach ($resultSet as $r) {
                $data[$i]['envio']          = $enModel->getByIdAsArray($r['id_envio']);
                $data[$i]['publicacion']    = $puModel->getByIdAsArray($r['id_publicacion']);
                $data[$i]['responsable']    = $usModel->getByIdAsArray($r['id_responsable']);
                $data[$i]['solicitante']    = $usModel->getByIdAsArray($r['id_solicitante']);
                $i++;
            }
        }
        return isset($data) ? $data : NULL;
    }

    public function getPublicacionesDisponibles($id_usuario, $reputacion){
        // Devuelve el numero de publicaciones que le quedan al usuario
        // Primero ver si la reputaicion no es "Buena" o "Excelente"
        // Despues cuantas publicaciones existen creadas en la ultima semana
        $query = "  SELECT IF('$reputacion' = 'Buena', 99, IF('$reputacion' = 'Excelente', 99, 3-COUNT(pub.id))) as nro
                    FROM vd_publicaciones pub
                        JOIN vd_usuarios usu ON pub.id_usuario = usu.id
                    WHERE usu.id = $id_usuario AND pub.fecha > CURRENT_DATE-7 AND pub.estado != 2";

        // echo $query;
        $query = $this->db()->query($query);

        if($row = $query->fetch_object())
            $resultSet = (array)$row;

        return isset($resultSet) ? $resultSet : NULL;
    }

    public function getPostulacionActiva($id_usuario){
        // Devuelve la postulacion activa del usuario, si existe alguna
        $query = "  SELECT pos.*
                    FROM vd_publicaciones_postulaciones pos
                    WHERE pos.id_usuario = $id_usuario AND pos.id NOT IN(SELECT env.id_postulacion FROM vd_envios env) AND pos.estado != 2";

        // echo $query;
        $query = $this->db()->query($query);

        if($row = $query->fetch_object())
            $resultSet = (array)$row;

        return isset($resultSet) ? $resultSet : $arrayName = array('id' => NULL);

    }
} ?>