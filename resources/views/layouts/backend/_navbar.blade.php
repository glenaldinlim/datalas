<ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="{{ (Request::segment(2) == 'dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('backend.dashboard') }}"><i class="fas fa-fire"></i>&nbsp;<span>Dashboard</span></a></li>

    <li class="menu-header">Manage HR</li>
    <li class="{{ (Request::segment(2) == 'users') ? 'active' : '' }}"><a class="nav-link" href="{{ route('backend.users.index') }}"><i class="fas fa-user-lock"></i>&nbsp;<span>Administrator</span></a></li>
    <li class="{{ (Request::segment(2) == 'communities') ? 'active' : '' }}"><a class="nav-link" href="{{ route('backend.communities.index') }}"><i class="fas fa-users"></i>&nbsp;<span>Community</span></a></li>
</ul>