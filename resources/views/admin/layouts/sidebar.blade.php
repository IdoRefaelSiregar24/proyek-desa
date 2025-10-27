<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="nav-item  {{ request()->routeIs('dashboard-admin.*') ? 'active' : '' }}">
                            <a href="{{ route('dashboard-admin.index') }}"><img
                                    src="{{ asset('assets-admin/img/icons/dashboard.svg') }}"
                                    alt="img"></i><span>
                                    Dashboard</span> </a>
                        </li>
                        <li class="nav-item  {{ request()->routeIs('warga-admin.*') ? 'active' : '' }}">
                            <a href="{{ route('warga-admin.index') }}"><i class="fe fe-users" data-bs-toggle="tooltip"
                                    title="fe fe-users"></i><span>
                                    Warga</span> </a>
                        </li>
                        <li class="nav-item  {{ request()->routeIs('proyek-admin.*') ? 'active' : '' }} ">
                            <a href="{{ route('proyek-admin.index') }}"><i class="fe fe-activity" data-bs-toggle="tooltip"
                                    title="fe fe-activity"></i><span>
                                    Proyek</span> </a>
                        </li>
                        <li class="nav-item  {{ request()->routeIs('user-admin.*') ? 'active' : '' }} ">
                            <a href="{{ route('user-admin.index') }}"><i class="fe fe-user" data-bs-toggle="tooltip"
                                    title="fe fe-user"></i><span>
                                    User</span> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
