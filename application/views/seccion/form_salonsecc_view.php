<div class=" col-md-offset-2 main">
    <h1 class="page-header">Incluir Salon:</h1>
   
<!--    <div class="row clearfix">-->
        <?php if(isset($seccion) and isset($salon)) {  
//              if(is_array($seccion) && count($seccion) ) {
                foreach($seccion as $loop){ ?>
                    <form action="<?= base_url("index.php/seccion/cargarAddSalonSecc"); ?>" method="post">
                    <input type="hidden" name = "cod_seccion" id="cod_seccion" value=  <?= $loop->cod_seccion; ?>>   
        <?php  } ?>

	 <div class="col-md-8 table-responsive" >
            <table class="table table-striped" id="horario">
              <thead>
                 
                <tr>
                  <h4>Horario </h4>   
                    <th>Salon:</th>
                    <th>Dia:</th>
                    <th>Hora Inicio:</th>
                    <th>Hora Fin:</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach($salon as $loop){ ?>
                <tr>
                  <td><?= $loop->cod_salon ?></td> 
                  <td><?=$loop->dia;?></td> 
                  <td><?= $loop->hora_ini; ?></td>     
                  <td><?= $loop->hora_fin; ?></td>
                  <td><span class="glyphicon glyphicon-ok-sign" aria-hidden="false" onclick="verifySalon()"</span>
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="false" onclick="removeSalon()"></span>
                </td>
                  </td>    
                  </td>

                </tr>
                <?php
                        }
                    }
                ?>
              </tbody>
            </table>  
        </div>
     <div class="container-fluid col-md-4 pre-scrollable" style="height: 100%">
        <div class="col-md-4 table-responsive" style="width: 100%">
            <table class="table table-striped">
              <thead>
                 
                <tr>
                  <h4>Salones</h4>   
                    <th>Salon:</th>
                    <th>Capacidad:</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if(isset($salones)){
                      foreach($salones as $loop){ ?>
                <tr>
                  <td><?= $loop->cod_salon ?></td> 
                  <td><?=$loop->capacidad;?></td> 
                  <td>
                    <label class="radio" for="prof">
                        <input type="radio" name="sa" id="sa" value="<?=$loop->cod_salon;?>" checked="checked" tabindex="5" onclick="addSalon()">
                    </label>
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
    <?php
      if (isset($err)){?>
      <br><br><br><br>
        <div class="alert alert-danger col-lg-5 col-md-5" role="alert" >
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="false"></span>
          <span class="sr-only">Error:</span>
          <?php echo $err; ?>
        </div>
    <?php  }
    ?>  
   
     <div class="row">
         <div class="col-md-12" style="height: 10%"></div>
        <div class="col-md-6"> 
        <div class="col-xs-5 .col-sm-3" style="left: 20%"> 
            <input type="submit" value="Añadir Salon" class="btn btn-primary btn-block btn-lg" tabindex="12"> </input>
        </div>
        </form>    
        </div> 
         <div class="col-md-6">
        <div class="col-xs-5 .col-sm-3" style="left: 20%">
            <a href="<?= base_url("index.php/seccion");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a>          </div>
             </div>
    </div>
        <script src="<?php echo base_url("assets/js/seccion.js"); ?>"></script>