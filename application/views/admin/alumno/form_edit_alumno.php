<div class=" col-md-offset-2 main">
          <h2 class="sub-header">Editar Alumno</h2>
          <div>
              <?php
                    foreach ($alumno as $a){
              ?>  
          <form role="form" action='<?= base_url();?>index.php/alumno/updateAlumno' method="post">
            <input type="hidden" name = "cedula" value="<?php echo $a->ci_est; ?>">  
			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Cédula:</h4>
					<div class="form-group">
                        <input name="cedulaas" id="cedulaas" class="form-control input-sm" value="<?php echo $a->ci_est;?>" tabindex="1" disabled>
					</div>
                    <h4>Apellido:</h4>
					<div class="form-group">
                        <input type="text" name="apellido" id="apellido" class="form-control input-sm" placeholder="<?php echo $a->apellido ?>" tabindex="3" required>
					</div>
                    <h4>Sexo:</h4>
<!--					<div class="form-group">-->
                        <label class="radio" for="radios-0">
                        <input type="radio" name="sexo" id="radios-0" <?php if ($a->sexo=="M") echo "checked";?> value="M"  tabindex="5">
                        Masculino
                        </label>
                        <label class="radio" for="radios-1">
                        <input type="radio" name="sexo" id="radios-1"<?php if ($a->sexo=="F") echo "checked";?> value="F" tabindex="6">
                        Femenino
                        </label>
<!--					</div>-->
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Nombre:</h4>
					<div class="form-group">
                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="<?php echo $a->nombre ?>" tabindex="2" required>
					</div>
                    <h4>Dirección:</h4>
					<div class="form-group">
                        <input type="text" name="direccion" id="direccion" class="form-control input-sm" placeholder="<?php echo $a->direc ?>" tabindex="7">
					</div>

				</div>

			</div><?php } ?>
<br>
			<div class="row">
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <input type="submit" value="Guardar" class="btn btn-primary btn-block btn-lg" tabindex="12"></div>
            </form>    
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <a href="<?= base_url("index.php/alumno/verAlumnos");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
		
          </div>
</div>
