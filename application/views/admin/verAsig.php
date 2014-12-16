<div class=" col-md-offset-2 main">
    <h1 class="page-header">Ver Asignaturas</h1>
        <div class="col-lg-7">
         <form action="<?= base_url("index.php/asignatura/cargarAsigBuscada"); ?>" method="post">
              <div class="form-group">
                <label for="nombre">Nombre asignatura</label>
                <input class="form-control " type="text" name="nombre" placeholder="Ejemplo: Calculo I">
                  </br>
             <div class="col-md-5">    
                <button type="submit" class="btn btn-default">Buscar</button>
             </div>
        </form>
            <div class="col-md-7">    
            <a id="agregarAsig" href="<?= base_url("index.php/asignatura/formularioAsig");?>">
                <button type="button" class="btn btn-success">Registrar Asignatura</button>
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
                  <th>Codigo:</th>    
                  <th>Descripcion</th>
                  <th>Unid. de credito</th>
                  <th>Numero de horas</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if (isset($asignaturas)){
                    if(is_array($asignaturas) && count($asignaturas) ) {
                        foreach($asignaturas as $loop){
                ?>
                <tr>
                  <td><?=$loop->cod_asig;?></td>    
                  <td><?=$loop->nombre;?></td>
                  <td><?=$loop->uni_cred;?></td>    
                  <td><?=$loop->nro_horas;?></td>
                  <td>
                      <form action="<?=  base_url("index.php/asignatura/cargarEditarAsig");?>" method="post" id="asignaturas">
                            <input type="hidden" name = "id" value="<?= $loop->cod_asig; ?>">
                            <input type="hidden" name = "descripcion" value="<?= $loop->nombre; ?>">
                            <input type="hidden" name = "uni_cred" value="<?= $loop->uni_cred; ?>">
                            <input type="hidden" name = "nro_horas" value="<?= $loop->nro_horas; ?>">
                           <button class="btn btn-xs btn-primary" type="submit">Editar</input>
                        </form>
                  </td>

                </tr>
                <?php
                        }
                    }
                  }
                else{
                    echo "Error";
                }
                ?>  
              </tbody>
            </table>
          </div>

    </div>