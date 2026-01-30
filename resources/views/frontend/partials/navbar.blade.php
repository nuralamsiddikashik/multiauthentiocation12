<header>
    <div class="header-content">
        <div class="logo" onclick="showPage('home')">YourBrand</div>
        <nav>
            <ul>
               <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('user.login') }}">Login</a></li>
                  <li><a href="{{ route('admin.login') }}">Admin Login</a></li>
                <li><a href="{{ route('user.register') }}">Register</a></li>
            </ul>
        </nav>
    </div>
</header>
