<div class="container-fluid">
    <div style="padding-left:50px;">
                <?php 
                        if (isset($salones)){
                            echo"<div class=\"table-responsive\">
                                <table class=\"table table-striped\">
                                  <thead>
                                    <tr>
                                      <th>Codigo</th>
                                      <th>Capacidad</th>
                                    </tr>
                                  </thead>
                                  <tbody>";

                                if( is_array($salones) && count($salones) ) {
                                    foreach($salones as $loop){
                            echo"
                            <tr>
                              <td>".$loop->cod_salon."</td>";
                            echo  "<td>".$loop->capacidad."</td> ";   
                            echo  "<td>";
                            echo   "<form action=".base_url("index.php/salon/gestionSalon")." method=\"post\" id=\"salon\">";
                            echo   "    <input type=\"hidden\" name = \"cod_salon\" value=\" ".$loop->cod_salon. " \">";
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
                        <a href="<?= base_url();?>" class="btn btn-primary btn-block btn-lg" tabindex="13">Regresar</a></div>

                    </div>
                </div>
    </div>
