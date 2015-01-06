<div class=" col-md-offset-2 main">
          <h2 class="sub-header">Registro de Profesor</h2>
          <div>
          <form role="form" action='<?= base_url();?>index.php/profesor/registrarProfesor' method="post">
			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Cédula:</h4>
					<div class="form-group">
                        <input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="Ejemplo: 12345678" tabindex="1" required>
					</div>
<!--                     <div class="col-xs-3 col-md-1"></div>    -->
                    <h4>Apellido:</h4>
					<div class="form-group">
                        <input type="text" name="apellido" id="apellido" class="form-control input-sm" placeholder="" tabindex="3" required>
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
                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="" tabindex="2" required>
					</div>
                    <h4>Dirección:</h4>
					<div class="form-group">
                        <input type="text" name="direccion" id="direccion" class="form-control input-sm" placeholder="" tabindex="7" required>
					</div>

				</div>

			</div>
<br>
			<div class="row">
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="12"></div>
            </form>    
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <a href="<?= base_url("index.php/profesor");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
		
          </div>
</div>