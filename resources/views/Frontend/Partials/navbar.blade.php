<nav class="navbar navbar-expand-md navbar-expand-sm  bg-dark navbar-dark  shadow-sm" >
    <div class="container">
            <a class="navbar-brand w3-text-teal" href="{{ url('/') }}">
            <img src="{{asset('/assets/img/svg/cart.png')}}" height="50"/>MaShop
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                </li>
            <li class="nav-item">
                  <a class="nav-link" href="{{ route('products.show') }}">{{ __('Shop') }}</a>
            </li>
            <li class="nav-item ">
                  <a class="nav-link cart-count w3-bar-item " href=" {{ route('cart.index') }}">{{__('Cart')}}
                  @if(Cart::instance('default')->count() >0)
                        <span class="w3-circle " style="font-weigh:bold; padding: 3px; background-color: teal; color: white;">{{Cart::instance('default')->count()}}</span>
                    </span>
                  @endif
                  </a>
                  </li>
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
                    <a class="dropdown-item" href="{{ route('orders.index') }}">{{ __('My Orders') }}</a>
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
</div>
