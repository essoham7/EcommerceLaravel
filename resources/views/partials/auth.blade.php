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
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{ Auth::user()->first_name }} {{ Auth::user()->name }}</a>
    <div class="dropdown-menu dropdown-menu-right">

    <a class="dropdown-item" href="{{ route('home')}}">
         {{ __('Mes commandes') }}
     </a>

     {{-- <a class="dropdown-item" href="{{ route('admin.users.index') }}">
        {{ __('Users manegement') }}
    </a> --}}

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
