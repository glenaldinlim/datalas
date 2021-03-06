<ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="{{ (Request::segment(2) == 'dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('backend.dashboard') }}"><i class="fas fa-fire"></i>&nbsp;<span>Dashboard</span></a></li>

    <li class="menu-header">Kelola Administrator</li>
    <li class="{{ (Request::segment(2) == 'users') ? 'active' : '' }}"><a class="nav-link" href="{{ route('backend.users.index') }}"><i class="fas fa-user-lock"></i>&nbsp;<span>Pengurus</span></a></li>

    <li class="menu-header">Kelola Komoditas</li>
    <li class="{{ (Request::segment(2) == 'categories') ? 'active' : '' }}"><a class="nav-link " href="{{ route('backend.categories.index') }}"><i class="fas fa-tag"></i>&nbsp;<span>Kategori</span></a></li>
    <li class="{{ (Request::segment(2) == 'commodities') ? 'active' : '' }}"><a class="nav-link" href="{{ route('backend.commodities.index') }}"><i class="fas fa-seedling"></i>&nbsp;<span>Komoditas</span></a></li>

    <li class="menu-header">Kelola Rekan</li>
    <li class="{{ (Request::segment(2) == 'communities') ? 'active' : '' }}"><a class="nav-link" href="{{ route('backend.communities.index') }}"><i class="fas fa-users"></i>&nbsp;<span>Komunitas</span></a></li>

    <li class="menu-header">Kelola Publikasi</li>
    <li class="{{ (Request::segment(2) == 'publications') ? 'active' : '' }}"><a class="nav-link" href="{{ route('backend.publications.index') }}"><i class="fas fa-bullhorn"></i>&nbsp;<span>Publikasi</span></a></li>

    <li class="menu-header">Misc</li>
    <li class="{{ (Request::segment(2) == 'misc' && Request::segment(3) == 'contacts') ? 'active' : '' }}"><a class="nav-link" href="{{ route('backend.misc.contacts.index') }}"><i class="fas fa-inbox"></i>&nbsp;<span>Pesan Kontak</span></a></li>
    @hasrole('webmaster')    
    <li class="{{ (Request::segment(2) == 'misc' && Request::segment(3) == 'settings') ? 'active' : '' }}"><a class="nav-link" href="{{ route('backend.misc.settings.index') }}"><i class="fas fa-cog"></i>&nbsp;<span>Pengaturan Website</span></a></li>
    @endhasrole
    @hasanyrole('webmaster|bod')
    <li class="{{ (Request::segment(2) == 'misc' && Request::segment(3) == 'logs' && Request::segment(4) == 'activities') ? 'active' : '' }}"><a class="nav-link" href="{{ route('backend.misc.logs.activities.index') }}"><i class="far fa-clipboard"></i>&nbsp;<span>Log Aktivitas</span></a></li>
    <li class="{{ (Request::segment(2) == 'misc' && Request::segment(3) == 'logs' && Request::segment(4) == 'accesses') ? 'active' : '' }}"><a class="nav-link" href="{{ route('backend.misc.logs.accesses.index') }}"><i class="far fa-clipboard"></i>&nbsp;<span>Log Akses</span></a></li>
    @endhasanyrole
</ul>
