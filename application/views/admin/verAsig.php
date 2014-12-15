<div class=" col-md-offset-2 main">
    <h1 class="page-header">Ver Asignaturas</h1>
        <div class="col-lg-7">
            <form role="form">
              <div class="form-group">
                <label for="inputAsig">Nombre asignatura</label>
                <input type="email" class="form-control " id="inputAsig" placeholder="Ejemplo: Calculo I">
              </div>
            
            </form>
        </div> 
    </br>
     <div >
          <button type="submit" class="btn btn-default">Buscar</button>
        </div>
     </br></br>
    <div class="col-lg-1">
        <a id="agregarAsig" href="<?= base_url("index.php/asignatura/formularioAsig");?>">
          <button type="button" class="btn btn-success">Registrar Asignatura</button>
    </a>
    </div>
    
     <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Descripcion</th>
                  <th>Unid. de credito</th>
                  <th>Numero de horas</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if(is_array($asignaturas) && count($asignaturas) ) {
                        foreach($asignaturas as $loop){
                ?>
                <tr>
                  <td><?=$loop->nombre;?></td>
                  <td><?=$loop->uni_cred;?></td>    
                  <td><?=$loop->nro_horas;?></td>
                  <td>
                      <form action="<?= base_url("index.php/clientes/cargarAsignaturas");?>" method="post" id="contactos">
                            <input type="hidden" name = "descripcion" value="<?= $loop->nombre; ?>">
                            <input type="hidden" name = "uni_cred" value="<?= $loop->uni_cred; ?>">
                            <input type="hidden" name = "nro_horas" value="<?= $loop->nro_horas; ?>">
                           <button class="btn btn-xs btn-primary" type="submit">Ver</input>
                        </form>
                  </td>

                </tr>
                <?php
                        }
                    }
                ?>  
              </tbody>
            </table>
          </div>

    </div>