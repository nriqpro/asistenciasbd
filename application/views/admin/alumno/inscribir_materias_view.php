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
    
     /*    function generar_hidden(){
            var theForm = document.getElementById("formInscribir");
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name ="inputContador";
                input.id= "inputContador";
                input.value = 0
                theForm.appendChild(input);
         }*/
         
         function generar_materias_disponibles(){
             var materias = eval(<?php echo json_encode($infoSecciones);?>);
            
             
             var materiasDisponibles = document.getElementById("MateriasDisponibles");
             
              for (item in materias) {
                var li = document.createElement("li");
                  li.id = "md"+materias[item].cod_seccion;
                var radio = document.createElement("input");
                  var textNote = document.createTextNode(materias[item].asignatura + "-["+materias[item].cod_seccion +"]");
                  radio.type = "radio";
                  radio.id=materias[item].asignatura;
                  radio.name="materiasDisponibles";
                  radio.value=materias[item].cod_seccion;
                  li.appendChild(textNote);
                  li.appendChild(radio);
                  materiasDisponibles.appendChild(li);
                  
                  
              }
                  
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
          var tblBody = document.getElementById("bodyHorario");
          for (var i = 0; i < 14; i++) {
                var hilera = document.createElement("tr");
                for (var j = 0; j < 6; j++) {
                      var celda = document.createElement("td");
                        celda.style.backgroundColor="white";
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
         
         function reiniciar(){
            location.reload();
         }
         
         function isDesocupada(i,j,columna,tipo){
             if (tipo==0)
                 return 1;
            for (var k = i ; k <= j ; k++){                        
                var celda = document.getElementById((k*10 + columna).toString());
                if (celda.style.backgroundColor!="white")
                    return 0;
            }
             return 1;
         
         }
         
         function colorear_tabla( horas, tipo){

       
             var materias = eval(<?php echo json_encode($infoSecciones);?>);
            
            var horas_inicio = ["07:00:00","08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00",
                               "16:00:00","17:00:00","18:00:00","19:00:00","20:00:00"];
            var horas_fin = ["08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00",
                               "16:00:00","17:00:00","18:00:00","19:00:00","20:00:00","21:00:00"];
             
             
            var arregloCodSeccion = new Array();
            var i=0;
             for (item in materias) {
                arregloCodSeccion[i++] = materias[item].cod_seccion;
             }
            var arrayColores =["aqua","limegreen","teal","DeepSkyBlue","silver","orange","red","yellow","Magenta","salmon","greenyellow","slateblue","lightskyblue","aquamarine"]; 
            for (item in horas) {
                var columna ;
                
                if (horas[item].dia == "Lunes") columna = 1;
                if (horas[item].dia == "Martes") columna = 2;
                if (horas[item].dia == "Miercoles") columna = 3;
                if (horas[item].dia == "Jueves") columna = 4;
                if (horas[item].dia == "Viernes") columna = 5;
                

                  for ( var i=0 ; i < horas_inicio.length ; i++){
                        if(horas[item].hora_ini == horas_inicio[i]){
                            for (var j=0 ; j < horas_fin.length ; j++){
                                if (horas[item].hora_fin== horas_fin[j]){
                                    var aux = 0;
                                   if ((isDesocupada(i,j,columna,tipo))==1){
                                            for (var k = i ; k <= j ; k++){

                                                var celda = document.getElementById((k*10 + columna).toString());
                                                for (var z = 0 ; z < arregloCodSeccion.length ; z++){
                                                    if (arregloCodSeccion[z] == horas[item].cod_seccion){
                                                        if (tipo == 1)
                                                            celda.style.backgroundColor  = arrayColores[z];
                                                        else
                                                            celda.style.backgroundColor ="white";
                                                    }
                                                }

                                                if (aux==0){
                                                    if (tipo == 1){
                                                        //celda.innerHTML = horas[item].cod_seccion;
                                                        for (itemxs in materias) {
                                                             if (horas[item].cod_seccion == materias[itemxs].cod_seccion){
                                                                 celda.innerHTML =  materias[itemxs].asignatura;
                                                                break;
                                                             }
                                                        }
                                                    }
                                                    else
                                                         celda.innerHTML="";
                                                    aux=1;   
                                                }
                                                else
                                                    if (tipo == 1)
                                                        celda.innerHTML  = horas[item].cod_salon;
                                                    else 
                                                        celda.innerHTML="";

                                            }
                                   }
                                    
                                     else { alert("ESTA MATERIA CHOCA CON UNA YA INSCRITA!!!!"); return 0;}
                                    
                                }
                            }
                        }
                  }

        
            }
         }
         
         function crearHiddenInput(cod_seccion){
                var theForm = document.getElementById("formInscribir");
               // var cont = document.getElementById("inputContador");
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name ="sec"+cod_seccion;
                input.id = "sec"+cod_seccion;
               // cont.value = ( parseInt(cont.value, 10)+1).toString();
                input.value = cod_seccion;
                theForm.appendChild(input);
         }
         
         function eliminarHiddenInput(cod_seccion){
              var radios = document.getElementsByName('materiasPreinscritas');
                    var asignatura;
                    // loop through list of radio buttons
                    for (var i=0, len=radios.length; i<len; i++) {
                        if ( radios[i].checked ) { // radio checked?
                            cod_seccion = radios[i].value; // if so, hold its value in val
                            asignatura = radios[i].value;
                            break; // and break out of for loop
                        }
                    }
                    var input = document.getElementById("sec"+asignatura);
                    if (input!=null)
                        input.remove();
         }
          
        function preinscribir(){
            
                   
                    var cod_seccion = -1;
                    var radios = document.getElementsByName('materiasDisponibles');
                    var asignatura;
                    // loop through list of radio buttons
                    for (var i=0, len=radios.length; i<len; i++) {
                        if ( radios[i].checked ) { // radio checked?
                            cod_seccion = radios[i].value; // if so, hold its value in val
                            asignatura = radios[i].id;
                            break; // and break out of for loop
                        }
                    }
                if (cod_seccion==-1)//no encontro codigo seleccionado
                    return;
            
            
                var horarios = eval(<?php echo json_encode($horarios);?>);
                for (item in horarios){
                    for (subitem in horarios[item]){
                        if (horarios[item][subitem].cod_seccion == cod_seccion){
                            if (colorear_tabla(horarios[item],1)==0)
                                return
                            else
                                break;
                        }
                    }
                }
                var materiaDispEliminada = document.getElementById("md"+cod_seccion).remove();
                var materiasPreinscritas = document.getElementById("MateriasPreinscritas");

                    var li = document.createElement("li");
                    li.id = "mp"+cod_seccion;
                    var textNote = document.createTextNode(asignatura+"-["+cod_seccion+"]");
                    var radio = document.createElement("input");
                    radio.id =asignatura;
                    radio.type = "radio";
                    radio.name="materiasPreinscritas";
                    radio.value=cod_seccion;
            
                    li.appendChild(textNote);
                    li.appendChild(radio);
                    materiasPreinscritas.appendChild(li);
          //   var materiaPreinsEliminada = document.getElementById(cod_seccion).remove();
            
                    crearHiddenInput(cod_seccion);

        }
         
         function cancelar_preinscripcion(){
                    var cod_seccion = -1;
                    var radios = document.getElementsByName('materiasPreinscritas');
                    var asignatura;
                    // loop through list of radio buttons
                    for (var i=0, len=radios.length; i<len; i++) {
                        if ( radios[i].checked ) { // radio checked?
                            cod_seccion = radios[i].value; // if so, hold its value in val
                            asignatura = radios[i].id;
                            break; // and break out of for loop
                        }
                    }
                if (cod_seccion==-1)//no encontro codigo seleccionado
                    return;
            
             
                      var horarios = eval(<?php echo json_encode($horarios);?>);
                for (item in horarios){
                    for (subitem in horarios[item]){
                        if (horarios[item][subitem].cod_seccion == cod_seccion){
                            colorear_tabla(horarios[item],0);
                            break;
                        }
                    }
                }
             
                    eliminarHiddenInput(cod_seccion);
                    var materiaPreinsEliminada = document.getElementById("mp"+cod_seccion).remove();
                    
                   var materiasDisponibles = document.getElementById("MateriasDisponibles");

                    var li = document.createElement("li");
                    li.id = "md"+cod_seccion;
                    var textNote = document.createTextNode(asignatura+"-["+cod_seccion+"]");
                    var radio = document.createElement("input");
                    radio.id=asignatura;
                    radio.type = "radio";
                    radio.name="materiasDisponibles";
                    radio.value=cod_seccion;
               //     var materiaPreinsEliminada = document.getElementById(cod_seccion).remove();
                    li.appendChild(textNote);
                    li.appendChild(radio);
                    materiasDisponibles.appendChild(li);
             
                
        }
        function lanzar_funciones(){
            genera_tabla();
            generar_materias_disponibles();
            
        }
                      
        window.onload = lanzar_funciones;
        
       
           
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
		<div class="row clearfix">
		<div class="col-md-12 column">
			<h3> <strong>
				Inscripcion de Materias
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
	</div>
        <div class="row clearfix">
               <div class="col-md-3  column"><h2>Materias Disponibles</h2></div>
              <div class="col-md-6  column"></div>
              <div class="col-md-3  column"><h2>Materias Preinscritas</h2></div>
        </div>
	<div class="row clearfix">
		  <div class="col-md-3  column">
			<ol  id="MateriasDisponibles">
			
			</ol> 
              <button type="button" class="btn btn-primary" onclick="preinscribir()">Preinscibir Materia</button>
		</div>
        
		<div class="col-md-6 column">
			<table class="table table-bordered table-condensed">
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
				<tbody id="bodyHorario">
			
				</tbody>
			</table>
		</div>
        <div class="col-md-3  column">
			<ol id="MateriasPreinscritas">
			
			</ol> 
              <button type="button" class="btn btn-danger" onclick="cancelar_preinscripcion()">Eliminar Materia</button>
		</div>
		
	</div>
        <br><br><br><br>
	<div class="row clearfix">
		
		<div class="col-md-4 column">
            <form id="formInscribir" action="<?= base_url("index.php/alumno/inscribirSeccionesBD"); ?>" method="post" id="editar">
                        <input type="hidden" name = "cedula" value="<?= $alumno['cedula']; ?>">
                        <input type="hidden" name = "inputContador" id="inputContador" value="0">
                        <button class="btn btn-success" type="submit">Inscribir</button>
            </form>
			 
		</div>
        <div class="col-md-4 column">
			 <button type="button" onclick="reiniciar()" class="btn btn-warning">Reiniciar</button>
		</div>
		<div class="col-md-4 column">
			 <form action="<?= base_url("index.php/alumno/gestionAlumno"); ?>" method="post" id="editar">
                            <input type="hidden" name = "cedula" value="<?= $alumno['cedula']; ?>">
                            <button class="btn btn-danger" type="submit">Cancelar y Regresar</button></input>
            </form>
		</div>
	</div>
</div>