{{-- <nav class="sidebar close"> --}}
    <header>
        <div class="image-text">
            <span class="image">
                <img src="{{ asset('logo.png') }}" alt="">
            </span>

            <div class="text logo-text">
                <span class="name">Devroy</span>
                <span class="profession">Web developer</span>
            </div>
        </div>

        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">

            <li class="search-box">
                <i class='bx bx-search icon'></i>
                <input type="text" placeholder="Search...">
            </li>

            <ul class="menu-link">
                <li class="nav-links">
                    <a href="{{ route('dashboard') }}">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">{{ __('Dashboard') }}</span>
                    </a>
                </li>

                <li class="nav-links">
                    <a href="{{ route('categories.index') }}">
                        <i class='bx bx-pie-chart-alt icon'></i>
                        <span class="text nav-text">{{ __('Category') }}</span>
                    </a>
                </li>

                <li class="nav-links">
                    <a href="{{ route('post.index') }}">
                        <i class='bx bx-heart icon'></i>
                        <span class="text nav-text">{{ __('Posts') }}</span>
                    </a>
                </li>

            </ul>
        </div>


        <div class="bottom-content">
            @auth
            <li class="">
                <a href="{{ route('logout') }}">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>
            @endauth

            @guest
            <li class="">
                <a href="{{ route('register') }}">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Register</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('login') }}">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Login</span>
                </a>
            </li>
            @endguest

            <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>

        </div>
    </div>

    {{--
</nav> --}}
