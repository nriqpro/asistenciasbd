<div class=" col-md-offset-2 main">
    <h1 class="page-header">Alumnos</h1>
    <div class="row clearfix">
		<div class="col-md-12 column">
			<h3>
				Gestion de Alumno
			</h3>
            <?php if(isset($err)) 
                echo "<h2>Error Alumno no Encontrado</h2>"; 
            else{
            ?>
		</div>
	</div>
	<div class="row clearfix">

        <?php
       
        if( is_array($alumno) && count($alumno) ) {
                    foreach($alumno as $loop){
        $cedula_estudiante = $loop->ci_est;
        $nombre_estudiante =$loop->nombre." ".$loop->apellido; ?>
		<div class="col-md-8 column">

			<dl>
				<dt>
					Cedula
				</dt>
				<dd>
					<?= $loop->ci_est; ?>
				</dd>
				<dt>
					Nombre
				</dt>
				<dd>
					<?= $loop->nombre." ".$loop->apellido; ?>
				</dd>
				<dt>
					Sexo
				</dt>
				<dd>
					<?= $loop->sexo=='M'?("Masculino"):("Femenino") ?>
				</dd>
				<dt>
				    Direccion
				</dt>
				<dd>
					<?= $loop->direc; ?>
				</dd>
                <?php

                    }
                        }?>
			</dl> <address> </address>

		</div>
	</div>
    <div class="row clearfix">
        <div class="col-md-3 column">
                    <?php
                if (isset($inscrita))
                    echo "<button class=\"btn btn-primary\" type=\"submit\" disabled >Inscribir Materias</button>";
                    else{?>
                    <form action="<?= base_url("index.php/alumno/inscribirMaterias"); ?>" method="post" id="horario">
                               <input type="hidden" name = "cedula" value="<?= $cedula_estudiante; ?>">
                               <input type="hidden" name = "nombre" value="<?= $nombre_estudiante; ?>">
                                  <button class="btn btn-primary" type="submit" >Inscribir Materias</button></input>
                    </form>
                <?php } ?>
				</div>
				<div class="col-md-3 column">
                    <form action="<?= base_url("index.php/alumno/verHorarioAlumno"); ?>" method="post" id="horario">
                               <input type="hidden" name = "cedula" value="<?= $cedula_estudiante; ?>">
                               <input type="hidden" name = "nombre" value="<?= $nombre_estudiante; ?>">
                                  <button class="btn btn-primary" type="submit">Ver Horario</input>
                    </form>
				</div>
				<div class="col-md-3 column">
					  <form action="<?= base_url("index.php/alumno/editarAlumno"); ?>" method="post" id="editar">
                               <input type="hidden" name = "cedula" value="<?= $cedula_estudiante; ?>">
                                  <button class="btn btn-success" type="submit">Editar</button></input>
                    </form>
				</div>
				<div class="col-md-3 column">
                   <a href="<?= base_url("index.php/alumno/verAlumnos");?>">
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </a>
				</div>
			</div>
 <?php 
            };
?>
</div>
