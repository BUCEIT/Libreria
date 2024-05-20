<?php

//Primero traigo la conexion
require_once '../conexion/conexion.php';
//Recojo lo que llega
$pag=$_REQUEST["pag"]; 
//$pag=3; $tex="asdasdasd";
//$pag=2; //$edi="Alfaguara";
//Veo de donde viene
if($pag==1){ //Viene de los libros en stock
    //Genero la sentencia sql
    $sql = "SELECT  `titulo`,  `precio`, `nombre` FROM `libros` JOIN autores ON libros.codigoautor=autores.codautor";
    //Vemos a ver que viene
    $resultado=$conexion->query($sql);
    //Meto el resultado en un array
    $datos=array();
    //Llamo a una funcion que me procese la informacion
    $datos=$resultado->fetch_all(MYSQLI_ASSOC);
    //Proceso la consulta para transformarlo a español
for($i=0;$i<count($datos);$i++){
    $datos[$i]["titulo"]= utf8_encode($datos[$i]["titulo"]);
    $datos[$i]["nombre"]= utf8_encode($datos[$i]["nombre"]);
}
    //Mando de vuelta todo
        echo json_encode($datos);
    //CERRAR LA CONEXION    
    $conexion->close();
}
//Si viene de libros por editorial
if($pag==2){
    //Recojo la editorial
    $edi=$_REQUEST["edi"];
    $edi= utf8_decode($edi);
    //Genero el sql
    $sql = "SELECT  `titulo`, editoriales.nombre AS `nomeditorial`, autores.nombre AS `nomautor` FROM `libros` JOIN editoriales ON libros.nifeditorial=editoriales.nif JOIN autores ON libros.codigoautor=autores.codautor WHERE editoriales.nombre LIKE \"%$edi%\"";
    //Vemos a ver que viene
    $resultado=$conexion->query($sql);
    //Meto el resultado en un array
    $datos=array();
    //Llamo a una funcion que me procese la informacion
    $datos=$resultado->fetch_all(MYSQLI_ASSOC);
    //Proceso la consulta para transformarlo a español
for($i=0;$i<count($datos);$i++){
    $datos[$i]["titulo"]= utf8_encode($datos[$i]["titulo"]);
    $datos[$i]["nomeditorial"]= utf8_encode($datos[$i]["nomeditorial"]);
    $datos[$i]["nomautor"]= utf8_encode($datos[$i]["nomautor"]);
}
    //Mando de vuelta todo
    echo json_encode($datos);
    //echo $edi;
    //CERRAR LA CONEXION    
    $conexion->close();
}
//Si viene del boton 3
if($pag==3){
    $tex=$_REQUEST["tex"];
    //Genero la sentencia sql
    $sql = "SELECT  `titulo`,  `precio`, `paginas`, `codigoautor`, `nombre` FROM `libros` JOIN editoriales ON libros.nifeditorial=editoriales.nif WHERE titulo LIKE \"$tex%\"";
    //Vemos a ver que viene
    $resultado=$conexion->query($sql);
    //Veo el numero de filas modificado
    //Meto el resultado en un array
    $datos=array();
    //Llamo a una funcion que me procese la informacion
    $datos=$resultado->fetch_all(MYSQLI_ASSOC);
    //Veo el numero de filas alteradas
    $total=$resultado->num_rows; //Esto me va a decir el numero que viene de mysqul
    if($total==0){
        //Si no se ha alterado nada
        echo json_encode($datos);
    }else{
    //Proceso la consulta para transformarlo a español
    for($i=0;$i<count($datos);$i++){
        $datos[$i]["titulo"]= utf8_encode($datos[$i]["titulo"]);
        $datos[$i]["codigoautor"]= utf8_encode($datos[$i]["codigoautor"]);
        $datos[$i]["nombre"]= utf8_encode($datos[$i]["nombre"]);
    }
        //Mando de vuelta todo
        echo json_encode($datos);
        }
    //CERRAR LA CONEXION    
    $conexion->close();
}
//Si viene del boton cuatro
if($pag==4){
    //Recojo lo que viene el el input
    $autor=$_REQUEST["autor"];
    //Lo trato por si acaso
    $autor=utf8_decode($autor);
    //Genero el sql
    $sql = "SELECT  `nombre`, `titulo`, `genero` FROM `autores` JOIN libros ON autores.codautor=libros.codigoautor WHERE nombre LIKE \"%$autor%\"";
    //Vemos a ver que viene
    $resultado=$conexion->query($sql);
    //Meto el resultado en un array
    $datos=array();
    //Llamo a una funcion que me procese la informacion
    $datos=$resultado->fetch_all(MYSQLI_ASSOC);
    //Proceso la consulta para transformarlo a español
for($i=0;$i<count($datos);$i++){
    $datos[$i]["titulo"]= utf8_encode($datos[$i]["titulo"]);
    $datos[$i]["genero"]= utf8_encode($datos[$i]["genero"]);
    $datos[$i]["nombre"]= utf8_encode($datos[$i]["nombre"]);
}
    //Mando de vuelta todo
    echo json_encode($datos);
    //echo $edi;
    //CERRAR LA CONEXION    
    $conexion->close();
}