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
        <link rel="stylesheet" href="../estilos/consultas.css">
        <link rel="stylesheet" href="../estilos/nav.css">
        <script src="../script/consultas.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid">
        <?php
        require_once '../includes/nav.php';
        ?>
            <div class="container mt-4">
                <button class="btn btn-primary" id="1">Libros en stock</button>
                <button class="btn btn-primary" id="2">Libros por editorial</button>
                <button class="btn btn-primary" id="3">Consulta por titulo</button>
                <button class="btn btn-primary" id="4">Libros por autor</button>
                <section class="container mt-2">
                    
                </section>
                <article></article>
            </div>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
