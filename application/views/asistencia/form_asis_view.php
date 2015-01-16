<div class=" col-md-offset-2 main">
    <h1 class="page-header">Marcar asistencia</h1>
    </br>
    </br></br>
     <form action="<?= base_url("index.php/asistencia/addAsisAlumno"); ?>" method="post">
     <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Cedula</th>    
                  <th>Nombre</th>
                  <th>Apellido</th>   
                </tr>
              </thead>
              <tbody>
                <?php
                  if (isset($asis)){
                    if(is_array($asis) && count($asis) ) {
//                        $i=0;
                        foreach($asis as $loop){
                            
                ?>
                <tr>
                  <td><?=$loop->ci_est;?></td>    
                  <td><?=$loop->nombre;?></td>
                  <td><?=$loop->apellido;?></td>   
                        
                  <td><div class="checkbox">
                      <input type="checkbox" name="ci_est[]" value="<?=$loop->ci_est;?>">
                       <?php 
                          if (isset($asistencia)){
                            if(is_array($asistencia) && count($asistencia) ) {
                                foreach($asistencia as $loop){
                        ?>
                      <input type="hidden" name="cod_seccion" value="<?=$loop->cod_seccion;?>" >
                      <input type="hidden" name="cod_asis" value="<?=$loop->cod_asis;?>" >
                      </div>
                  </td>    
                </tr>
                <?php   }}} 
//                            echo $i;
//                        $i++;
                        }
                    }
                  }
                ?>
                  
                <?php
                  if (isset($err)){?>
                  <br><br><br><br>
                    <div class="alert alert-danger col-lg-5 col-md-5" role="alert">
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="false"></span>
                      <span class="sr-only">Error:</span>
                      <?php echo $err; ?>
                    </div>
                <?php  }
                ?>  
              </tbody>
            </table>
          </div>
       
			<div class="row">
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                <input type="hidden" id="contador" name="contador" value="">
                 <input type="submit" onclick="load()" value="Guardar" class="btn btn-primary btn-block btn-lg" tabindex="12"> </div>
    </form>    
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <a href="<?= base_url("index.php/seccion");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
        <script src="<?php echo base_url("assets/js/asistencia.js"); ?>"></script>
    </div>
