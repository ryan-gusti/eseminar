<header class="site-header site-header--menu-right sign-in-menu-1 site-header--absolute site-header--sticky">
    <div class="container">
        <nav class="navbar site-navbar">
            <!-- Brand Logo-->
            <div class="brand-logo">
                <a href="#">
                    <!-- light version logo (logo must be black)-->
                    <img src="{{ asset('frontend/image/logo/logo-black.png') }}" alt="" class="light-version-logo" />
                    <!-- Dark version logo (logo must be White)-->
                    <img src="{{ asset('frontend/image/logo/logo-white.png') }}" alt="" class="dark-version-logo" />
                </a>
            </div>
            <div class="menu-block-wrapper">
                <div class="menu-overlay"></div>
                <nav class="menu-block" id="append-menu-header">
                    <div class="mobile-menu-head">
                        <div class="go-back">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="current-menu-title"></div>
                        <div class="mobile-menu-close">&times;</div>
                    </div>
                    <ul class="site-menu-main">
                        <li class="nav-item nav-item-has-children">
                            <a href="{{ route('events') }}" class="nav-link-item">Events </a>
                        </li>
                        <li class="nav-item">
                            <a href="blog-regular.html" class="nav-link-item">Cek Sertifikat</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link-item">Masuk</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div
                class="
        header-btns header-btn-l2
        ms-auto
        d-none d-xs-inline-flex
        align-items-center
        ">
                <a class="btn btn-style-03 register-btn focus-reset" href="{{ route('register') }}">
                    Daftar
                </a>
            </div>
            <!-- mobile menu trigger -->
            <div class="mobile-menu-trigger">
                <span></span>
            </div>
            <!--/.Mobile Menu Hamburger Ends-->
        </nav>
    </div>
</header>
