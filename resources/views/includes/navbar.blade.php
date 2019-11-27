<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm position-sticky">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item nav-item-ordinary">
                        <a class="nav-link nav-link-ordinary" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item nav-item-ordinary">
                            <a class="nav-link nav-link-ordinary" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item nav-item-ordinary">
                        <a class="nav-link nav-link-ordinary" href="{{ route('copies') }}">{{ __('Copies') }}</a>
                    </li>
                    <li class="nav-item nav-item-ordinary">
                        <a class="nav-link nav-link-ordinary" href="{{ route('books') }}">{{ __('Books') }}</a>
                    </li>
                    <li class="nav-item nav-item-ordinary">
                        <a class="nav-link nav-link-ordinary" href="{{ route('authors') }}">{{ __('Authors') }}</a>
                    </li>
                    <li class="nav-item nav-item-special dropdown">
                        <a id="navbarDropdown" class="nav-link nav-link-special dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>