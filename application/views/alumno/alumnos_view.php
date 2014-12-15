<div class="container-fluid">
    <div style="padding-left:50px;">
        <div class="row">
            
            <div class="col-xs-12 col-sm-4 col-md-4"> <!-- LLEVO CUATROO -->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Buscar Un Alumno</h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                        <form action="<?= base_url("index.php/alumno/editarAlumno"); ?>" method="post">
            
                          
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                      <input name="cedula" type="text" class="form-control" placeholder="Ingrese La Cedula">
                                    </div>
                                   
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <button type="submit" class="btn btn-default">Buscar Alumno</button>
                                  
                            </div>
                            
                        </form>
                        </div>
                   
                        
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6"> <!--LLEVO 6 -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Alumnos</h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                        <form action="<?= base_url("index.php/alumno/buscarAlumnos"); ?>" method="post">
            
                            <div class="col-xs-12 col-sm-1 col-md-1">  </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">             
                                <select name="tipo" class="form-control"  data-style="btn-primary">
                                    <option value="Carrera">Carrera</option>
                                    <option value="Materia">Materia</option>
                                    <option value="Seccion">Seccion</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                      <input name="contenido" type="text" class="form-control" placeholder="Ingrese Su Busqueda">
                                    </div>
                                   
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                               <button type="submit" class="btn btn-default">Buscar</button>
                                  
                            </div>
                            <div class="col-xs-12 col-sm-1 col-md-1">  </div>
                        </form>
                        </div>
                   
                        
                    </div>
                </div>
            </div>   
            
            <div class="col-xs-12 col-sm-2 col-md-2">  <!-- LLEVO 2 -->
                 <div class="row" style="padding-top:30px;">
                
                </div>
            </div>
       </div>
                <?php 
                        if (isset($alumnos)){
                            echo"<div class=\"table-responsive\">
                                <table class=\"table table-striped\">
                                  <thead>
                                    <tr>
                                      <th>Cedula</th>
                                      <th>Nombre</th>
                                      <th>Sexo</th>
                                    </tr>
                                  </thead>
                                  <tbody>";

                                if( is_array($alumnos) && count($alumnos) ) {
                                    foreach($alumnos as $loop){
                            echo"
                            <tr>
                              <td>".$loop->ci_est."</td>";
                            echo  "<td>".$loop->nombre." ".$loop->apellido."</td> ";   
                            echo  "<td>".$loop->sexo."</td>";
                            echo  "<td>";
                            echo   "<form action=".base_url("alumnos/gestionAlumno")." method=\"post\" id=\"contactos\">";
                            echo   "    <input type=\"hidden\" name = \"cedula\" value=\" ".$loop->ci_est. " \">";
                            echo   "      <button class=\"btn btn-xs btn-primary\" type=\"submit\">Ver</input>";
                            echo   "   </form>";
                            echo " </td>";

                            echo " </tr>";
                                       }
                                }

                            echo "</tbody>";
                            echo " </table>";
                        } 
                        else
                            echo "Bienvenido";
                ?>
               <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4"></div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <a href="<?= base_url();?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Regresar</a></div>

                    </div>
                </div>
    </div>
