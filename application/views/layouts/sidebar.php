<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
              <li class="dropdown-submenu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     Artículos
                     <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                     <li class="active"><a href="<?= base_url("index.php/articulos/cargarRegistroArticulos");?>">Registrar artículos</a></li>
                     <li ><a href="<?= base_url("index.php/articulos/cargarGestionArticulos");?>">Gestionar artículos</a></li>
                </ul>
            </li>
              <li class="dropdown-submenu active">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     Vehículos
                     <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                     <li class="active"><a href="<?= base_url("index.php/vehiculos/cargarRegistroVehiculos");?>">Registrar vehículos</a></li>
                     <li ><a href="<?= base_url("index.php/vehiculos/cargarGestionVehiculos");?>">Gestionar vehículos</a></li>
                </ul>
            </li>
            <li class="dropdown-submenu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     Recursos Humanos
                     <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                     <li><a href="<?= base_url("index.php/empleados/cargarRegistroEmpleados");?>">Registrar empleado</a></li>
                     <li ><a href="<?= base_url("index.php/empleados/cargarGestionEmpleados");?>">Gestionar empleados</a></li>
                     <li ><a href="<?= base_url("index.php/empleados/cargarGestionFichas");?>">Gestionar fichas</a></li>
                    <li><a href="<?= base_url("index.php/departamentos");?>">Departamentos</a></li>
                    <li><a href="<?= base_url("index.php/cargos");?>">Cargos</a></li>
                    <li><a href="<?= base_url("index.php/banco");?>">Bancos</a></li>
                    <li><a href="<?= base_url("index.php/seguro");?>">Aseguradoras</a></li>
                </ul>
            </li>
              <li class="dropdown-submenu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     Reportes
                     <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                     <li ><a href="<?= base_url("index.php/ventas");?>">Ventas</a></li>
                     <li ><a href="<?= base_url("index.php/empleados/top5");?>">Top 5 vendedores</a></li>
                     <li ><a href="<?= base_url("index.php/empleados/desempenio");?>">Desempeño general</a></li>
                </ul>
            </li>
          </ul>
        </div>