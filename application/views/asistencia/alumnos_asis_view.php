<div class=" col-md-offset-2 main">
    <h1 class="page-header">Ver Alumnos</h1>
        <div class="col-lg-7">
         <form action="<?= base_url("index.php/alumno/gestionAlumno"); ?>" method="post">
              <div class="form-group">
                <label for="cedula">Cedula:</label>
                <input class="form-control " type="number" name="cedula" placeholder="123456">
                  </br>
             <div class="col-md-5">    
                <button type="submit" class="btn btn-default">Buscar</button>
             </div>
        </form>
            </div>
    </div>
    </br>
    </br></br>
    <div class="row">
    <div class="col-md-12">
     <div class="table-responsive col-md-6" >
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Cedula</th>    
                  <th>Nombre</th>
                  <th>Apellido</th>   
                </tr>
              </thead>
              <tbody>
                <?php
                  if (isset($asis)){
                    if(is_array($asis) && count($asis) ) {
                        foreach($asis as $loop){
                ?>
                <tr>
                  <td><?=$loop->ci_est;?></td>    
                  <td><?=$loop->nombre;?></td>
                  <td><?=$loop->apellido;?></td>    
                <td>
                 <span class="glyphicon glyphicon-ok" aria-hidden="false"></span>  </td>
                </tr>
                <?php
                        }
                    }
                  }
                ?>
                <?php
                if (isset($err2)){ ?>
                   <br><br> <br><br>
            <?php   }else if (isset($err)){?>
                  <br><br>
                    <div class="alert alert-danger col-lg-8 col-md-5" role="alert">
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="false"></span>
                      <span class="sr-only">Error:</span>
                      <?php echo $err; ?>
                    </div>
                <?php  }
                ?>  
              </tbody>
            </table>
          </div>
         <div class="table-responsive col-md-6">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Cedula</th>    
                  <th>Nombre</th>
                  <th>Apellido</th>   
                </tr>
              </thead>
              <tbody>
                <?php
                  if (isset($inas)){
                    if(is_array($inas) && count($inas) ) {
                        foreach($inas as $loop){
                ?>
                <tr>
                  <td><?=$loop->ci_est;?></td>    
                  <td><?=$loop->nombre;?></td>
                  <td><?=$loop->apellido;?></td>    
                    <td>
                 <span class="glyphicon glyphicon-remove" aria-hidden="false"></span>  </td>
                </tr>
                <?php
                        }
                    }
                  }
                ?>
                <?php
                if (isset($err)){ ?>
                  <br><br><br><br><br>
                <?php }else if (isset($err2)){?>
                  <br><br>
                    <div class="alert alert-success col-lg-5 col-md-5" role="alert">
                      <span class="glyphicon glyphicon-thumbs-up" aria-hidden="false"></span>
                      <span class="sr-only">Error:</span>
                      <?php echo $err2; ?>
                    </div>
                <?php } 
                ?>  
              </tbody>
            </table>
          </div>
    </div>
        </div>
</div>
 