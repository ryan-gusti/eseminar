        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('backend/images/logo-sm.svg') }}" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('backend/images/logo-sm.svg') }}" alt="" height="24"> <span
                                    class="logo-txt">Minia</span>
                            </span>
                        </a>

                        <a href="index" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('backend/images/logo-sm.svg') }}" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('backend/images/logo-sm.svg') }}" alt="" height="24"> <span
                                    class="logo-txt">Minia</span>
                            </span>
                        </a>
                    </div>

                    <button type="button"
                        class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                        data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item" id="mode-setting-btn">
                            <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                            <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                        </button>
                    </div>

                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i data-feather="grid" class="icon-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <div class="p-2">
                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('backend/images/brands/github.png') }}" alt="Github">
                                            <span>GitHub</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('backend/images/brands/bitbucket.png') }}"
                                                alt="bitbucket">
                                            <span>Bitbucket</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('backend/images/brands/dribbble.png') }}"
                                                alt="dribbble">
                                            <span>Dribbble</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('backend/images/brands/dropbox.png') }}" alt="dropbox">
                                            <span>Dropbox</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('backend/images/brands/mail_chimp.png') }}"
                                                alt="mail_chimp">
                                            <span>Mail Chimp</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('backend/images/brands/slack.png') }}" alt="slack">
                                            <span>Slack</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-soft-light border-start border-end"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ Auth::user()->picture }}"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="{{ route('user.profile') }}"><i
                                    class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i
                                    class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="/" id="topnav-dashboard"
                                    role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboards">Home</span>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="/" id="topnav-dashboard"
                                    role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboards">Event</span>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="/" id="topnav-dashboard"
                                    role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboards">Profile</span>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="/" id="topnav-dashboard"
                                    role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboards">Ticket</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
