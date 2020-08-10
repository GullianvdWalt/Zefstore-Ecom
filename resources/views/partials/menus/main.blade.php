

    <div class="menu-container">
        <ul>
         @foreach($items as $menu_item)
            <li class="nav-link">
                <a href="{{ $menu_item->link() }}">
                 {{ $menu_item->title }}
                @if ($menu_item->title === 'Cart')
                    @if (Cart::instance('default')->count() > 0)
                    <span class="cart-count">{{ Cart::instance('default')->count() }}</span>
                    @endif
                @endif
            </li>
          @endforeach
        </a>
        </ul>
        {{-- <div class="account-button-top">
            <div class="dropdown"><a class="dropbtn" title="My Account"><span class="material-icons">account_circle</span> Account</a>
                <div class="dropdown-content">
                    <a href="#" id="login-modal-open">Login</a>
                    <a href="#" id="register-modal-open">Register</a>
                </div>
            </div>
        </div> --}}
    </div>

