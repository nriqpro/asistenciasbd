<div class=" col-md-offset-2 main">
          <h2 class="sub-header">Registro de Seccion</h2>
      <div class="table-responsive">
          <table class="table table-striped">
              <thead>
                   <tr>
                      <th>Asignatura</th>  
                       <th>Periodo</th>  
                       <th>Profesor</th>      
                    </tr>
                  </thead>
              <tbody>
                    <td>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Nombre</th>    
                            </tr>
                          </thead>
                          <tbody>
                              <?php 
                                  if (isset($asignaturas)){
                                    if(is_array($asignaturas) && count($asignaturas) ) {
                                        foreach($asignaturas as $loop){
                                ?>
                                <tr> 
                                  <td><?=$loop->nombre;?></td>
                              <td>
                                <label class="radio" for="asig">
                                    <input type="radio" name="asig" id="asig" value="<?=$loop->cod_asig;?>" checked="checked" tabindex="3">
                                </label>
                              </td>
                          </tbody>
                          <?php
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
                        </table> 
                    </td>
                    <td>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Codigo</th>
                              <th>Inicio</th>  
                              <th>Fin</th>      
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                                  if (isset($periodo)){
                                    if(is_array($periodo) && count($periodo) ) {
                                        foreach($periodo as $loop){
                                ?>
                              <td><?=$loop->cod_peri;?></td>    
                              <td><?=$loop->inicio;?></td>
                              <td><?=$loop->fin;?></td>  
                              <td>
                                <label class="radio" for="peri">
                                    <input type="radio" name="peri" id="radios-1" value="<?=$loop->cod_peri;?>" checked="checked" tabindex="4">
                                </label>
                              </td>
                          </tbody>
                         <?php
                                    }
                                }
                              }
                            ?>   
                        </table> 
                    </td>
                    <td> 
                      <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Cedula</th>    
                              <th>Nombre</th>
                              <th>Apellido</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                                  if (isset($profesor)){
                                    if(is_array($profesor) && count($profesor) ) {
                                        foreach($profesor as $loop){
                                ?>
                              <tr>
                                  <td><?=$loop->ci_profe;?></td>    
                                  <td><?=$loop->nombre;?></td>
                                  <td><?=$loop->apellido;?></td>
                                  <td>
                                    <label class="radio" for="prof">
                                        <input type="radio" name="prof" id="prof" value="<?=$loop->ci_profe;?>" checked="checked" tabindex="5">
                                    </label>
                                  </td>
                             </tr> 
                            <?php
                                    }
                                }
                              }
                            ?>
                          </tbody>
                        </table> 
                    </td>
              </tbody>
            
          </table>   
          </div>
<br>
     <form action="<?= base_url("index.php/seccion/addSeccion"); ?>" method="post">
			<div class="row">
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                  <input type="hidden" name = "cod_peri" id="cod_peri" >
                  <input type="hidden" name = "ci_profe" id= "ci_profe" >
                  <input type="hidden" name = "cod_asig" id= "cod_asig">    
                  <input type="submit" onclick="loadData()" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="12"></div>
    </form>    
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <a href="<?= base_url("index.php/seccion");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
        <script src="<?php echo base_url("assets/js/seccion.js"); ?>"></script>
        
</div>