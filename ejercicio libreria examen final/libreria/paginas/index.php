<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Libreria</title>
        
        <link href="../css/bootstrap-grid.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Dokdo|Gravitas+One|La+Belle+Aurore|Michroma|Shadows+Into+Light|Walter+Turncoat" rel="stylesheet">
        <link rel="stylesheet" href="../estilos/index.css">
        <link rel="stylesheet" href="../estilos/footer.css">
        <link rel="stylesheet" href="../estilos/nav.css">
        <style>
            
        </style>
    </head>
    <body>
        
        <div class="container-fluid">
            <?php
                require_once '../includes/nav.php';
                require_once '../includes/header.php';
            ?>
            
            
            <section class="mt-5 container-fluid row">
                <div class="col-3">
                    <img src="../imagenes/libro.jpg" alt=""/>
                </div>
                <div class="col-6">
                    <h1>Bienvenido a nuestra Libreria</h1>
                    <h4>Esperemos que disfruten de la experiencia que les ofrecemos</h4>
                </div>
                <div class="col-3">
                    <img src="../imagenes/libro2.png" alt=""/>
                </div>
            </section>
            <section id="leer">
                <h2 class="p-1">Consulta nuestros libros</h2>
                <h2 class="p-1">Interactua con nosotros</h2>
            </section>
            <section class="container-fluid mt-5 ml-3 row">
                <div class="col-4 row">
                    <h3 id="uno" class="p-2">Da de <span>alta</span> los libros que quieras pinchando <a href="altas.php">aqui</a> para actuar de forma interactiva</h3>
                    <img src="../imagenes/alta.png" alt=""/>
                </div>
                <div class="col-4 row">
                    <h3 id="dos" class="p-2">Da de <span>baja</span> los libros que quieras pinchando <a href="borrar.php">aqui</a> para actuar de forma interactiva</h3>
                    <img src="../imagenes/baja.png" alt=""/>
                </div>
                <div class="col-4 row">
                    <h3 class="p-2"><span>Consulta</span> los libros que quieras pinchando <a href="consultas.php">aqui</a> para actuar de forma interactiva</h3>
                    <img src="../imagenes/consulta.png" alt=""/>
                </div>
            </section>
        </div>
        <?php
                require_once '../includes/footer.php';
            ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
