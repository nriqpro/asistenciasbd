<div class=" col-md-offset-2 main">
          <h2 class="sub-header">Registro de Asignatura</h2>
          <div>
			<form class="form-horizontal" role="form" action='<?= base_url();?>index.php/asignatura/cargarAsig' method="post">
                <div class="form-group">
                    <div class="col-lg-5 col-md-5">
<!--                        Nombre-->
                        <label for="nombre" class="control-label">Nombre de la asignatura:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Ejemplo: Calculo I" tabindex="1" required>
<!--                        Unidades de cred-->
                        <label for="creditos" class=" control-label">Unidades de credito:</label>
                        <select name="creditos" class="form-control"  data-style="btn-primary">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                  </select>  
                        
<!--                        Horas-->  
                    <label for="horas" class="control-label">Numero de horas:</label>          
                    <select name="horas" class="form-control"  data-style="btn-primary">
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                  </select>
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
                    <a href="<?= base_url("index.php/admin/asignatura");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
		
          </div>

    </div>