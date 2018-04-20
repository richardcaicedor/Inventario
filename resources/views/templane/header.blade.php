<header class="main-header"> 
    <!-- Logo -->
    <a href="{{ route('app.index') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>PR</b>CA</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">PREDHESCA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('dist/img/conf.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::user()->nombre }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src=" {{ asset('dist/img/conf.png') }}" class="img-circle" alt="User Image">
                            <p>
                                {{ Auth::user()->nombre }}
                                <small>{{ Auth::user()->email }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('auth.logout') }}" class="btn btn-default btn-flat">Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>