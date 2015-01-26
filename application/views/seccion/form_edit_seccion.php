<div class=" col-md-offset-2 main">
          <h2 class="sub-header">Editar Seccion</h2>
      <?php if(isset($seccion) and isset($salon) && isset($salones) && count($salones)) {
//              if(is_array($seccion) && count($seccion) ) {
                foreach($seccion as $loop){ 
                ?>
        <div class="col-md-4 column">
            <input type="hidden" id="tsalones" value="<?= count($salones); ?>"></input>
			<div class="panel panel-default">
				<div class="panel-heading">
<!--                      <form action="<?= base_url("index.php/seccion/cargarAddSalonSecc"); ?>" method="post">-->  
					<h3 class="panel-title" id="profesorNombre">
						Profesor: <?= $loop->nombre." ".$loop->apellido; ?>
					</h3>
				</div>
				<div class="panel-body">
                  <dl>
                     <dt>
				        Cedula:
				    </dt>
                    <dd id="cedulaprof">
                        <?= $loop->ci_profe; ?>
                    </dd>
                      <dt>
				    Asignatura:
				</dt>
				<dd id="asignaturaNombre">
					<?= $loop->asig; ?>
				</dd>
                    </dl>     
                </div>
				<div class="panel-footer">
                    Periodo: <?= $loop->cod_peri; ?>
				</div>
			  </div>
            </div>
        <?php }
            foreach($salones as $loop){?>
                <input type="hidden" name="idsalon" id="idsalon" value="<?= $loop->cod_salon; ?>" >
        <?php } ?>

	 <div class="col-md-8 table-responsive">
            <table class="table table-striped" id="horario">
              <thead>
                 
                <tr>
                  <h4>Horario </h4>   
                    <th>Salon:</th>
                    <th>Dia:</th>
                    <th>Hora Inicio:</th>
                    <th>Hora Fin:</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach($salon as $loop){ ?>
                <tr>
                  <td><?= $loop->cod_salon ?></td> 
                  <td><?=$loop->dia;?></td> 
                  <td><?= $loop->hora_ini; ?></td>     
                  <td><?= $loop->hora_fin; ?></td>
                  <td>   <label class="checkbox" for="sa">
                  <input type="checkbox" name="sa" id="sa" value="<?=$loop->cod_salon;?>" checked="checked" tabindex="3">
                 <span class="glyphicon glyphicon-edit" aria-hidden="false" onclick="addSalon()"></span>  
                 <span class="glyphicon glyphicon-remove" aria-hidden="false"></span>

                  </td>

                </tr>
                <?php
                        }
                    }
                ?>
              </tbody>
            </table>  
        </div>
      <div class="table-responsive">
          <table class="table table-striped" id="contenido">
              <thead>
                   <tr>
                      <th>Asignatura</th>  
                       <th>Periodo</th>  
                       <th>Profesor</th>      
                    </tr>
                  </thead>
              <tbody>
                    <td>
                        <table class="table table-hover" id="asignatura">
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
<!--                                <input type="hidden" id="tasig" value="<?= count($asignaturas); ?>"-->
                                    <label class="radio" for="asig">
                                        <input onclick="previewData()" type="radio" name="asig" id="asig" value="<?=$loop->cod_asig;?>" checked="checked" tabindex="3">
                                    </label>
                                    </td>
                                </tr>
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
                        <table class="table table-hover" id="periodo">
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
                      <table class="table table-hover" id="profesor">
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
  <?php   if(isset($seccion) and isset($salon)) {  
//              if(is_array($seccion) && count($seccion) ) {
                foreach($seccion as $loop){ ?>
     <form action="<?= base_url("index.php/seccion/editarSeccion"); ?>" method="post">
			<div class="row">
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                  <input type="hidden" name = "cod_peri" id="cod_peri" >
                  <input type="hidden" name = "ci_profe" id= "ci_profe" >
                  <input type="hidden" name = "cod_asig" id= "cod_asig">
                  <input type="hidden" name = "cod_salon" id= "cod_salon">
                  <input type="hidden" name = "cod_salonv" id= "cod_salonv">
                 <input type="hidden" name = "hora_iniv" id= "hora_iniv">
                  <input type="hidden" name = "diav" id= "diav">
                  <input type="hidden" name = "hora_ini" id= "hora_ini">
                  <input type="hidden" name = "hora_fin" id= "hora_fin">
                  <input type="hidden" name = "dia" id= "dia">
                  <input type="hidden" name = "cod_seccion" id="cod_seccion" value=  <?= $loop->cod_seccion; ?> >     
                  <input type="submit" onclick="loadData()" value="Guardar" class="btn btn-primary btn-block btn-lg" tabindex="12"></div>
    </form>    
          <?php
                        }
                    }
                ?>
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <a href="<?= base_url("index.php/seccion");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
        <script src="<?php echo base_url("assets/js/seccion.js"); ?>"></script>
        
</div>
