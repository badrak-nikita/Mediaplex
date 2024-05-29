<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('redirect')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Mediaplex - Admin Panel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('redirect')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Панель керування</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Контент
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('view_category')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Категорії</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('view_products')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Товари</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('view_pass')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Пiдписки</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('view_order')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Замовлення</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->