<div class="container-fluid">
    <div style="padding-left:50px;">
        <div class="row">
            
            <div class="col-xs-12 col-sm-3 col-md-3"></div>

            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Alumnos</h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                        <form action="<?= base_url("index.php/alumno/buscarAlumnos"); ?>" method="post">
            
                          
                            <div class="col-xs-12 col-sm-4 col-md-4">             
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
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <button type="submit" class="btn btn-default">Buscar</button>
                                  
                            </div>
                            
                        </form>
                        </div>
                   
                        
                    </div>
                </div>
            </div>   
            
            <div class="col-xs-12 col-sm-3 col-md-3"></div>
       </div>
    </div>
</div>