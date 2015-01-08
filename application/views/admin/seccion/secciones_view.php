<div class=" col-md-offset-2 main">
    <h1 class="page-header">Secciones</h1>
        <div class="col-lg-7">
         <form action="<?= base_url("index.php/seccion/getSeccion"); ?>" method="post">
              <div class="form-group">
                <label for="nombre">Codigo:</label>
                <input class="form-control " type="text" name="cod_seccion" placeholder="2013-4">
                  </br>
             <div class="col-md-5">    
                <button type="submit" class="btn btn-default">Buscar</button>
             </div>
        </form>
            <div class="col-md-7">    
            <a id="addPeriodo" href="<?= base_url("index.php/seccion/formularoSeccion");?>">
                <button type="button" class="btn btn-success">Registrar Seccion</button>
            </a>    
            </div>
            </div>
        </div> 
    </br>
        
    </br></br>
    
     <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Codigo</th>    
                  <th>Periodo</th>
                  <th>Profesor</th>
                  <th>Materia</th>
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
                  <td><?php echo $loop->nombre." ".$loop->apellido ;?></td>
                  <td><?=$loop->asignatura;?></td>
                    <td>
                      <form action="<?=  base_url("index.php/seccion/gestionSeccion");?>"method="post" id="periodo">
                            <input type="hidden" name = "id" value="<?= $loop->cod_seccion; ?>">
                            <button class="btn btn-xs btn-primary" type="submit">Ver</input>
                        </form>
                  </td>
                  <td>
                      <form action="<?=  base_url("index.php/seccion/cargarEditarSeccion");?>" method="post" id="periodo">
                            <input type="hidden" name = "id" value="<?= $loop->cod_seccion; ?>">
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