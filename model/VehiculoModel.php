<?php
class VehiculoModel extends EntidadBase{
    private $id;
    private $id_usuario;
    private $tipo;
    private $patente;
    private $marca;
    private $modelo;
    
    public function __construct() {
        $table="vd_usuarios_vehiculos";
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
    
    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getPatente() {
        return $this->patente;
    }

    public function setPatente($patente) {
        $this->patente = $patente;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function alta(){
        //$query= "INSERT INTO vd_usuarios_vehiculos (id, id_usuario, tipo, patente, marca, modelo) VALUES (NULL,".$this->id_usuario.", '".$this->tipo."', '".$this->patente."', '".$this->marca."', '".$this->modelo."');";
        $query= "INSERT INTO vd_usuarios_vehiculos (id, id_usuario, tipo, patente, marca, modelo) VALUES (NULL,'1', '".$this->tipo."', '".$this->patente."', '".$this->marca."', '".$this->modelo."');";
        return $this->db()->query($query);
    }

    // public function modificacion(){ // testear
    //     $query= "UPDATE vd_usuarios_vehiculos SET nombre = '$this->nombre', apellido = '$this->apellido', email = '$this->email', dni = '$this->dni', contraseña = '$this->contraseña', WHERE id = $this->id";
    //     return $this->db()->query($query);
    // }

    // public function baja(){ // testear
    //     $query = "DELETE FROM vd_usuarios_vehiculos WHERE id = ".$this->id;
    //     return $this->db()->query($query);
    // }

    // public function borrarTodos(){
    //     $query = "DELETE FROM vd_usuarios_vehiculos";
    //     $this->db()->query($query);
    //     return 0;
    // }
} ?>