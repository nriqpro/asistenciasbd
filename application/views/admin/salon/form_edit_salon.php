
<div class=" col-md-offset-2 main">
          <h2 class="sub-header">Editar Salon</h2>
          <div>
             <?php
                    if(isset($salon) ) {

              ?>              
        <form class="form-horizontal" role="form" action='<?= base_url();?>index.php/salon/updateSalon' method="post">
				<div class="form-group">
                    <div class="col-lg-5 col-md-5">
<!--                        Nombre-->
                        <input type="hidden" id="cod_salon" name = "cod_salon" value="<?php echo $salon; ?>"> 
                        <label for="cod_salon" class=" control-label">Codigo de Salon:</label>
                        <input type="text" name="mostrarcod" id="mostrarcod" class="form-control input-sm" placeholder="<?php echo $salon;?>" tabindex="1" disabled>
                        
                  
                        <label for="capacidad" class="control-label">Capacidad:</label>
                        <select name="capacidad" class="form-control"  data-style="btn-primary">
                          <option value="20">20</option>
                          <option value="30">30</option>
                          <option value="40">40</option>
                        </select>  
                        
                        </div>
					</div>
                    
                <?php } ?>
   
            <br>
			<div class="row">
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <input type="submit" value="Guardar" class="btn btn-primary btn-block btn-lg" tabindex="12"></div>
        </form>
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <a href="<?= base_url("index.php/salon/verSalones");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
		
          </div>

    </div>