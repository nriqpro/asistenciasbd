<div class=" col-md-offset-2 main">
    <h1 class="page-header">Ver secciones</h1>
        <div class="col-lg-7">
         <form action="<?= base_url("index.php/seccion/seccionInfo"); ?>" method="post">
            <div class="col-xs-12 col-sm-3 col-md-5">
                <select name="tipo" class="form-control"  data-style="btn-primary">
                    <option value="Profesor">C.I Profesor</option>
                    <option value="Asig">Asignatura</option>
                     <option value="Periodo">Periodo</option>
                    <option value="Seccion">Seccion</option>
                </select>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                      <input name="contenido" type="text" class="form-control" placeholder="Ingrese Su Busqueda">
                    </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
               <button type="submit" class="btn btn-default">Buscar</button>

            </div>
            <div class="col-xs-12 col-sm-1 col-md-1">  </div>
        </form>
        </div> 
    </br>
    </br></br>
    
     <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Codigo seccion</th>
                  <th>Cod. Periodo</th>
                  <th>C.I Profesor</th>
                  <th>Nombre</th>
                  <th>Apellido</th>      
                  <th>Asignatura</th>    
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
                  <td><?=$loop->asig;?></td>     
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

    </div>