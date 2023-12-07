<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
        </div>
        <div class="sidebar-brand-text mx-3">Payroll System</div>
    </a>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Profile</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Profile setting:</h6>
                <a class="collapse-item" href="{{ url('/profile') }}">Watch Your Profile</a>
                {{-- <a class="collapse-item" href="cards.html">Log out</a> --}}
                {{-- <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        Logout</button>
                </form> --}}
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    Logout
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">


    <li class="nav-item">
        <a class="nav-link" href="{{ url('/roles') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Designation</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/holidays') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Holidays</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/apply-leave') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Leaves</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/calculate-salary') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Calculate Sallery</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <li class="nav-item">
        <a class="nav-link" href="/index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Generate Report</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider mb-0">
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>