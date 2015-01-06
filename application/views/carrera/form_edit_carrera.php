<div class=" col-md-offset-2 main">
          <h2 class="sub-header">Editar Carrera</h2>
          <div>
              <?php
                    if(is_array($carreras) && count($carreras) ) {
              ?>  
          <form role="form" action='<?= base_url();?>index.php/carrera/editarCarrera' method="post">
            <input type="hidden" id="id" name ="id" value="<?php echo $carreras['id']; ?>">  
			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Nombre:</h4>
					<div class="form-group">
                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="<?php echo $carreras["nombre"]; ?>" tabindex="1" required>
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
                    <a href="<?= base_url();?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
		
          </div>
</div>