<div class=" col-md-offset-2 main">
          <h2 class="sub-header">Editar Profesor</h2>
          <div>
              <?php
                    if(is_array($profesor) && count($profesor) ) {
              ?>  
          <form role="form" action='<?= base_url();?>index.php/profesor/editarProfesor' method="post">
            <input type="hidden" name = "ci" value="<?php echo $profesor['cedula']; ?>">  
			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Cédula:</h4>
					<div class="form-group">
                        <input name="cedula" id="cedula" class="form-control input-sm" value="<?php echo $profesor['cedula']; ?>" tabindex="1" disabled>
					</div>
                    <h4>Apellido:</h4>
					<div class="form-group">
                        <input type="text" name="apellido" id="apellido" class="form-control input-sm" placeholder="<?php echo $profesor["apellido"]; ?>" tabindex="3" maxlength="20" required>
					</div>
                    <h4>Sexo:</h4>
<!--					<div class="form-group">-->
                        <label class="radio" for="radios-0">
                        <input type="radio" name="sexo" id="radios-0" value="M" checked="checked" tabindex="5">
                        Masculino
                        </label>
                        <label class="radio" for="radios-1">
                        <input type="radio" name="sexo" id="radios-1" value="F" tabindex="6">
                        Femenino
                        </label>
<!--					</div>-->
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Nombre:</h4>
					<div class="form-group">
                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="<?php echo $profesor["nombre"]; ?>" tabindex="2" maxlength="20" required>
					</div>
                    <h4>Dirección:</h4>
					<div class="form-group">
                        <input type="text" name="direccion" id="direccion" class="form-control input-sm" placeholder="<?php echo $profesor["direccion"]; ?>" tabindex="7" required maxlength="40">
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
                    <a href="<?= base_url("index.php/profesor");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
		
          </div>
</div>
