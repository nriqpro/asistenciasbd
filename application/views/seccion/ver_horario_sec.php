<div class=" col-md-offset-2 main">
    <h1 class="page-header">Detalle Seccion:</h1>
   
<!--    <div class="row clearfix">-->
        <?php if(isset($seccion) and isset($salon)) {  
//              if(is_array($seccion) && count($seccion) ) {
                foreach($seccion as $loop){ ?>
        <div class="col-md-4 column">
			<div class="panel panel-default">
				<div class="panel-heading">
                      <form action="<?= base_url("index.php/seccion/cargarAddSalonSecc"); ?>" method="post">
                    <input type="hidden" name = "cod_seccion" id="cod_seccion" value=  <?= $loop->cod_seccion; ?>>   
					<h3 class="panel-title">
						Profesor: <?= $loop->nombre." ".$loop->apellido; ?>
					</h3>
				</div>
				<div class="panel-body">
                  <dl>
                     <dt>
				        Cedula:
				    </dt>
                    <dd>
                        <?= $loop->ci_profe; ?>
                    </dd>
                      <dt>
				    Asignatura:
				</dt>
				<dd>
					<?= $loop->asig; ?>
				</dd>
                    </dl>     
                </div>
				<div class="panel-footer">
				</div>
			  </div>
            </div>
        <?php  } ?>

	 <div class="col-md-6 table-responsive">
            <table class="table table-striped">
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
            <table class="table table-striped">
              <thead>
                 
                <tr>
                  <th>C.I Alumno</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Sexo</th>       
                </tr>
              </thead>
              <tbody>
                <?php
                  if (isset($alumno)){
                    if(is_array($alumno) && count($alumno) ) {
                        foreach($alumno as $loop){
                ?>
                <tr>
                  <td><?=$loop->ci_est;?></td>    
                  <td><?=$loop->nombre;?></td>     
                  <td><?=$loop->apellido;?></td>     
                  <td><?=$loop->sexo;?></td>        
                  <td>
                  </td>

                </tr>
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
              </tbody>
            </table>
          </div>
        
			<div class="row">
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3"> 
                  <input type="submit" value="Añadir Salon" class="btn btn-primary btn-block btn-lg" tabindex="12"></div>
        </form>    
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <a href="<?= base_url("index.php/seccion");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
        <script src="<?php echo base_url("assets/js/seccion.js"); ?>"></script>