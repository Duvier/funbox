<aside id="app_sidebar-left">
    <nav id="app_main-menu-wrapper" class="scrollbar">
        <div class="sidebar-inner sidebar-push">
            <div class="card profile-menu" id="profile-menu">
                <header class="card-heading card-img alt-heading">
                    <div class="profile">
                        <header class="card-heading card-background" id="card_img_03">
                            <img src="{{ asset('assets/img/logo/funboxlogo.png') }}" alt="" class="img-circle max-w-75">
                        </header>
                        <a href="javascript:void(0)" class="info" data-profile="open-menu"><span>funbox@funbox.com</span></a>
                    </div>
                </header>
                <ul class="submenu">
                    <li>
                        <a href="javascript:void(0)"><i class="zmdi zmdi-account"></i> Profile</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="zmdi zmdi-email"></i> Messages</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="zmdi zmdi-settings"></i> Account Settings</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="zmdi zmdi-sign-in"></i> Sign Out</a>
                    </li>
                </ul>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="{{ url('/') }}"><i class="zmdi zmdi-home"></i>Inicio</a></li>
                <li><a href="{{ url('/') }}"><i class="zmdi zmdi-assignment"></i> Clases</a></li>
                <li><a href="{{ route('user.index') }}"><i class="zmdi zmdi-accounts"></i> Usuarios</a></li>
                <li class="nav-dropdown">
                    <a href="#"><i class="zmdi zmdi-wrench"></i>Configuración</a>
                    <ul class="nav-sub">
                        <li><a href="{{ url('/') }}"><i class="zmdi zmdi-settings"></i> Preferencias</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</aside>