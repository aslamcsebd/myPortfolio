<nav id="navbar_top" class="navbar navbar-expand-md navbar-light navbar-muted shadow-sm">   
   <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'None') }}      
   </a>
   <button class="navbar-toggler text-primary" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
   <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto pushmenu ">
         <a class="hamburger sidebar-toggle" data-widget="pushmenu" href="#" role="button">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
            <span class="minimize">Minimize</span>
         </a>
      </ul>
      {{-- @auth --}}
      <ul class="navbar-nav ml-auto">
         <li class="nav-item">
            <a class="nav-link btn btn-sm btn-secondary text-light">Item 1</a>
         </li>
         <li class="nav-item">
            <a class="nav-link btn btn-sm btn-secondary text-light" data-toggle="modal" data-original-title="test" data-target="#smallModal">Small Modal</a>
         </li>
         <li class="nav-item">
            <a class="nav-link btn btn-sm btn-secondary text-light" data-toggle="modal" data-original-title="test" data-target="#largeModal">Large Modal</a>
         </li>
         <li class="nav-item">
            <a class="nav-link btn btn-sm btn-secondary text-light" data-toggle="modal" data-original-title="test" data-target="#fixedModal">Fixed Modal</a>
         </li>    
      </ul>
      {{-- @endauth --}}
      <ul class="navbar-nav ml-auto">
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
         <li class="nav-item userName dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
               @if(Auth::user()->photo !=null)
               <img src="{{asset('UserPhoto')}}/{{Auth::user()->photo}}"  width="35">
               @endif
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
</nav>