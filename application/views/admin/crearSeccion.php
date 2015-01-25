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
        var horas = -1;
        var nHiddenInputs = 0;
        var salon = -1;


        function crearHiddenInput(nombre,valor){
                var theForm = document.getElementById("formInscribirSeccion");
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name =nombre+nHiddenInputs;
                input.id = nombre+nHiddenInputs;
                input.value = valor;
                theForm.appendChild(input);
         }

        function genera_tabla() {
            
            var horas =
                ["7:00 - 8:00", "8:00 - 9:00", "9:00 - 10:00","10:00 - 11:00","11:00 - 12:00","12:00 - 1:00",
                 "1:00 - 2:00","2:00 - 3:00","3:00 - 4:00","4:00 - 5:00","5:00 - 6:00","6:00 - 7:00","7:00 - 8:00","8:00 - 9:00"];

            var horas_inicio = ["07:00:00","08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00",
                               "16:00:00","17:00:00","18:00:00","19:00:00","20:00:00"];
            var horas_fin = ["08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00",
                               "16:00:00","17:00:00","18:00:00","19:00:00","20:00:00","21:00:00"];
            var dias = ["Lunes","Martes","Miercoles","Jueves","Viernes"];

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
                        else{
                            celda.style.textAlign = 'center';
                             var createClickHandler = 
                                function(i,j) 
                                {
                                    return function() { 
                                        var horasPares = -1;
                                        if (window.horas % 2 == 0)
                                             horasPares = 1
                                        else
                                            horasPares = 0;
                                        
                                        if (window.horas == -1){
                                            alert("Seleccione una materia");
                                            return;
                                        }
                                             if (window.salon == -1){
                                            alert("Seleccione un salon");
                                            return;
                                        }
                                        if (window.horas == 0){
                                            alert("Ya ha inscrito el total de horas disponibles para la materia seleccionada");
                                            return;
                                        }
                                        if (i == 13){
                                            alert("Ups Su clase no puede culminar si inicia a esa hora");
                                            return;
                                        }
                                        else if (window.horas > 0){
                                            var celda = document.getElementById((i*10+j).toString());
                                            if (celda.style.backgroundColor != "white"){
                                                 alert("Esa hora ya esta asignada seleccione otra por favor");
                                                  return;
                                            }
                                            crearHiddenInput("hora_inicio"+window.nHiddenInputs,horas_inicio[i]);
                                            if (horasPares==1){
                                                window.horas = window.horas - 2 ;
                                                celda.style.backgroundColor = "DodgerBlue";
                                                celda = document.getElementById(((i+1)*10+j).toString());
                                                celda.style.backgroundColor = "DodgerBlue";
                                                crearHiddenInput("hora_fin"+window.nHiddenInputs,horas_fin[(i+1)]);
                                            }
                                            else{
                                                window.horas = window.horas - 3 ;
                                                celda = document.getElementById((i*10+j).toString());
                                                celda.style.backgroundColor = "DodgerBlue";
                                                celda = document.getElementById(((i+1)*10+j).toString());
                                                celda.style.backgroundColor = "DodgerBlue";
                                                celda = document.getElementById(((i+2)*10+j).toString());
                                                celda.style.backgroundColor = "DodgerBlue";
                                                crearHiddenInput("hora_fin"+window.nHiddenInputs,horas_fin[(i+2)]);
                                            }
                                                crearHiddenInput("dia"+nHiddenInputs,dias[j-1]);
                                        }
                                        window.nHiddenInputs++;
                                    };
                                };

                            celda.style.backgroundColor="white";
                            celda.onclick = createClickHandler(i,j);
                            
                        }
                      hilera.appendChild(celda);
                }
                tblBody.appendChild(hilera);
          }

        }
        
        function reiniciarTabla(){
            //alert("se ha reiniciado la tabla");
            for (var i = 0; i < 14; i++) {
                for (var j = 0; j < 6; j++) {
                    var celda = document.getElementById((i*10+j).toString());
                     celda.style.backgroundColor = "white";
                }
            }
        }
        function crearRadiosSalones(){
            var salones = eval(<?php echo json_encode($salones);?>);
            
             for (item in salones) {
                 
                 var createClickHandler = 
                                function(cod_salon) 
                                {
                                    return function() { 
                                
                                            crearHiddenInput("cod_salon",cod_salon);
                                         var radios = document.getElementsByName('salones');
                                            for (var i=0, len=radios.length; i<len; i++) {
                                               radios[i].disabled = true;
                                            }
                                            window.salon = 1;
                                    };
                                };
                    var div = document.createElement("div"); 
                    div.className = "row"; 
                    var row8 = document.createElement("div");
                    row8.className ="col-md-8 column";
                    var row4 = document.createElement("div");
                    row4.className ="col-md-4 column";
                    var panel = document.getElementById("panelSalones");
                    var textNote = document.createTextNode(salones[item].cod_salon);
                    var radio = document.createElement("input");
                    radio.id=salones[item].cod_salon;
                    radio.type = "radio";
                    radio.name="salones";
                    radio.value=salones[item].cod_salon;
                    radio.onclick = createClickHandler(salones[item].cod_salon);
                    row8.appendChild(textNote);
                    row4.appendChild(radio);
                    div.appendChild(row8);
                    div.appendChild(row4);
                    panel.appendChild(div);
             }
        
        }
        function seleccionMateria(cod_asig){
            var radio = document.getElementById("radio"+cod_asig);
            crearHiddenInput("cod_asig",cod_asig);
            window.horas = radio.value;
            //alert(window.horas);
                var radios = document.getElementsByName('asignatura');
                    // loop through list of radio buttons
                    for (var i=0, len=radios.length; i<len; i++) {
                       radios[i].disabled = true;
                    }
            reiniciarTabla();
            crearRadiosSalones();
        }
        function seleccionSalon(cod_salon){
            var radios = document.getElementsByName('salones');
            var cod_salon;
                    // loop through list of radio buttons
                    for (var i=0, len=radios.length; i<len; i++) {
                        if ( radios[i].checked ) { // radio checked?
                            cod_salon = radios[i].value; // if so, hold its value in val
                            crearHiddenInput("cod_salon",cod_salon);
                            break; // and break out of for loop
                        }
                    }
          //  var radio = document.getElementById(cod_salon);
          //  crearHiddenInput("cod_salon",cod_salon);
            window.salon = 1;
            //alert(window.horas);
          //  reiniciarTabla();
        }
        window.onload = genera_tabla;



    </script>

  </head>
<?php
                        if (isset($asignaturas) && is_array($asignaturas)){
                            foreach ($asignaturas as $loop){
                                $loop->nombre."<br>";
                            }
                        }
?>
<div class=" col-md-offset-2 main">
    <h1 class="page-header">Seccion</h1>
  
			<h3>
				Crear Seccion <br><br><br><br>
			</h3>
	 <?php
                if (is_array($profesor) && isset($profesor)){
                    foreach ($profesor as $p){
                         $cedula_profesor =    $p->ci_profe ;
                           echo " <h4>".$p->nombre." ".$p->apellido."</h4>";
                           echo " <h4>V-".$p->ci_profe."</h4>";
                    }
                        
                    
                }
                
            ?>
	<div class="row clearfix">
		<div class="col-md-6 column">
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
		<div class="col-md-3 column">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Materias
					</h3>
				</div>
				<div class="panel-body">
                    
					<?php
                        if (isset($asignaturas) && is_array($asignaturas)){
                            foreach ($asignaturas as $loop){
                                echo "<div class=\"row\">";
                                    echo "<div class=\"col-md-8 column\">";
                                        echo $loop->nombre;

                                    echo "</div>";

                                    echo "<div class=\"col-md-4 column\">";

                                        echo "<input type=\"radio\" id="."radio".$loop->cod_asig." onclick=\"seleccionMateria(".$loop->cod_asig.");\" name=\"asignatura\" value=".$loop->nro_horas.">";
                                    echo "</div>";
                                echo "</div>";
                            }
                        }
                    ?>
                   
				</div>
				<div class="panel-footer">
					Panel footer
				</div>
			</div>
		</div>
        <div class="col-md-3 column">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Salones
					</h3>
				</div>
				<div class="panel-body" id="panelSalones">
                    

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
			 <form id="formInscribirSeccion" action="<?= base_url("index.php/seccion/inscribirSecciones"); ?>" method="post" id="editar">
<!--                        <input type="hidden" name = "flag" value="1">-->
                        <input type="hidden" name = "cedula" value="<?= $cedula_profesor; ?>">
                        <button class="btn btn-success" type="submit">Inscribir Seccion</button>
            </form>
		</div>
		<div class="col-md-4 column">
			 <button type="button" onclick="location.reload()"class="btn btn-warning">Reiniciar</button>
		</div>
	</div>
</div>