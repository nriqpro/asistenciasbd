<div class=" col-md-offset-2 main">
    <h1 class="page-header">Ver Periodos</h1>
        <div class="col-lg-7">
         <form action="<?= base_url("index.php/periodo/getPeriodo"); ?>" method="post">
              <div class="form-group">
                <label for="nombre">Codigo:</label>
                <input class="form-control " type="text" name="id" placeholder="2013-4">
                  </br>
             <div class="col-md-5">    
                <button type="submit" class="btn btn-default">Buscar</button>
             </div>
        </form>
            <div class="col-md-7">    
            <a id="addPeriodo" href="<?= base_url("index.php/periodo/formularioPeriodo");?>">
                <button type="button" class="btn btn-success">Registrar Periodo</button>
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
                <tr>
                  <td><?=$loop->cod_peri;?></td>    
                  <td><?=$loop->inicio;?></td>
                  <td><?=$loop->fin;?></td>    
                  <td>
                      <form action="<?=  base_url("index.php/periodo/cargarEditarPeriodo");?>" method="post" id="periodo">
                            <input type="hidden" name = "id" value="<?= $loop->cod_peri; ?>">
                            <input type="hidden" name = "inicio" value="<?= $loop->inicio; ?>">
                            <input type="hidden" name = "fin" value="<?= $loop->fin; ?>">
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