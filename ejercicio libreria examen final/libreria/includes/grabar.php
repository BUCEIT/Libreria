<?php
//Primero traigo la conexion
require_once '../conexion/conexion.php';
//Primero recojo lo que me llega
$pag=$_REQUEST["pag"]; $dato= json_decode($_REQUEST["dato"]);
//veo a ver que viene
if($pag==1){ //Si estoy grabando autorres
    $sql="INSERT INTO autores (nombre,lugar,nacimiento) VALUES (\"$dato->nombre\",\"$dato->lugar\",$dato->nacimiento)";
    //Vemos a ver que viene
    $resultado=$conexion->query($sql);
    //Preguntamos a ver si se ha insertado
    if($resultado){
        echo "ALTA EFECTUADO CORRECTAMENTE";
    } else {
        echo "ERROR EN LA GRABACION";
    }
    //CERRAR LA CONEXION    
    $conexion->close();
}
//Si viene de grabar editoriales
if($pag==2){
    //Hago la sentencia sql que me guarda el resultado
    $sql="INSERT INTO editoriales (nif,nombre,telefono,direccion) VALUES (\"$dato->nif\",\"$dato->nombre\",$dato->telefono,\"$dato->direccion\")";
    //Vemos a ver que viene
    $resultado=$conexion->query($sql);
    //Preguntamos a ver si se ha insertado
    if($resultado){
        echo "ALTA EFECTUADO CORRECTAMENTE";
    } else {
        echo "ERROR EN LA GRABACION";
    }
    //CERRAR LA CONEXION    
    $conexion->close();
}
//Si viene de grabar el libro
if($pag==3){
    //Hago la sentencia sql
    $sql="INSERT INTO `libros`(`isbn`, `titulo`, `genero`, `precio`, `paginas`, `codigoautor`, `nifeditorial`) VALUES (\"$dato->isbn\",\"$dato->titulo\",\"$dato->genero\",$dato->precio,$dato->paginas,\"$dato->autor\",\"$dato->editorial\")";
    //Veo lo que viene
    $resultado=$conexion->query($sql);
    //Preguntamos a ver si se ha insertado
    if($resultado){
        echo "ALTA EFECTUADO CORRECTAMENTE";
    } else {
        echo "ERROR EN LA GRABACION";
    }
    //CERRAR LA CONEXION    
    $conexion->close();
}   


