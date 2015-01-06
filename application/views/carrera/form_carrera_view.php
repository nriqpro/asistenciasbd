<div class=" col-md-offset-2 main">
          <h2 class="sub-header">Registro de Carrera</h2>
          <div>
			<form class="form-horizontal" role="form" action='<?= base_url();?>index.php/carrera/registrarCarrera' method="post">
                <div class="form-group">
                    <div class="col-lg-5 col-md-5">
<!--                        Nombre-->
                        <label for="nombre" class="control-label">Nombre de la carrera:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Ejemplo: Ingenieria" tabindex="1" required>
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
                    <a href="<?= base_url("index.php/carrera");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
		
          </div>

    </div>