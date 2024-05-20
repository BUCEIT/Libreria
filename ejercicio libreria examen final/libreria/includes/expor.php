<?php

//Primero traigo la conexion
require_once '../conexion/conexion.php';
//Recojo lo que llega
$tit=$_REQUEST["dato"];
//Genero la sentencia sql
$sql = "SELECT `titulo`, `paginas`, `codigoautor` FROM `libros` WHERE 1";
//Vemos a ver que viene
$resultado=$conexion->query($sql);
//Meto el resultado en un array
$datos=array();
//Llamo a una funcion que me procese la informacion
$datos=$resultado->fetch_all(MYSQLI_ASSOC);
//Veo lo que tengo
//var_dump($datos);

//Hago el proceso de guardar
//Cojo una variable que va a tener creada el arbol del DOM. 
$xml= new DOMDocument("1.0","UTF-8"); //El DomDocument llama a un constructor. Obtiene dos parametros. 1-version de XML 2-juego de caracteres
//El formatOutput te va a hacer el fichero en forma de arbol
$xml->formatOutput=true;
//Empiezo a generar el arbol. Generar la etiqueta root
$raiz=$xml->createElement("root");
//Añato la etiqueta al arbol
$xml->appendChild($raiz);
//Hago un bucle porque por cada persona tengo que generar una etiqueta, agregarla...
for($i=0;$i<count($datos);$i++){
    //Creo la etiqueta titulo
    $Lib=$xml->createElement("Libro");
    //Agrego la etiqueta persona al arbol
    $raiz->appendChild($Lib);
    //Creo la etiqueta nombre
    $titulo=$xml->createElement("titulo", utf8_encode($datos[$i]["titulo"]));
    //Se lo agrego a la persona
    $Lib->appendChild($titulo);
    //Creo la etiqueta nombre
    $paginas=$xml->createElement("paginas", $datos[$i]["paginas"]);
    //Se lo agrego a la persona
    $Lib->appendChild($paginas);
    //Creo la etiqueta nombre
    $codigo=$xml->createElement("CodigoAutor", $datos[$i]["codigoautor"]);
    //Se lo agrego a la persona
    $Lib->appendChild($codigo);
}
//Grabar el documento en el fichero
$xml->save("../fichero/$tit.xml");
echo "El fichero ya ha sido creado";
//CERRAR LA CONEXION    
$conexion->close();