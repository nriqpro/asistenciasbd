<div class=" col-md-offset-2 main">
          <h2 class="sub-header">Asignaturas</h2>
      <div class="table-responsive">
          <table class="table table-striped">
              <thead>
                   <tr>
                      <th>Asignatura</th>
                    </tr>
                  </thead>
              <tbody>
                    <td>
                        <table class="table table-stripped">
                          <thead>
                            <tr>
                              <th>Nombre</th>
                               <th>Unidades de credito</th>
                               <th>Max. Horas</th>
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
                                  <td><?=$loop->uni_cred;?></td>
                                  <td><?=$loop->nro_horas;?></td>
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

                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <a href="<?= base_url("index.php/seccion");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
        <script src="<?php echo base_url("assets/js/seccion.js"); ?>"></script>

</div>
