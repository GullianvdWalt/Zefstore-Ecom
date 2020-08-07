   <!-- Nav Start -->
   <header>
       <!-- Top-nav-container-Start -->
       <div class="top-nav-container" style="background-image: url('{{asset('assets/img/carbon-background.png')}}');">
           <div class="logo"><a href="/"><img src="{{asset('assets/img/ZefStoreLogoMedium.png')}}" alt="logo" class="logo-image"></a></div>
           <!-- Nav Start -->
           <div class="nav-top-container">
               <ul>
                   <li class="nav-link"><a href="{{ route('shop.index') }}"> <img src="{{asset('assets/img/icons/shop-icon.png')}}" alt="shop"> Shop</a></li>
                   <li class="nav-link"><a href="#"> <img src="{{asset('assets/img/icons/about-us-icon.png')}}" alt="about"> About</a></li>
               </ul>
           </div>
           <div class="nav-top-container">
            {{-- Cart Button --}}
            <a href="{{ route('cart.index') }}" class="cart-button-top"><span class="material-icons">shopping_cart</span>
            @if (Cart::instance('default')->count() > 0)
                <span class="cart-count">{{ Cart::instance('default')->count() }}</span>
            @endif
            </a>
            {{-- Account Button --}}
               <div class="account-button-top">
                   <div class="dropdown">
                       <a class="dropbtn" title="My Account"><span class="material-icons">account_circle</span> Account</a>
                       <div class="dropdown-content">
                           <a href="#" id="login-modal-open">Login</a>
                           <a href="#" id="register-modal-open">Register</a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </header>
   <!-- Nav End -->
