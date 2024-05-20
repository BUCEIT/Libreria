<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../css/bootstrap-grid.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Dokdo|Gravitas+One|La+Belle+Aurore|Michroma|Shadows+Into+Light|Walter+Turncoat" rel="stylesheet">
        <link rel="stylesheet" href="../estilos/exportar.css">
        <link rel="stylesheet" href="../estilos/nav.css">
        <script>
            //Pongo a escuchar la carga de la pagina
            window.addEventListener("load",inicia);
            //Declaro las variables
            var input; var boton; var obj; var respuesta; var p;
            //Hago la funcion principal que se ejecuta al cargar la pagina
            function inicia(){
                //Referencio las variables
                input=document.getElementsByTagName("input")[0];
                boton=document.getElementsByTagName("button")[0];
                p=document.getElementsByTagName("p")[0];
                //Pongo a escuchar el click del boton
                boton.addEventListener("click",exportar);
            }
            //Creo la funcion exportar
            function exportar(){
                console.log(input.value);
                //Primero establecemos la conexion con el servidor asi que construimos el objeto xml...
                obj= new XMLHttpRequest();
                //Colocar el manejador de eventos, poner a escuchar el cambio de estado
                obj.onreadystatechange=function(){
                    if((obj.status==200)&&(obj.readyState==4)){
                        respuesta=obj.responseText;
                        //console.log(respuesta);
                        p.innerHTML=respuesta;
                    }
                }
                //Tambien le puedo pasar parametros y variables a la vez que establezco la conexion concatenando en la url
                obj.open("get","../includes/expor.php?dato="+input.value);//(metodo,url,si es asincrona,usuario,contraseña) Ahora el estado vale 1, 
                //Enviamos la peticion al servidor
                obj.send(); //En este punto el estado del readystate vale 2
            }
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <?php
            require_once '../includes/nav.php';
            ?>
            <div class="container mt-4" id="cuadro">
                <h2>Exportar archivo</h2>
                <label>Introduzca nombre al archivo </label><input type="text" class="form-control col-sm-6 col-md-6 col-lg-3">
                <button class="btn btn-primary mt-2">Exportar <img src="../imagenes/xml-file-format-symbol.png" alt=""/></button>
                <p></p>
            </div>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
