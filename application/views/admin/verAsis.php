<div class=" col-md-offset-2 main">
    <h1 class="page-header">Detalle Asistencia:</h1>
<!--    <div class="row clearfix">-->
        <?php if(isset($asis)) {  
//              if(is_array($asis) && count($asis) ) {
                $i=0;
                foreach($asis as $loop){
                    
                if ($i==0){                                 ?>
        <div class="col-md-4 column">
			<div class="panel panel-default">
				<div class="panel-heading">  
					<h3 class="panel-title">
						Profesor: <?= $loop->nombre." ".$loop->apellido; ?>
					</h3>
				</div>
				<div class="panel-body">
                  <dl>
                      <dt>
				    Asignatura:
				</dt>
				<dd>
					<?= $loop->asignatura; ?>
				</dd>
                    </dl>     
                </div>
				<div class="panel-footer">
				</div>
			  </div>
            </div>
        <?php $i=1;} }} ?>

     <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                 
                <tr>
<!--                  <th>Codigo Asistencia</th>-->
                  <th>Seccion</th>
                  <th>Periodo</th>
                  <th>Fecha</th>       
                </tr>
              </thead>
              <tbody>
                <?php
                  if (isset($asis)){
                    if(is_array($asis) && count($asis) ) {
                        foreach($asis as $loop){
                ?>
                <tr>
<!--                  <td><?=$loop->cod_asis;?></td>    -->
                  <td><?=$loop->cod_seccion;?></td>     
                  <td><?=$loop->cod_peri;?></td>     
                  <td><?=$loop->fecha;?></td>
                  <td>
                       <form action="<?=  base_url("index.php/asistencia/verAsisAlumnos");?>" method="post" id="asis">
                            <input type="hidden" name = "cod_asis" value="<?= $loop->cod_asis; ?>">
                            <input type="hidden" name = "cod_seccion" value="<?= $loop->cod_seccion; ?>">
                             <input type="hidden" name = "fecha" value="<?= $loop->fecha; ?>">
                           <button class="btn btn-xs btn-info" type="submit">Ver</button>
                        </form>
                  </td>    
                  <td>
                   <form action="<?=  base_url("index.php/asistencia/cargarAddAsis");?>" method="post" id="asis">
                            <input type="hidden" name = "cod_asis" value="<?= $loop->cod_asis; ?>">
                            <input type="hidden" name = "cod_seccion" value="<?= $loop->cod_seccion; ?>">
                             <input type="hidden" name = "fecha" value="<?= $loop->fecha; ?>">
                           <button class="btn btn-xs btn-primary" name= "cargar" id="cargar" value="<?=$loop->cargada;?>" type="submit" >Cargar</button>
                        </form>      
                      </td>
                    <td>
                       <form action="<?=  base_url("index.php/asistencia/cargarEditarAsis");?>" method="post" id="asis">
                            <input type="hidden" name = "cod_asis" value="<?= $loop->cod_asis; ?>">
                            <input type="hidden" name = "cod_seccion" value="<?= $loop->cod_seccion; ?>">
                           <button class="btn btn-xs btn-warning" type="submit">Editar</input>
                        </form>
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
                  <input type="submit" value="Añadir Asistencia" class="btn btn-primary btn-block btn-lg" tabindex="12"></div>
<!--        </form>    -->
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <a href="<?= base_url("index.php/seccion");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Regresar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>