@extends('layouts.frontend')

@section('title', 'Home')

@section('content')
<h2>Welcome to Our Website</h2>
@endsection

<body>
    <!-- Home Page -->
    <div id="home" class="page active">
        <header>
            <div class="header-content">
                <div class="logo" onclick="showPage('home')">YourBrand</div>
                <nav>
                    <ul>
                        <li><a onclick="showPage('home')">Home</a></li>
                        <li><a onclick="showPage('login')">Login</a></li>
                        <li><a onclick="showPage('register')">Register</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <div class="main-content">
                <div class="hero">
                    <h1>Welcome to Your Website</h1>
                    <p>This is a clean, modern template with a responsive design. Customize the content, colors, and layout to match your needs.</p>
                </div>

                <div class="content-grid">
                    <div class="card">
                        <h2>Feature One</h2>
                        <p>Add your content here. This card layout makes it easy to showcase different features or services.</p>
                    </div>
                    <div class="card">
                        <h2>Feature Two</h2>
                        <p>The grid automatically adjusts to different screen sizes, ensuring your site looks great on all devices.</p>
                    </div>
                    <div class="card">
                        <h2>Feature Three</h2>
                        <p>Customize the colors, fonts, and spacing to create a unique design that matches your brand.</p>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About Us</h3>
                    <p>Your company description goes here. Tell visitors what makes you unique.</p>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a onclick="showPage('home')">Home</a></li>
                        <li><a onclick="showPage('login')">Login</a></li>
                        <li><a onclick="showPage('register')">Register</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact</h3>
                    <ul>
                        <li>Email: info@example.com</li>
                        <li>Phone: (123) 456-7890</li>
                        <li>Address: 123 Main St, City</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 YourBrand. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Login Page -->
    <div id="login" class="page">
        <header>
            <div class="header-content">
                <div class="logo" onclick="showPage('home')">YourBrand</div>
                <nav>
                    <ul>
                        <li><a onclick="showPage('home')">Home</a></li>
                        <li><a onclick="showPage('login')">Login</a></li>
                        <li><a onclick="showPage('register')">Register</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="auth-container">
            <div class="auth-box">
                <h2>Welcome Back</h2>
                <p>Please login to your account</p>
                
                <form>
                    <div class="form-group">
                        <label for="login-email">Email Address</label>
                        <input type="email" id="login-email" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" id="login-password" placeholder="Enter your password" required>
                    </div>
                    
                    <div class="checkbox-group">
                        <input type="checkbox" id="remember-me">
                        <label for="remember-me">Remember me</label>
                    </div>
                    
                    <button type="submit" class="btn">Login</button>
                </form>
                
                <div class="auth-links">
                    <a onclick="showPage('forgot-password')">Forgot Password?</a>
                </div>
                
                <div class="divider">or</div>
                
                <div class="auth-links">
                    Don't have an account? <a onclick="showPage('register')">Sign Up</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Page -->
    <div id="register" class="page">
        <header>
            <div class="header-content">
                <div class="logo" onclick="showPage('home')">YourBrand</div>
                <nav>
                    <ul>
                        <li><a onclick="showPage('home')">Home</a></li>
                        <li><a onclick="showPage('login')">Login</a></li>
                        <li><a onclick="showPage('register')">Register</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="auth-container">
            <div class="auth-box">
                <h2>Create Account</h2>
                <p>Sign up to get started</p>
                
                <form>
                    <div class="form-group">
                        <label for="register-name">Full Name</label>
                        <input type="text" id="register-name" placeholder="Enter your full name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="register-email">Email Address</label>
                        <input type="email" id="register-email" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="register-password">Password</label>
                        <input type="password" id="register-password" placeholder="Create a password" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="register-confirm-password">Confirm Password</label>
                        <input type="password" id="register-confirm-password" placeholder="Confirm your password" required>
                    </div>
                    
                    <div class="checkbox-group">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">I agree to the Terms and Conditions</label>
                    </div>
                    
                    <button type="submit" class="btn">Create Account</button>
                </form>
                
                <div class="divider">or</div>
                
                <div class="auth-links">
                    Already have an account? <a onclick="showPage('login')">Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Forgot Password Page -->
    <div id="forgot-password" class="page">
        <header>
            <div class="header-content">
                <div class="logo" onclick="showPage('home')">YourBrand</div>
                <nav>
                    <ul>
                        <li><a onclick="showPage('home')">Home</a></li>
                        <li><a onclick="showPage('login')">Login</a></li>
                        <li><a onclick="showPage('register')">Register</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="auth-container">
            <div class="auth-box">
                <h2>Forgot Password?</h2>
                <p>Enter your email address and we'll send you a link to reset your password</p>
                
                <form>
                    <div class="form-group">
                        <label for="forgot-email">Email Address</label>
                        <input type="email" id="forgot-email" placeholder="Enter your email" required>
                    </div>
                    
                    <button type="submit" class="btn">Send Reset Link</button>
                </form>
                
                <div class="auth-links">
                    <a onclick="showPage('login')">Back to Login</a>
                </div>
                
                <div class="divider">or</div>
                
                <div class="auth-links">
                    Don't have an account? <a onclick="showPage('register')">Sign Up</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showPage(pageId) {
            const pages = document.querySelectorAll('.page');
            pages.forEach(page => {
                page.classList.remove('active');
            });
            
            const targetPage = document.getElementById(pageId);
            if (targetPage) {
                targetPage.classList.add('active');
                window.scrollTo(0, 0);
            }
        }