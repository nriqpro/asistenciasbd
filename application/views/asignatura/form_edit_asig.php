<div class=" col-md-offset-2 main">
          <h2 class="sub-header">Editar Asignatura</h2>
          <div>
             <?php
                    if(is_array($asignaturas) && count($asignaturas) ) {

              ?>              
        <form class="form-horizontal" role="form" action='<?= base_url();?>index.php/asignatura/editarAsig' method="post">
                <input type="hidden" name = "id" value="<?php echo $asignaturas['id']; ?>">   
				<div class="form-group">
                    <div class="col-lg-5 col-md-5">
<!--                        Nombre-->
                        <label for="nombre" class="col-lg-2 control-label">Nombre de la asignatura:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="<?php echo $asignaturas["descripcion"]; ?>" tabindex="1" required>
                        
<!--                        Unidades de cred-->
                        <label for="creditos_prev" class="col-lg-2 control-label">Unidades de credito (prev):</label>
                        <input disabled type="text" name="creditos_prev" id="creditos_prev" class="form-control input-sm" placeholder="<?php echo $asignaturas["unid"]; ?>" tabindex="2" required>
                  
                        <label for="creditos" class="col-lg-2 control-label">Unidades de credito:</label>
                        <select name="creditos" class="form-control"  data-style="btn-primary">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                  </select>  
                        
<!--                        Horas--> 
                    <label for="hrs_prev" class="col-lg-2 control-label">Numero de horas(prev):</label>
                        <input disabled type="text" name="hrs_prev" id="creditos_prev" class="form-control input-sm" placeholder="<?php echo $asignaturas["horas"]; ?>" tabindex="2" required>    
                    <label for="horas" class="col-lg-2 control-label">Numero de horas:</label>          
                    <select name="horas" class="form-control"  data-style="btn-primary">
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
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
                    <a href="<?= base_url("index.php/admin/asignatura");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
		
          </div>

    </div>