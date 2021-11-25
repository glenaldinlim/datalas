<ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="{{ (Request::segment(2) == 'dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('front.community.dashboard') }}"><i class="fas fa-fire"></i>&nbsp;<span>Dashboard</span></a></li>

    <li class="menu-header">Komunitas</li>
    <li class="{{ (Request::segment(2) == 'productions') ? 'active' : '' }}"><a class="nav-link" href="{{ route('front.community.dashboard') }}"><i class="fas fa-users"></i>&nbsp;<span>Data Komunitas</span></a></li>

    <li class="menu-header">Produksi</li>
    <li class="{{ (Request::segment(2) == 'productions') ? 'active' : '' }}"><a class="nav-link" href="{{ route('front.community.dashboard') }}"><i class="fas fa-boxes"></i>&nbsp;<span>Data Produksi</span></a></li>
</ul>
