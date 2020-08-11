   <!-- Nav Start -->
   <header>
       <!-- Top-nav-container-Start -->
       <div class="top-nav-container" style="background-image: url('{{asset('assets/img/carbon-background.png')}}')">
           <div class="logo"><a href="/"><img src="{{asset('assets/img/ZefStoreLogoMedium.png')}}" alt="logo" class="logo-image"></a></div>
           <!-- Nav Start -->
            @if(! (request()->is('checkout') || request()->is('guestCheckout')))
            {{ menu('main','partials.menus.main') }}
            @endif
            <div class="nav-menu-right">
                 @if(! (request()->is('checkout') || request()->is('guestCheckout')))
                    @include('partials.menus.main-right')
                @endif
            </div>
       </div>
   </header>
   <!-- Nav End -->
