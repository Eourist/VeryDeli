<?php
//Funciones para el controlador frontal
require_once 'core/ControladorFrontal.php';
require_once 'config/global.php';


    function loadClasses($class_name){
        $classesPath = './model/'.$class_name.'.php';
        $controllersPath = './controller/'.$class_name.'.php';
		$corePath = './core/'.$class_name.'.php';
		$configPath = './model/'.$class_name.'.php';

		
        if(file_exists($classesPath)){
            require_once($classesPath);
        }else if(file_exists($controllersPath)){
            require_once($controllersPath);
        }else if(file_exists($corePath)){
            require_once($corePath);   
		}else if(file_exists($configPath)){
            require_once($configPath);   
		}		
	}
    spl_autoload_register('loadClasses');





//Cargamos controladores y acciones
$controller = (isset($_GET["controller"])) ? $_GET["controller"] :  CONTROLADOR_DEFECTO;

$action = (isset($_GET["action"])) ? $_GET["action"] : ACCION_DEFECTO;


$controladorObj=cargarControlador($controller);
lanzarAccion($controladorObj,$action);



?>
