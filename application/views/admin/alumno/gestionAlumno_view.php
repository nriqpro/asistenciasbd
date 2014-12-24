<div class=" col-md-offset-2 main">
    <h1 class="page-header">Alumnos</h1>
    <div class="row clearfix">
		<div class="col-md-12 column">
			<h3>
				Gestion de Alumno
			</h3>
		</div>
	</div>
	<div class="row clearfix">
         <?php if( is_array($alumno) && count($alumno) ) {
                                    foreach($alumno as $loop){
        $cedula_estudiante = $loop->ci_est;
        $nombre_estudiante =$loop->nombre." ".$loop->apellido; ?>
		<div class="col-md-8 column">
            
			<dl>
				<dt>
					Cedula
				</dt>
				<dd>
					<?= $loop->ci_est; ?>
				</dd>
				<dt>
					Nombre
				</dt>
				<dd>
					<?= $loop->nombre." ".$loop->apellido; ?>
				</dd>
				<dt>
					Sexo
				</dt>
				<dd>
					<?= $loop->sexo=='M'?("Masculino"):("Femenino") ?>
				</dd>
				<dt>
				    Direccion
				</dt>
				<dd>
					<?= $loop->direc; ?>
				</dd>
                <?php 
                                                              
                    }
                        }?>
			</dl> <address> </address>
			
		</div>
		<div class="col-md-4 column">
			<table class="table">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Product
						</th>
						<th>
							Payment Taken
						</th>
						<th>
							Status
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Default
						</td>
					</tr>
					<tr class="active">
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Approved
						</td>
					</tr>
					<tr class="success">
						<td>
							2
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							02/04/2012
						</td>
						<td>
							Declined
						</td>
					</tr>
					<tr class="warning">
						<td>
							3
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							03/04/2012
						</td>
						<td>
							Pending
						</td>
					</tr>
					<tr class="danger">
						<td>
							4
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							04/04/2012
						</td>
						<td>
							Call in to confirm
						</td>
					</tr>
				</tbody>
			</table>
			<ul class="pagination">
				<li>
					<a href="#">Prev</a>
				</li>
				<li>
					<a href="#">1</a>
				</li>
				<li>
					<a href="#">2</a>
				</li>
				<li>
					<a href="#">3</a>
				</li>
				<li>
					<a href="#">4</a>
				</li>
				<li>
					<a href="#">5</a>
				</li>
				<li>
					<a href="#">Next</a>
				</li>
			</ul>
		</div>
	</div>
    <div class="row clearfix">
				<div class="col-md-4 column">
                    <form action="<?= base_url("index.php/alumno/verHorarioAlumno"); ?>" method="post" id="horario">
                               <input type="hidden" name = "cedula" value="<?= $cedula_estudiante; ?>">
                               <input type="hidden" name = "nombre" value="<?= $nombre_estudiante; ?>">
                                  <button class="btn btn-primary" type="submit">Ver Horario</input>
                    </form>
				</div>
				<div class="col-md-4 column">
					  <form action="<?= base_url("index.php/alumno/editarAlumno"); ?>" method="post" id="editar">
                               <input type="hidden" name = "cedula" value="<?= $cedula_estudiante; ?>">
                                  <button class="btn btn-success" type="submit">Editar</button></input>
                    </form>
				</div>
				<div class="col-md-4 column">
					 <button type="button" class="btn btn-danger">Cancelar</button>
				</div>
			</div>
	
</div>