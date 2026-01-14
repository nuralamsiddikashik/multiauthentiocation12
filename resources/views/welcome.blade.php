<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecureAuth - Multi Authentication System</title>
   
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="logo" onclick="showPage('home')">
                <span>🔐</span>
                <span>SecureAuth</span>
            </div>
            
            <ul class="nav-menu" id="navMenu">
                <li><span class="nav-link" onclick="showPage('home')">Home</span></li>
                <li><span class="nav-link" onclick="showPage('about')">About</span></li>
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

    <!-- Home Page -->
    <div id="home" class="page active">
        <section class="banner">
            <h1>🔐 Secure Authentication Platform</h1>
            <p>Multi-factor authentication system for your business needs</p>
            <div class="banner-buttons">
                <button class="btn-banner btn-banner-primary" onclick="showPage('register')">Get Started Free</button>
                <button class="btn-banner btn-banner-secondary" onclick="showPage('about')">Learn More</button>
            </div>
        </section>

        <section class="features-section">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Two-Factor Authentication</h3>
                    <p>Enhanced security with OTP verification for all user accounts</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3>Fast & Reliable</h3>
                    <p>Quick authentication process with 99.9% uptime guarantee</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌐</div>
                    <h3>Social Login</h3>
                    <p>Easy integration with Google, Facebook, and GitHub</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Mobile Friendly</h3>
                    <p>Responsive design works perfectly on all devices</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🛡️</div>
                    <h3>Secure & Protected</h3>
                    <p>Industry-standard encryption for all user data</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Analytics Dashboard</h3>
                    <p>Track login activity and security metrics in real-time</p>
                </div>
            </div>
        </section>
    </div>

    <!-- About Page -->
    <div id="about" class="page">
        <div class="auth-page">
            <div class="auth-container">
                <div class="auth-sidebar">
                    <h1>About SecureAuth</h1>
                    <p>We provide enterprise-grade authentication solutions</p>
                    <ul class="feature-list">
                        <li><span class="feature-icon">✅</span> Founded in 2024</li>
                        <li><span class="feature-icon">🌍</span> Serving 10,000+ Users</li>
                        <li><span class="feature-icon">🏆</span> Award-winning Platform</li>
                        <li><span class="feature-icon">💼</span> Trusted by Businesses</li>
                    </ul>
                </div>
                <div class="auth-content">
                    <h2 class="form-title">Our Mission</h2>
                    <p class="form-subtitle">Making authentication simple, secure, and accessible for everyone</p>
                    <p style="color: #4a5568; line-height: 1.8; margin-bottom: 20px;">
                        SecureAuth is a cutting-edge multi-factor authentication platform designed to provide businesses and individuals with the highest level of security. Our system combines ease of use with robust protection mechanisms.
                    </p>
                    <p style="color: #4a5568; line-height: 1.8; margin-bottom: 20px;">
                        We believe that security should never compromise user experience. That's why we've built a platform that's both powerful and intuitive, ensuring your data remains protected without any hassle.
                    </p>
                    <button class="btn-primary" onclick="showPage('register')">Join Us Today</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Page -->
    <div id="contact" class="page">
        <div class="auth-page">
            <div class="auth-container">
                <div class="auth-sidebar">
                    <h1>Get In Touch</h1>
                    <p>We'd love to hear from you</p>
                    <ul class="feature-list">
                        <li><span class="feature-icon">📧</span> support@secureauth.com</li>
                        <li><span class="feature-icon">📱</span> +880 1234-567890</li>
                        <li><span class="feature-icon">📍</span> Dhaka, Bangladesh</li>
                        <li><span class="feature-icon">⏰</span> 24/7 Support Available</li>
                    </ul>
                </div>
                <div class="auth-content">
                    <h2 class="form-title">Contact Us</h2>
                    <p class="form-subtitle">Send us a message and we'll respond shortly</p>
                    
                    <div class="form-group">
                        <label class="form-label">Your Name</label>
                        <input type="text" class="form-input" placeholder="Enter your name">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-input" placeholder="Enter your email">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Message</label>
                        <textarea class="form-input" rows="5" placeholder="Write your message here..."></textarea>
                    </div>
                    
                    <button class="btn-primary">Send Message</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Page -->
    <div id="login" class="page">
        <div class="auth-page">
            <div class="auth-container">
                <div class="auth-sidebar">
                    <h1>Welcome Back!</h1>
                    <p>Login to access your secure dashboard</p>
                    <ul class="feature-list">
                        <li><span>✅</span> Secure Login</li>
                        <li><span>🔒</span> Two-Factor Authentication</li>
                        <li><span>🌐</span> Social Login Options</li>
                        <li><span>⚡</span> Quick Access</li>
                    </ul>
                </div>
                <div class="auth-content">
                    <h2 class="form-title">Login</h2>
                    <p class="form-subtitle">Enter your credentials to continue</p>

                    <div class="form-group">
                        <label class="form-label">Email or Phone</label>
                        <div class="input-icon" data-icon="📧">
                            <input type="text" class="form-input" id="loginEmail" placeholder="Enter your email or phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-icon" data-icon="🔒" style="position: relative;">
                            <input type="password" class="form-input" id="loginPassword" placeholder="Enter your password">
                            <span class="password-toggle" onclick="togglePassword('loginPassword')">👁️</span>
                        </div>
                    </div>

                    <div class="form-checkbox">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember me</label>
                    </div>

                    <button class="btn-primary" onclick="login()">Login Now</button>

                    <div class="form-footer">
                        Don't have an account? <a onclick="showPage('register')">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Page -->
    <div id="register" class="page">
        <div class="auth-page">
            <div class="auth-container">
                <div class="auth-sidebar">
                    <h1>Join SecureAuth</h1>
                    <p>Create your account in minutes</p>
                    <ul class="feature-list">
                        <li><span>✅</span> Free Account</li>
                        <li><span>🔒</span> Secure Registration</li>
                        <li><span>📧</span> Email Verification</li>
                        <li><span>⚡</span> Instant Access</li>
                    </ul>
                </div>
                <div class="auth-content">
                    <h2 class="form-title">Create Account</h2>
                    <p class="form-subtitle">Sign up to get started</p>

                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <div class="input-icon" data-icon="👤">
                            <input type="text" class="form-input" id="registerName" placeholder="Enter your full name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <div class="input-icon" data-icon="📧">
                            <input type="email" class="form-input" id="registerEmail" placeholder="Enter your email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <div class="input-icon" data-icon="📱">
                            <input type="tel" class="form-input" id="registerPhone" placeholder="Enter your phone number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-icon" data-icon="🔒" style="position: relative;">
                            <input type="password" class="form-input" id="registerPassword" placeholder="Create password">
                            <span class="password-toggle" onclick="togglePassword('registerPassword')">👁️</span>
                        </div>
                    </div>

                    <div class="form-checkbox">
                        <input type="checkbox" id="terms">
                        <label for="terms">I agree to Terms & Conditions</label>
                    </div>

                    <button class="btn-primary" onclick="register()">Create Account</button>

                    <div class="form-footer">
                        Already have an account? <a onclick="showPage('login')">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Page -->
    <div id="dashboard" class="page">
        <div class="dashboard">
            <div class="dashboard-header">
                <div class="welcome-text">
                    <h2>Welcome back, <span id="userName">User</span>! 👋</h2>
                    <p>Here's what's happening with your account today</p>
                </div>
                <button class="btn-logout" onclick="logout()">🚪 Logout</button>
            </div>

            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <div class="card-icon">👤</div>
                    <div class="card-title">TOTAL LOGINS</div>
                    <div class="card-value">127</div>
                </div>
                <div class="dashboard-card">
                    <div class="card-icon">🔒</div>
                    <div class="card-title">SECURITY SCORE</div>
                    <div class="card-value">98%</div>
                </div>
                <div class="dashboard-card">
                    <div class="card-icon">⚡</div>
                    <div class="card-title">ACTIVE SESSIONS</div>
                    <div class="card-value">3</div>
                </div>
                <div class="dashboard-card">
                    <div class="card-icon">📅</div>
                    <div class="card-title">MEMBER SINCE</div>
                    <div class="card-value" style="font-size: 20px;">Jan 2026</div>
                </div>
            </div>

            <div class="activity-section">
                <h3>Recent Activity</h3>
                <div class="activity-item">
                    <div class="activity-icon">✅</div>
                    <div class="activity-details">
                        <h4>Successful Login</h4>
                        <p>Logged in from Chrome on Windows - 2 hours ago</p>
                    </div>
                </div>
                <div class="activity-item">
<div