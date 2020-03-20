<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="index.html">
            My contact
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- /.navbar-header -->
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::segment(1) == "home" ? 'active' : " " }}">
                    <a href="{{ url('/home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item {{ Request::segment(1) == "contacts" ? 'active' : " " }}">
                    <a href="{{ route('contacts.index') }}" class="nav-link">Contacts</a>
                </li>
            </ul>
            <div class="navbar-nav ml-auto">
                <div class="nav-item">
                    @if(!Auth::guest())
                        <form action="{{ route('contacts.index') }}" class="navbar-left mr-2">
                            <div class="input-group">
                                <input type="text" class="form-control term" name="term" id="term" placeholder="Search term..." value="{{ Request::get('term') }}" />
                                <span class="input-group-btn">
                                    <button class="btn btn-outline-secondary" type="submit">
                                        <span><i class="fa fa-search" aria-hidden="true"></i></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    @endif
                </div>
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

    </div>
</nav>
