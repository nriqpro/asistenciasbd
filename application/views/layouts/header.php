<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo (isset($title)) ? $title : "Asistencias" ?></title>

    <!-- Bootstrap core CSS -->

    <link href="<?= base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">

    <!-- Custom styles for this template -->

      <link rel="stylesheet" href="<?php base_url();?>assets/css/bootstrap-theme.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
   <body>
       <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?= base_url();?>index.php/">Asistencias Enrique y Asociada(mary)</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="">Alumnos</a></li>
                <li><a href="">Profe</a></li>
                <li><a href="">Materias</a></li>
                <li><a href="">*Asistencias*</a></li>
                  <li><a href="">Carreras</a></li>
                  <li><a href="">Secciones</a></li>
              </ul>
            </div>
          </div>
        </div>
       <br>
        <div class="col-sm-10">
        <?php if(isset($message)){
            switch($message_type){
                case 1:
                ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $message; ?>
                    </div>
                <?php
                break;
            }
        }
        ?>
        </div>
       <div class="container-fluid" style="padding-top:50px;" >