<?php

//Primero traigo la conexion
require_once '../conexion/conexion.php';
$pag=$_REQUEST["pag"];
//$pag=2;
//veo que viene
if($pag==1){
    //Hago la sentencia sql que trae autores
$sql = "SELECT `codautor`, `nombre` FROM `autores` WHERE 1";
//Vemos a ver que viene
    $resultado=$conexion->query($sql);
    //Meto el resultado en un array
    $datos=array();
    //Llamo a una funcion que me procese la informacion
    $datos=$resultado->fetch_all(MYSQLI_ASSOC);
    //Proceso la consulta para transformarlo a español
for($i=0;$i<count($datos);$i++){
    $datos[$i]["codautor"]= utf8_encode($datos[$i]["codautor"]);
    $datos[$i]["nombre"]= utf8_encode($datos[$i]["nombre"]);
}
    //Mando de vuelta todo
        echo json_encode($datos);
    //CERRAR LA CONEXION    
    $conexion->close();
}
//Si pag es igual a dos es que viene de editoriales
if($pag==2){
    //Hago la sentencia sql
$sql = "SELECT `nif`, `nombre` FROM `editoriales` WHERE 1";
//Vemos a ver que viene
    $resultado=$conexion->query($sql);
    //Meto el resultado en un array
    $datos=array();
    //Llamo a una funcion que me procese la informacion
    $datos=$resultado->fetch_all(MYSQLI_ASSOC);
    //Proceso la consulta para transformarlo a español
for($i=0;$i<count($datos);$i++){
    $datos[$i]["nif"]= utf8_encode($datos[$i]["nif"]);
    $datos[$i]["nombre"]= utf8_encode($datos[$i]["nombre"]);
}
    //Mando de vuelta todo
        echo json_encode($datos);
    //CERRAR LA CONEXION    
    $conexion->close();
}
//Si me pide el nombre de los libros
if($pag==3){
    //Hago la sentencia sql de los libros
    $sql = "SELECT `titulo` FROM `libros` WHERE 1";
    //Vemos a ver que viene
    $resultado=$conexion->query($sql);
    //Meto el resultado en un array
    $datos=array();
    //Llamo a una funcion que me procese la informacion
    $datos=$resultado->fetch_all(MYSQLI_ASSOC);
    //Proceso la consulta para transformarlo a español
for($i=0;$i<count($datos);$i++){
    $datos[$i]["titulo"]= utf8_encode($datos[$i]["titulo"]);
}
    //Mando de vuelta todo
        echo json_encode($datos);
    //CERRAR LA CONEXION    
    $conexion->close();
}