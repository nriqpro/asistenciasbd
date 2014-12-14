<div class="container-fluid" >
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Registro de Alumno</h2>
          <div>
          <form role="form" action='<?= base_url();?>index.php/alumno/registrarAlumno' method="post">

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Cédula:</h4>
					<div class="form-group">
                        <input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="Ejemplo: 12345678" tabindex="1" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Nombre:</h4>
					<div class="form-group">
                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="" tabindex="2" required>
					</div>
				</div>

			</div>

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Primer apellido:</h4>
					<div class="form-group">
                        <input type="text" name="apellido1" id="apellido1" class="form-control input-sm" placeholder="" tabindex="3" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Segundo apellido:</h4>
					<div class="form-group">
                        <input type="text" name="apellido2" id="apellido2" class="form-control input-sm" placeholder="" tabindex="4" required>
					</div>
				</div>
			</div>

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Sexo:</h4>
					<div class="form-group">
                        <label class="radio" for="radios-0">
                        <input type="radio" name="sexo" id="radios-0" value="M" checked="checked" tabindex="5">
                        Masculino
                        </label>
                        <label class="radio" for="radios-1">
                        <input type="radio" name="sexo" id="radios-1" value="F" tabindex="6">
                        Femenino
                        </label>
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Fecha de nacimiento:</h4>
					<div class="form-group">
                        <input type="date" name="fecha_nac" class="input-sm">
					</div>
				</div>


			</div>
			<div class="row">

 				<div class="col-xs-12 col-sm-12 col-md-12">
                    <h4>Dirección:</h4>
					<div class="form-group">
                        <input type="text" name="dir" id="dir" class="form-control input-sm" placeholder="" tabindex="7">
					</div>
				</div>

			</div>
			

<br>
			<div class="row">
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="12"></div>
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <a href="<?= base_url();?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
		</form>
          </div>
        </div>
      </div>
    </div>