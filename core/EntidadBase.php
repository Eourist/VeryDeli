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
        
        return (isset($resultSet)) ? $resultSet : NULL;
    }
    
    public function getAllActivas(){
     
        $query=$this->db()->query("SELECT * FROM $this->table WHERE estado = 0 ORDER BY id DESC");

        while ($row = $query->fetch_object()) {
           $resultSet[] = $row;
        }
        
        return (isset($resultSet)) ? $resultSet : NULL;
    }
    
    public function getById($id){
        $query = $this->db()->query("SELECT * FROM $this->table WHERE id=$id");

        if($row = $query->fetch_object())
           $resultSet = $row;

        return isset($resultSet) ? $resultSet : NULL;
    }
    
    public function getByIdAsArray($id){
        $query = $this->db()->query("SELECT * FROM $this->table WHERE id=$id");

        if($row = $query->fetch_object())
           $resultSet = (array)$row;

        return isset($resultSet) ? $resultSet : NULL;
    }
    
    public function getByAsArray($column,$value){
        $query=$this->db()->query("SELECT * FROM $this->table WHERE $column='$value'");

        while($row = $query->fetch_object())
           $resultSet[] = (array)$row;
        
        return isset($resultSet) ? $resultSet : NULL;
    }
    
    public function getBy($column,$value){
        $query=$this->db()->query("SELECT * FROM $this->table WHERE $column='$value'");

        while($row = $query->fetch_object())
           $resultSet[] = $row;
        
        return isset($resultSet) ? $resultSet : NULL;
    }

    public function insert($values){
    	// Obtener los nombres de las columnas de la tabla
        $queryColumnas = $this->db()->query("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '".$this->table."' 
            AND COLUMN_NAME != 'fecha' 
            AND COLUMN_NAME != 'hora' 
            AND COLUMN_NAME != 'estado' 
            AND COLUMN_NAME != 'admin' 
            AND COLUMN_NAME != 'fecha_registro' 
        "); // Omitir campos con valores Default

        // Armar la cadena de columnas
        $stringColumnas = "";
        while ($row = $queryColumnas->fetch_object())
            $stringColumnas .= $row->COLUMN_NAME.", ";
        $stringColumnas = substr($stringColumnas, 0, -2);

        // Armar la cadena de valores
        $stringValues = "";
        foreach ($values as $val)
            $stringValues .= (isset($val)) ? "'".$val."', " : "NULL, ";
        $stringValues = substr($stringValues, 0, -2);

        $query = $this->db()->query("INSERT INTO ".$this->table." (".$stringColumnas.") VALUES (NULL,".$stringValues.");");
        
        // echo "INSERT INTO ".$this->table." (".$stringColumnas.") VALUES (NULL,".$stringValues.");"; exit();

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
