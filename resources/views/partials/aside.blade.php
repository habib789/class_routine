<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('uploads/images/'.auth()->user()->photo) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard Routine
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('profile') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Routine</p>
                            </a>
                        </li>
                        @if(auth()->user()->role == 1)
                            <li class="nav-item">
                                <a href="{{ route('subjects.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add subject</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('times.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add class time</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('routines.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Routine</p>
                                </a>
                            </li>
                        @elseif(auth()->user()->role==0)
                            <li class="nav-item">
{{--                                <a href="#" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>View Routine</p>--}}
{{--                                </a>--}}
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
