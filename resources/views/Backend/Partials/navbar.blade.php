<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="font-family: Verdana !important;">
            <div class="container">
                 
                <a class="navbar-brand w3-text-teal" href="{{route('admin.dashboard')}}">
                    <img src="{{asset('/assets/img/svg/cart.png')}}" style="color:teal; height: 50px;" alt="" />MaShop
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
    
                                    <a class="navbar-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
    
                    </ul>
                </div>
            </div>
        </nav>
    
    </div>
    