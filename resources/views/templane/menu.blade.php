<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style=" width: 200px;">
            <div class="pull-left image">
                <img src=" {{ asset('dist/img/envato.png') }} " class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info" >
                <p >{{ Auth::user()->nombre }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU NAVEGACIÓN</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>Catálogos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('app.documentos.index') }}"><i class="fa fa-dot-circle-o"></i>Tipos de Documentos</a></li>
                    <li><a href="{{ route('app.tipoequipo.index') }}"><i class="fa fa-dot-circle-o"></i> Tipos de Inventario</a></li>
                    <li><a href="{{ route('app.tipoInsumo.index') }}"><i class="fa fa-dot-circle-o"></i> Tipos de Insumos</a></li>
                </ul>
            </li>
            <li>
              <a href="{{ route('app.usuarios.index') }}">
                <i class="fa fa-address-book-o"></i> <span>Administración Usuarios</span>
              </a>
            </li>
            <li>
              <a href="{{ route('app.equipos.index') }}"> 
                <i class="fa fa-desktop"></i> <span>Administración Equipos</span>
              </a>
            </li>
            <li>
              <a href="{{ route('app.insumos.index') }}"> 
                <i class="fa fa-medkit"></i> <span>Administración Insumos</span>
              </a>
            </li>
            <li>
              <a href="{{ route('app.solicitud.index') }}"> 
                <i class="fa fa-shopping-cart"></i> <span>Solicitudes</span>
              </a>
            </li>
            <li class="header">INFORMACIÓN</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Manual de Uso</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Objetivo</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Fundación</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>