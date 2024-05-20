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
        <link rel="stylesheet" href="../estilos/navaltas.css">
        <link href="https://fonts.googleapis.com/css?family=Dokdo|Gravitas+One|La+Belle+Aurore|Michroma|Shadows+Into+Light|Walter+Turncoat" rel="stylesheet">
        <link rel="stylesheet" href="../estilos/nav.css">
        <script src="../script/BajaAutores.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid">
        <?php
            require_once '../includes/nav.php';
            require_once '../includes/navBajas.php';
        ?>
            <div class="container-fluid col-8" id="centro">
                <h2>Baja de Autores <img src="../imagenes/idea.png" alt=""/></h2>
                <select class="form-control col-sm-10 col-md-10 col-lg-10">

                </select>
                <button class="btn btn-primary mt-2">Borrar Autores</button>
                <p></p>
            </div>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
