<div class=" col-md-offset-2 main">
    <h1 class="page-header">Ver Carreras</h1>
        <div class="col-lg-7">
         <form action="<?= base_url("index.php/carrera/cargarCarBuscada"); ?>" method="post">
              <div class="form-group">
                <label for="nombre">Nombre carrera</label>
                <input class="form-control " type="text" name="nombreb" placeholder="Ejemplo: Ing. Informatica">
                  </br>
             <div class="col-md-5">    
                <button type="submit" class="btn btn-default">Buscar</button>
             </div>
        </form>
            <div class="col-md-7">    
            <a id="agregarAsig" href="<?= base_url("index.php/carrera/formularioCarrera");?>">
                <button type="button" class="btn btn-success">Registrar carrera</button>
            </a>    
            </div>
            </div>
        </div> 
    </br>
        
    </br></br>
<div class="row"></div>
    <div class="col-md-12">
     <div class="table-responsive col-lg-8">
            <table class="table table-striped">
              <thead>
                <tr>
<!--                  <th>Codigo</th>    -->
                  <th>Nombre</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if (isset($carreras)){
                    if(is_array($carreras) && count($carreras) ) {
                        foreach($carreras as $loop){
                ?>
                <tr>
<!--                  <td><?=$loop->cod_c;?></td>    -->
                  <td><?=$loop->nombre;?></td>
                  <td>
                      <form action="<?=  base_url("index.php/carrera/cargarEditarCarrera");?>" method="post" id="carrerasb">
                            <input type="hidden" name = "id" value="<?= $loop->cod_c; ?>">
                            <input type="hidden" name = "nombre" value="<?= $loop->nombre; ?>">
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
    </div>
