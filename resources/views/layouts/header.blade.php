<header class="header-navbar fixed">
    <div class="header-wrapper">
        <div class="header-left">
            <div class="sidebar-toggle action-toggle"><i class="fas fa-bars"></i></div>
        </div>
        <div class="header-content">
            <div class="dropdown dropdown-menu-end">
                <a href="#" class="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="label">
                        <span></span>
                        <div>{{ auth()->user()->name }}</div>
                    </div>
                    @if (auth()->user()->avatar)
                    <img class="img-user" src="{{ asset('assets/images/avatar/' . auth()->user()->avatar) }}" alt="user" srcset="">
                    @endif
                </a>
                <ul class="dropdown-menu small">
                    <li class="menu-content ps-menu">
                        <a href="#">
                            <div class="description">
                                <i class="ti-user"></i> Profile
                            </div>
                        </a>
                        <a href="#">
                            <div class="description">
                                <i class="ti-settings"></i> Setting
                            </div>
                        </a>

                        <a href="{{ route('logout') }}">
                            <div class="description">
                                <i class="ti-power-off"></i> Logout
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>