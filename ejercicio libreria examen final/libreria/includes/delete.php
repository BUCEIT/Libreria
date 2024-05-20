<?php
//Primero traigo la conexion
require_once '../conexion/conexion.php';
//Primero recojo la variable
$pag=$_REQUEST["pag"];
$dato= utf8_decode($_REQUEST["dato"]);
//Si viene de borrar libros
if($pag==1){
    //Hago la sentencia sql
    $sql = "DELETE FROM `libros` WHERE titulo=\"$dato\"";
    //Miro a ver que me trae de resultado
    $resultado=$conexion->query($sql);
    if($resultado==1){
        echo "Proceso realizado correctamente";
    }else{
        echo "Proceso fallido";
    }
    //Cierro la conexion
    $conexion->close();
}
//Si quiero borrar editoriales
if($pag==2){
    //Hago la sentencia sql
    $sql = "DELETE FROM `editoriales` WHERE nif=\"$dato\"";
     //Miro a ver que me trae de resultado
    $resultado=$conexion->query($sql);
    if($resultado==1){
        echo "Proceso realizado correctamente";
    }else{
        echo "Proceso fallido";
    }
    //Cierro la conexion
    $conexion->close();
}
//Si quiero borrar autores
if($pag==3){
    //Hago la sentencia sql
    $sql = "DELETE FROM `autores` WHERE codautor=$dato";
    //Miro a ver que me trae de resultado
    $resultado=$conexion->query($sql);
    if($resultado==1){
        echo "Proceso realizado correctamente";
    }else{
        echo "Proceso fallido";
    }
    //Cierro la conexion
    $conexion->close();
}
