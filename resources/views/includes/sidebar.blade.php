<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"INTERCONEXIONES</li>
            <li>
                <a href="/home">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>
            <li>
                <a href="/users">
                    <i class="fa fa-user-secret"></i>
                    <span>Admin. Usuarios</span>
                </a>
            </li>
            <li>
                <a href="/personas">
                    <i class="fa fa-users"></i>
                    <span>Admin. Personas</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i> <span>Contratos</span> </i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/contratos/estado/solicitado"><i class="fa fa-files-o"></i><span>Solicitados</span></a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="/contratos/estado/aprobado"><i class="fa fa-files-o"></i><span>Aprobados - Por Entregar</span></a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="/contratos/estado/rechazado"><i class="fa fa-files-o"></i><span>Rechazados</span></a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="/contratos/estado/entregado"><i class="fa fa-files-o"></i><span>Entregados - En Cobro</span></a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="/contratos/estado/pagado"><i class="fa fa-files-o"></i><span>Pagados</span></a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="/contratos/estado/juridico"><i class="fa fa-files-o"></i><span>Jurídicos</span></a></li>
                </ul>
                
            </li>
            <li class="treeview">
                <a href="#">
                     <i class="fa fa-money"></i> <span>Admin. Cobros</span> </i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/cobros"><i class="fa fa-money"></i><span>Todos</span></a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="/users/2/cobros/fecha_pago/{!! session()->get('dateToday') !!}"><i class="fa fa-money"></i><span>xFecha x Usuario </span></a></li>
                </ul>
            </li>            
            <li>
                <a href="/dispositivos">
                    <i class="fa fa-mobile"></i>
                    <span>Admin. Dispositivos</span>
                </a>
            </li>
            <li>
                <a href="/traslados">
                    <i class="fa fa-arrows-h"></i>
                    <span>Admin. Traslados</span>
                </a>
            </li>
             <li class="treeview">
                <a href="#">
                <i class="fa fa-cogs"></i> <span>Catàlogos</span> 
                <!--<i class="fa fa-angle-left pull-right">-->
                </i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/roles"><i class="fa fa-level-up"></i> Admin. Roles</a></li>
                </ul>
            </li>   
            <li>
                <a href="/auth/logout">
                <i class="fa fa-sign-out"></i> <span>Cerrar Sesión</span> 
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>