<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-primary navbar-dark border-bottom">
    <!-- Left navbar links -->
    @guest
        <a href="{{ url('/') }}" class="navbar-brand">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    @else
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link" data-widget="pushmenu">
                    <i class="fa fa-bars"></i>
                </a>
            </li>
            @foreach (config('menu.navigation') as $item)
                <li class="nav-item d-done d-sm-inine-block">
                    <a href="
                    @isset($item['route'])
                        {{ route($item['route']) }}
                    @else
                        @isset ($item['url'])
                            {{ url($item['url']) }}
                        @else
                            #
                        @endisset
                    @endisset
                    " class="nav-link">{{ $item['title'] ?? __('No title') }}</a>
                </li>
            @endforeach
        </ul>
    @endguest

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @guest
            <li class="nav-item d-done d-sm-inline-block">
                <a href="{{ route('login') }}" class="nav-link">
                    <i class="nav-icon fas fa-sign-in-alt"></i>
                    {{ __('Login') }}
                </a>
            </li>
        @else
            <li class="nav-item d-done d-sm-inline-block">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                    @csrf
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                    <i class="fa fa-th-large"></i>
                </a>
            </li>
        @endguest
    </ul>
</nav>