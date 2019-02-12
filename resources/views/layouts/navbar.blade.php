<header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        {{--<span class="logo-mini"><b>Dr.</b>sys</span>--}}
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg font"><b>Doctor</b>System</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" id="toggles" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="{{url('/logout')}}"  >

                        <span class="hidden-xs">Logout</span>
                    </a>

                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src=" {{asset('dist/img/doctor.jpg')}}" class="img-circle" alt="Doctor Image">


            </div>
            <div style="margin-bottom:10px ;" class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li><a href="{{url('addPatient')}}"><i class="fa fa-user-plus fa-2x"></i> <span style="margin-left: 20px !important;">  Add Patients</span></a></li>
            <li><a href="{{url('managePatient')}}"><i class="fa fa-user-md fa-2x"></i> <span style="margin-left: 10px !important;">  Manage Patients</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>