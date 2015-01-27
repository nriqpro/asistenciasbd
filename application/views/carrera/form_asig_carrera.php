<div class=" col-md-offset-2 main">
          <h2 class="sub-header">Agregar asignaturas</h2>


      <div class="table-responsive">
          <table class="table table-striped" id="contenido">
              <thead>
                   <tr>
                      <th>Asignatura</th>
                    </tr>
                  </thead>
              <tbody>
                    <td>
                        <table class="table table-hover" id="asignatura">
                          <thead>
                            <tr>
                              <th>Nombre</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                                  if (isset($asignaturas)){
                                    if(is_array($asignaturas) && count($asignaturas) ) {
                                        foreach($asignaturas as $loop){
                                ?>
                                <tr>
                                  <td><?=$loop->nombre;?></td>
                                    <td>
                                    <label class="checkbox" for="asig">
                                        <input type="checkbox" name="asig" id="asig" value="<?=$loop->cod_asig;?>" tabindex="3">
                                    </label>
                                    </td>
                                </tr>
                          </tbody>
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
                        </table>
                    </td>
              </tbody>

          </table>
          </div>
<br>

     <form action="<?=base_url("index.php/carrera/addAsig"); ?>" method="post">
			<div class="row">
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3" >
                    <div class="col-xs-6 col-md-3"  id="form">

                     <input type="hidden" id="tasig" name="tasig">
                    <input type="hidden" name="id" id="id" value="<?php echo $carreras['id']; ?>">
                    </div>

                  <input type="submit" onclick="loadData()" value="Guardar" class="btn btn-primary btn-block btn-lg" tabindex="12">
</div>
    </form>

                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <a href="<?= base_url("index.php/carrera");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
        <script src="<?php echo base_url("assets/js/carrera.js"); ?>"></script>

</div>
