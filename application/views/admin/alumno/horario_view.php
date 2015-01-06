<!DOCTYPE html>
<html lang="en"><head>
     <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo (isset($title)) ? $title : "Asistencias" ?></title>

    <!-- Bootstrap core CSS -->
        <link href="<?= base_url("assets/css/sidebar.css");?>" rel="stylesheet">

    <link href="<?= base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">

    <!-- Custom styles for this template -->

      <link rel="stylesheet" href="<?php base_url();?>assets/css/bootstrap-theme.min.css">
    <script type="text/javascript">
        



        function cambiarColor(){
                   var celda = document.getElementById("0");
                            celda.style.backgroundColor = (celda.style.backgroundColor=="blue" ? "yellow":"blue");
        }




        function genera_tabla() {

            var horas =
                ["7:00 - 8:00", "8:00 - 9:00", "9:00 - 10:00","10:00 - 11:00","11:00 - 12:00","12:00 - 1:00",
                 "1:00 - 2:00","2:00 - 3:00","3:00 - 4:00","4:00 - 5:00","5:00 - 6:00","6:00 - 7:00","7:00 - 8:00","8:00 - 9:00"];

            var horas_inicio = ["07:00:00","08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00",
                               "16:00:00","17:00:00","18:00:00","19:00:00","20:00:00"];
            var horas_fin = ["08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00",
                               "16:00:00","17:00:00","18:00:00","19:00:00","20:00:00","21:00:00"];

            //ESTOS ARREGLOS DE HORAS ES PARA INDICAR LAS FILAR i para luego hacer i*10 + j y eso ees igual al ID
          var tblBody = document.getElementById("bodyTabla");
          for (var i = 0; i < 14; i++) {
                var hilera = document.createElement("tr");
                for (var j = 0; j < 6; j++) {
                      var celda = document.createElement("td");
                      celda.id = (i*10+j).toString();
                      if (j == 0){
                            var hora = document.createTextNode(horas[i]);
                            celda.appendChild(hora);

                            celda.addEventListener('click', function(){
                                    cambiarColor();
                            });
                      }
                        else
                            celda.style.textAlign = 'center';
                      hilera.appendChild(celda);
                }
                tblBody.appendChild(hilera);
          }

            //AHORA CAMBIO LOS COLORES
            var jsonArray = eval(<?php echo json_encode($horario);?>);
             var nMateriasJSON = eval(<?php echo json_encode($infoSecciones);?>);

            var arregloNombresMaterias = new Array();
            var i=0;
             for (item in nMateriasJSON) {
                arregloNombresMaterias[i++] = nMateriasJSON[item].asignatura;
             }
            var arrayColores =["aqua","limegreen","teal","DeepSkyBlue","silver","orange","red","yellow","Magenta"];
            for (item in jsonArray) {
                var columna ;
                var  els=0;
                if (jsonArray[item].dia == "Lunes") columna = 1;
                if (jsonArray[item].dia == "Martes") columna = 2;
                if (jsonArray[item].dia == "Miercoles") columna = 3;
                if (jsonArray[item].dia == "Jueves") columna = 4;
                if (jsonArray[item].dia == "Viernes") columna = 5;

//            for (subItem in jsonArray[item]) {
                  for ( var i=0 ; i < horas_inicio.length ; i++){
//                                        if (els==0){
//                                            alert("si entra baby");
//                                            els=1;
//                                        }
                        if(jsonArray[item].hora_ini == horas_inicio[i]){
                            for (var j=0 ; j < horas_fin.length ; j++){
                                if (jsonArray[item].hora_fin== horas_fin[j]){
                                    var aux = 0;
                                    for (var k = i ; k <= j ; k++){

                                        var celda = document.getElementById((k*10 + columna).toString());
                                        for (var z = 0 ; z < arregloNombresMaterias.length ; z++){
                                            if (arregloNombresMaterias[z] == jsonArray[item].nombre)
                                                celda.style.backgroundColor = arrayColores[z];
                                        }

                                        if (aux==0){
                                            celda.innerHTML = jsonArray[item].nombre;
                                            aux=1;
                                        }
                                        else
                                            celda.innerHTML  = jsonArray[item].cod_salon;

                                    }
                                }
                            }
                        }
                  }
//            }
            var epale = jsonArray[item].hora_ini;
            //document.getElementById("25").style.backgroundColor = "limegreen";
                // alert("holis");
        }




        }

        window.onload = genera_tabla;



    </script>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Asistencias</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Perfil</a></li>
            <li><a href="#">Ayuda</a></li>
            <li><a href="#">Salir</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
      <div class=" col-md-offset-2 main">
    <h1 class="page-header">Alumnos</h1>
    <div class="row clearfix">
		<div class="col-md-12 column">
			<h3> <strong>
				HORARIO
                </strong>
			</h3>

            <?php
                if (is_array($alumno) && isset($alumno)){
                    //foreach ($alumno as $a){
            
                           echo " <h4>".$alumno['nombre']."</h4>";
                           echo " <h4>V-".$alumno['cedula']."</h4>";
                 //   }


                }

            ?>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-8 column" name="divTabla" id="divTabla">
			<table class="table table-bordered table-condensed" id = "miTabla">
				<thead>
					<tr>
						<th>
							Horas
						</th>
						<th>
							Lunes
						</th>
						<th>
							Martes
						</th>
						<th>
							Miercoles
						</th>
                        <th>
							Jueves
						</th>
                        <th>
							Viernes
						</th>
					</tr>
				</thead>
				<tbody id="bodyTabla">

				</tbody>
			</table>
		</div>
		<div class="col-md-4 column">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Materias
					</h3>
				</div>
				<div class="panel-body">
                    <?php
                        if (is_array($infoSecciones) && isset($infoSecciones)){
                            foreach($infoSecciones as $info){
                              echo"  <div class=\"row\">
                                   <div class=\"col-md-4 column\">".
                                    $info->asignatura."
                                    </div>
                                    <div class=\"col-md-4 column\">"
                                     .$info->nombre." ".$info->apellido."<br>
                                    V-".$info->ci_profe."
                                    </div>
                                    <div class=\"col-md-4 column\">
                                   ".$info->cod_seccion."
                                    </div>
                                </div><hr>";
                            }
                        }
                    ?>
				</div>
				<div class="panel-footer">
                    <div class="row">
                        <div class="col-md-4 column">[Materia] </div>
                        <div class="col-md-4 column">[Profesor]</div>
                        <div class="col-md-4 column">[Seccion]</div>

                    </div>

				</div>
			</div>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column">
            <form action="<?= base_url("index.php/alumno/gestionAlumno"); ?>" method="post" id="editar">
                               <input type="hidden" name = "cedula" value="<?= $alumno['cedula']; ?>">
                                  <button class="btn btn-lg" type="submit">Regresar</button></input>
                    </form>
			 
		</div>
	</div>
<<<<<<< HEAD
</div>
=======
          <?php
        if (is_array($horario) && count($horario)){
            foreach($horario as $loop){
                echo $loop->cod_salon." ".$loop->dia." ".$loop->hora_ini." ".$loop->hora_fin." ".$loop->nombre."<br>";
            }

        }
    ?>
</div>
>>>>>>> origin/master
