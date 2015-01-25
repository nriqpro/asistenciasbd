<div class=" col-md-offset-2 main">
          <h2 class="sub-header">Registro de Periodo</h2>
          <div>
			<form class="form-horizontal" role="form" action='<?= base_url();?>index.php/periodo/addPeriodo' method="post">
                <div class="form-group">
                    <div class="col-lg-3 col-md-5">
<!--                        Nombre-->
                        <label for="nombre" class="control-label">Nuevo codigo:</label>
                        <input  type="text" name="id" id="id" class="form-control input-sm required" placeholder="2013-4" tabindex="1" required maxlength="6">
                        <br>
					   <div class="form-group-responsive">
                        <label for="inicio" class="control-label">Fecha de inicio:</label><br>
                        <input type="date" name="inicio" class="form-control input-sm required">
					   </div>
                        <br>
                         <div class="form-group-responsive">
                        <label for="fin" class="control-label">Fecha de fin:</label><br>
<!--					       <div class="form-group">-->
                        <input type="date" name="fin" class="form-control input-sm required">
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
                    <a href="<?= base_url("index.php/periodo");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
		
          </div>

    </div>
