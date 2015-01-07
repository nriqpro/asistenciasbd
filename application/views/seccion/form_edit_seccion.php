<div class=" col-md-offset-2 main">
          <h2 class="sub-header">Editar seccion</h2>
          <div>
              <?php
                    if(is_array($seccion) && count($seccion) ) {
              ?>  
          <form role="form" action='<?= base_url();?>index.php/seccion/editarSeccion' method="post">
            <input type="hidden" name = "cod_seccion" value="<?php echo $seccion['cod_seccion']; ?>">  
			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Codigo del periodo:</h4>
					<div class="form-group">
                        <input type="text" name="cod_peri" id="cod_peri" class="form-control input-sm" placeholder="<?php echo $seccion["cod_peri"]; ?>" tabindex="1" required>
					</div>
                    <h4>C.I Profesor:</h4>
					<div class="form-group">
                        <input type="number" name="ci_profe" id="ci_profe" class="form-control input-sm" placeholder="<?php echo $seccion["ci_profe"]; ?>" tabindex="3" required>
					</div>
                    <h4>Codigo Asignatura:</h4>
					<div class="form-group">
                        <input type="number" name="cod_asig" id="cod_asig" class="form-control input-sm" placeholder="<?php echo $seccion["cod_asig"]; ?>" tabindex="3" required>
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
                    <a href="<?= base_url("index.php/seccion");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
		
          </div>
</div>