<form action="{{ route('search') }}" method="GET" class="search-form">
    <input type="text" name="query" id="query" value="{{ request()->input('query') }}" class="search-box" placeholder="Search for product" required>
</form>
