<?php
//Variables de la conexion
$host="localhost";
$usuario="root";
$pwd="";
$bd="libreria";
//Primero se establece la conexion
$conexion=new mysqli($host,$usuario,$pwd,$bd);
//Veo si se ha podido establecer conexion
if($conexion->connect_error){ //Si no se ha podido estableder
    //Me cargo la conexio y saco mensaje de error
    die("Error en la conexion");
}

