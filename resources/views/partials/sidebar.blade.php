<div class="list-group">
    <a href="{{ url('/dashboard') }}" class="list-group-item {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
        <i class="fa fa-dashboard"></i> Dashboard
    </a>
    <a href="{{ url('/users') }}" class="list-group-item {{ request()->routeIs('users*') ? 'active' : '' }}">
        <i class="fa fa-users"></i> Users
    </a>
    <a href="{{ url('/products') }}" class="list-group-item {{ request()->routeIs('products*') ? 'active' : '' }}">
        <i class="fa fa-items"></i> Products
    </a>
</div> 