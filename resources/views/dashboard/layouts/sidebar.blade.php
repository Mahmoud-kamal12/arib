<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard.home')}}"> <img alt="image" src="https://arib.com.sa/media/xemigi1x/group-19387-1.svg" class="header-logo" /> <span
                    class="logo-name">ARIB</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="{{route('dashboard.home')}}" class="nav-link"><i data-feather="monitor"></i><span>@lang('dashboard.home')</span></a>
            </li>
            @hasRole($UserConstants::ROLE_ADMIN)
                <li class="dropdown">
                    <a href="{{route('dashboard.users.index')}}" class="nav-link"><i data-feather="users"></i><span>@lang('dashboard.users.users')</span></a>
                </li>
            @endHasRole
        </ul>
    </aside>
</div>
