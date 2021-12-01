<aside class="col-md-3">
    <nav class="list-group">
        <a class="list-group-item active" href="page-profile-main.html"> Account overview  </a>
        <a class="list-group-item" href="page-profile-address.html"> My Address </a>
        <a class="list-group-item" href="page-profile-orders.html"> My Orders </a>
        <a class="list-group-item" href="page-profile-wishlist.html"> My wishlist </a>
        <a class="list-group-item" href="page-profile-seller.html"> My Selling Items </a>
        <a class="list-group-item" href="page-profile-setting.html"> Settings </a>
        <a class="list-group-item" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
       {{ __('Logout') }} </a>

     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    </nav>
</aside> <!-- col.// -->
