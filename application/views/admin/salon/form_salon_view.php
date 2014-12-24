<div class=" col-md-offset-2 main">


          <h2 class="sub-header">Registro de Salon</h2>
          <div>
          <form role="form" action='<?= base_url();?>index.php/salon/registrarSalon' method="post">

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Modulo: </h4>
					<div class="form-group">
                       <select name="modulo" class="form-control"  data-style="btn-primary">
                                    <option value="a1">a1</option>
                                    <option value="a2">a2</option>
                                    <option value="ar">ar</option>
                        </select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Piso: </h4>
					<div class="form-group">
                        <select name="piso" class="form-control"  data-style="btn-primary">
                                    <option value="0">PB</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                        </select>
					</div>
				</div>

			</div>

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Nro: </h4>
					<div class="form-group">
                         <select name="nro" class="form-control"  data-style="btn-primary">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                     <option value="3">3</option>
                                     <option value="4">4</option>
                                     <option value="5">5</option>
                                     <option value="6">6</option>
                                     <option value="7">7</option>
                                     <option value="8">8</option>
                                     <option value="9">9</option>
                        </select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>Capacidad</h4>
					<div class="form-group">
                         <select name="capacidad" class="form-control"  data-style="btn-primary">
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                        </select>
					</div>
				</div>
			</div>


			
			

<br>
			<div class="row">
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="12"></div>
                <div class="col-xs-6 col-md-2"></div>
				<div class="col-xs-6 col-md-3">
                    <a href="<?= base_url();?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
                <div class="col-xs-6 col-md-2"></div>
			</div>
		</form>
          </div>
        </div>
 