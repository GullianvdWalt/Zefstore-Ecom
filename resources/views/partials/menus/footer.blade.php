        @foreach($items as $menu_item)
          <a href="{{ $menu_item->link() }}" class="footer-link"> {{$menu_item->title}} </a>
        @endforeach
