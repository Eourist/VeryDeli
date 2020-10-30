<?php
//FUNCIONES PARA EL CONTROLADOR FRONTAL

function cargarControlador($controller){
    $controlador=ucwords($controller).'Controller';
    $strFileController='controller/'.$controlador.'.php';

    if(!is_file($strFileController)){
        $controlador =ucwords(CONTROLADOR_DEFECTO).'Controller';
        $strFileController='controller/'.$controlador.'.php';
    }
    
    //cargo el controlador requerido o el controlador por defecto
    require_once $strFileController;
    $controllerObj=new $controlador();
    return $controllerObj;
}


function lanzarAccion($controllerObj,$action){

    if(isset($action) && method_exists($controllerObj, $action)){
        cargarAccion($controllerObj, $action);
    }else{
        cargarAccion($controllerObj, ACCION_DEFECTO);
    }
}


function cargarAccion($controllerObj,$action){
    $controllerObj->$action();
}

?>
