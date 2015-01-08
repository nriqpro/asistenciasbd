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
        




        function genera_tabla() {

            var horas =
                ["7:00 - 8:00", "8:00 - 9:00", "9:00 - 10:00","10:00 - 11:00","11:00 - 12:00","12:00 - 1:00",
                 "1:00 - 2:00","2:00 - 3:00","3:00 - 4:00","4:00 - 5:00","5:00 - 6:00","6:00 - 7:00","7:00 - 8:00","8:00 - 9:00"];

            var horas_inicio = ["07:00:00","08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00",
                               "16:00:00","17:00:00","18:00:00","19:00:00","20:00:00"];
            var horas_fin = ["08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00",
                               "16:00:00","17:00:00","18:00:00","19:00:00","20:00:00","21:00:00"];

            //ESTOS ARREGLOS DE HORAS ES PARA INDICAR LAS FILAR i para luego hacer i*10 + j y eso ees igual al ID
          var tblBody = document.getElementById("bodyTablaSeccion");
          for (var i = 0; i < 14; i++) {
                var hilera = document.createElement("tr");
                for (var j = 0; j < 6; j++) {
                      var celda = document.createElement("td");
                      celda.id = (i*10+j).toString();
                      if (j == 0){
                            var hora = document.createTextNode(horas[i]);
                            celda.appendChild(hora);

                      }
                        else
                            celda.style.textAlign = 'center';
                      hilera.appendChild(celda);
                }
                tblBody.appendChild(hilera);
          }

        }
        window.onload = genera_tabla;



    </script>

  </head>

<div class=" col-md-offset-2 main">
    <h1 class="page-header">Seccion</h1>
  
			<h3>
				Crear Seccion <br><br><br><br>
			</h3>
	
	<div class="row clearfix">
		<div class="col-md-8 column">
			<table class="table table-bordered table-condensed">
				<thead>
					<tr>
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
					</tr>
				</thead>
				<tbody id="bodyTablaSeccion">
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
                        i(isset($asignatura) && is_array($asignatura)){
                            echo "<div class=\"row\">";
                            echo "<div class=\"col-xs-10 column\">";
                            
                            
                            echo "</div>";
                            
                            echo "<div class=\"col-xs-2 column\">";
                            
                            
                            echo "</div";
                            echo "</div>";
                        }
                    ?>
				</div>
				<div class="panel-footer">
					Panel footer
				</div>
			</div>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-4 column">
			 <button type="button" class="btn btn-default">Default</button>
		</div>
		<div class="col-md-4 column">
			 <button type="button" class="btn btn-default">Default</button>
		</div>
		<div class="col-md-4 column">
			 <button type="button" class="btn btn-default">Default</button>
		</div>
	</div>
</div>