        <header>
            <div class="header-content">
                <div class="logo" onclick="showPage('home')">YourBrand</div>
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                       
                        <li><a href="{{ route('user.register.create') }}">Register</a></li>
                         <li><a href="{{ route('user.login') }}">Login</a></li>

                         @auth('admin')
                            <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                            <li><a href="{{ route('admin.users.list') }}">Users List</a></li>
                            <li>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="logout-btn">
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/>
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </li>
                         @endauth
                    </ul>
                </nav>
            </div>
        </header>