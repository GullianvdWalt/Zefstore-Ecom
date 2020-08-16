<ul class="nav-menu-right-items">
    @guest
    <li class="nav-menu-right-item"><a href="{{ route('register') }}" class="nav-menu-right-item-link">Sign Up</a></li>
    <li class="nav-menu-right-item"><a href="{{ route('login') }}" class="nav-menu-right-item-link">Login</a></li>
    @else
        <li class="nav-menu-right-item">
            <a class="nav-menu-right-item-link dropdown-item" href="{{ route('users.edit') }}" >
                My Account
            </a>
        </li>
        <li class="nav-menu-right-item">
            <a class="nav-menu-right-item-link dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ ('Logout') }}
            </a>
        </li>

     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
      </form>

    @endguest
     <li class="nav-menu-right-item">
        <a href="{{ route('cart.index') }}" class="nav-menu-right-item-link">Cart
            @if (Cart::instance('default')->count() > 0)
                <span class="cart-count">{{ Cart::instance('default')->count() }}</span>
            @endif
        </a>
     </li>

</ul>
