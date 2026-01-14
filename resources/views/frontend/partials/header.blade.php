  <header class="header">
        <nav class="navbar">
            <div class="logo" onclick="showPage('home')">
                <span>🔐</span>
                <span>SecureAuth</span>
            </div>
            
            <ul class="nav-menu" id="navMenu">
                <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                
                <li><a class="nav-link" href="{{ route('about') }}">About</a></li>

                <li><span class="nav-link" onclick="showPage('contact')">Contact Us</span></li>
                <div class="nav-buttons" id="authButtons">
                    <button class="btn-login" onclick="showPage('login')">Login</button>
                    <button class="btn-register" onclick="showPage('register')">Registration</button>
                </div>
                <div class="nav-buttons" id="dashboardButton" style="display: none;">
                    <button class="btn-register" onclick="showPage('dashboard')">Dashboard</button>
                </div>
            </ul>
            
            <button class="mobile-toggle" id="mobileToggle">☰</button>
        </nav>
    </header>