<?php
class EntidadBase{
    private $table;
    private static $db;
    //private $conectar;

    public function __construct($table) {
        $this->table=(string) $table;
        require_once 'Conectar.php';
        $conectar = new Conectar();
        self::$db = $conectar->getConnection();
    }
    
    public function db(){
        return self::$db;
    }
    
    public function getAll(){
     
        $query=$this->db()->query("SELECT * FROM $this->table ORDER BY id DESC");

        while ($row = $query->fetch_object()) {
           $resultSet[] = $row;
        }
        
        return $resultSet;
    }
    
    public function getById($id){
        $query = $this->db()->query("SELECT * FROM $this->table WHERE id=$id");

        if($row = $query->fetch_object())
           $resultSet = $row;

        return isset($resultSet) ? $resultSet : NULL;
    }
    
    public function getBy($column,$value){
        $query=$this->db()->query("SELECT * FROM $this->table WHERE $column='$value'");

        while($row = $query->fetch_object())
           $resultSet[] = $row;
        
        return isset($resultSet) ? $resultSet : NULL;
    }

    public function insert($values){
        $queryColumnas = $this->db()->query("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '".$this->table."'");

        $stringColumnas = "";
        while ($row = $queryColumnas->fetch_object())
            $stringColumnas .= $row->COLUMN_NAME.", ";
        $stringColumnas = substr($stringColumnas, 0, -2);

        $stringValues = "";
        foreach ($values as $val)
            $stringValues .= "'".$val."', ";
        $stringValues = substr($stringValues, 0, -2);

        $query = $this->db()->query("INSERT INTO ".$this->table." (".$stringColumnas.") VALUES (NULL,".$stringValues.");");

        return $query;
    }
    
    public function deleteById($id){
        $query=$this->db()->query("DELETE FROM $this->table WHERE id=$id"); 
        return $query;
    }
    
    public function deleteBy($column,$value){
        $query=$this->db()->query("DELETE FROM $this->table WHERE $column='$value'"); 
        return $query;
    }
    
    /*
     * Aqui podemos agregar otros métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */
    
}
?>
