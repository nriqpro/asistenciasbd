<div class=" col-md-offset-2 main">
    <h1 class="page-header">Ver Profesores</h1>
        <div class="col-lg-7">
         <form action="<?= base_url("index.php/profesor/profesorByID"); ?>" method="post">
              <div class="form-group">
                <label for="cedula">Cedula:</label>
                <input class="form-control " type="number" name="cedula" placeholder="123456">
                  </br>
             <div class="col-md-5">    
                <button type="submit" class="btn btn-default">Buscar</button>
             </div>
        </form>
            <div class="col-md-7">    
            <a id="agregarProf" href="<?= base_url("index.php/profesor/formularioProf");?>">
                <button type="button" class="btn btn-success">Registrar profesor</button>
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
                  <th>Cedula</th>    
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Sexo</th>
                  <th>Direccion</th>    
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
                  <td><?=$loop->sexo;?></td>
                  <td><?=$loop->direc;?></td>    
                  <td>
                      <form action="<?=  base_url("index.php/profesor/cargarEditarProf");?>" method="post" id="profesores">
                            <input type="hidden" name = "cedula" value="<?= $loop->ci_profe; ?>">
                            <input type="hidden" name = "nombre" value="<?= $loop->nombre; ?>">
                            <input type="hidden" name = "apellido" value="<?= $loop->apellido; ?>">
                            <input type="hidden" name = "sexo" value="<?= $loop->sexo; ?>">
                            <input type="hidden" name = "direccion" value="<?= $loop->direc; ?>">
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