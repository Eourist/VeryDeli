<?php
class UsuarioModel extends EntidadBase{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
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

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
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
        $query = "INSERT INTO vd_usuarios (id, nombre, apellido, email, telefono, dni, contraseña, avatar) VALUES (
            NULL,
            '".$this->nombre."', 
            '".$this->apellido."', 
            '".$this->email."', 
            '".$this->telefono."',
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
            telefono    = '$this->telefono', 
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
} ?>