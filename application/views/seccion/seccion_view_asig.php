<div class=" col-md-offset-2 main">
    <h1 class="page-header">Secciones que cursan:</h1>
    <div class="row clearfix">
        
         <?php if(isset($seccion)) {  
              if(is_array($seccion) && count($seccion) ) {
                foreach($seccion as $loop){ ?>
		<div class="jumbotron col-md-5 column">

			<dl>
				<dt>
				    Asignatura:
				</dt>
				<dd>
					<?= $loop->asig; ?>
				</dd>
			</dl> <address> </address>
            
		</div>
        <?php
                        }
                    }
                }
        ?>
	</div>
     <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Codigo seccion</th>
                  <th>Cod. Periodo</th>
                  <th>C.I Profesor</th>
                  <th>Nombre</th>
                  <th>Apellido</th>       
                </tr>
              </thead>
              <tbody>
                <?php
                  if (isset($seccion)){
                    if(is_array($seccion) && count($seccion) ) {
                        foreach($seccion as $loop){
                ?>
                <tr>
                  <td><?=$loop->cod_seccion;?></td>    
                  <td><?=$loop->cod_peri;?></td>     
                  <td><?=$loop->ci_profe;?></td>     
                  <td><?=$loop->nombre;?></td>
                  <td><?=$loop->apellido;?></td>        
                  <td>
                      <form action="<?=  base_url("index.php/seccion/cargarEditarSec");?>" method="post" id="secciones">
                          <input type="hidden" name = "cod_seccion" value="<?= $loop->cod_seccion; ?>">
                          <input type="hidden" name = "cod_peri" value="<?= $loop->cod_peri; ?>">
                          <input type="hidden" name = "ci_profe" value="<?= $loop->ci_profe; ?>">
                          <input type="hidden" name = "cod_asig" value="<?= $loop->cod_asig; ?>">
                          <button class="btn btn-xs btn-primary" type="submit">Editar</input>
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
<!--                <div class="col-xs-6 col-md-2"></div>-->
				<div class="col-xs-6 col-md-3">
                    <a href="<?= base_url("index.php/seccion");?>" class="btn btn-info btn-block btn-lg" tabindex="13">Regresar</a> 
                </div>
                <div class="col-xs-6 col-md-2"></div>
			</div>

    </div>