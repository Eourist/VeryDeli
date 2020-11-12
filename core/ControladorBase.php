<?php
class ControladorBase{

    public function __construct() {
		require_once 'Conectar.php';
        require_once 'EntidadBase.php';
        require_once 'ModeloBase.php';
        
        //Incluir todos los modelos
        foreach(glob("model/*.php") as $file){
            require_once $file;
        }
    }
    
    //funcionalidades comunes a todos los controladores
    
    public function view($vista,$datos){
        if (is_array($datos)){
            foreach ($datos as $id_assoc => $valor) {
                // Define y setea todas las variables que se usarán en la vista
                ${$id_assoc}=$valor; 
            }
        }
        
        // Crea una instancia con funciones útiles para las vistas
        require_once 'core/AyudaVistas.php';
        $helper = new AyudaVistas();
        
        // Llamar a la vista
        require 'view/'.$vista.'View.php';
    }
    
    public function redirect($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO,$get=NULL){
        header("Location:index.php?controller=".$controlador."&action=".$accion.$get);
    }
    
    //Métodos para los controladores

} ?>
