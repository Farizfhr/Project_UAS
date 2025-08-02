<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow-light: 0 8px 32px rgba(31, 38, 135, 0.37);
            --shadow-dark: 0 8px 32px rgba(0, 0, 0, 0.37);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            transition: var(--transition);
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            min-height: 100vh;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body.light-mode {
            color: #1f2937;
        }

        body.dark-mode {
            color: #f8fafc;
            background: linear-gradient(-45deg, #0f0f23, #1a1a2e, #16213e, #0f3460);
            background-size: 400% 400%;
        }

        /* Glass Morphism Effect */
        .glass {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow-light);
        }

        body.dark-mode .glass {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: var(--shadow-dark);
        }

        /* Modern Toggle Switch */
        .theme-toggle {
            position: fixed;
            top: 2rem;
            right: 2rem;
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.25rem;
            border-radius: 50px;
            transition: var(--transition);
        }

        .theme-toggle:hover {
            transform: translateY(-2px);
        }

        .toggle-input {
            display: none;
        }

        .toggle-slider {
            position: relative;
            width: 60px;
            height: 30px;
            background: linear-gradient(135deg, #ffeaa7, #fab1a0);
            border-radius: 30px;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .toggle-slider::before {
            content: '☀️';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 24px;
            height: 24px;
            background: white;
            border-radius: 50%;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .toggle-input:checked + .toggle-slider {
            background: linear-gradient(135deg, #74b9ff, #0984e3);
        }

        .toggle-input:checked + .toggle-slider::before {
            transform: translateX(30px);
            content: '🌙';
        }

        .toggle-label {
            font-weight: 500;
            font-size: 0.9rem;
            color: white;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        /* Navigation Styles */
        .main-nav {
            background: transparent;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: none;
            border-bottom: 1px solid var(--glass-border);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
            margin: 1rem 1rem 0 1rem;
            border-radius: 20px;
        }

        .nav-brand {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: -0.025em;
            text-shadow: none;
        }

        .nav-link {
            position: relative;
            font-weight: 500;
            transition: var(--transition);
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            margin: 0 0.25rem;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 3px;
            background: var(--primary-gradient);
            border-radius: 2px;
            transition: var(--transition);
            transform: translateX(-50%);
        }

        .nav-link:hover::before,
        .nav-link.active::before {
            width: 80%;
        }

        .nav-link:hover {
            background: var(--glass-bg);
            transform: translateY(-1px);
        }

        .nav-link.active {
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .nav-link i {
            margin-right: 0.5rem;
            font-size: 1.1rem;
        }

        /* Content Area */
        .content-wrapper {
            margin: 2rem;
            margin-top: 1rem;
        }

        .page-header {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            margin-bottom: 2rem;
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            font-size: 1.1rem;
            opacity: 0.8;
            font-weight: 400;
        }

        .main-content {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2rem;
            min-height: 60vh;
            position: relative;
        }

        /* Floating Elements */
        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            animation: float 6s ease-in-out infinite;
        }

        .floating-circle:nth-child(1) {
            width: 100px;
            height: 100px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-circle:nth-child(2) {
            width: 80px;
            height: 80px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-circle:nth-child(3) {
            width: 120px;
            height: 120px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .theme-toggle {
                top: 1rem;
                right: 1rem;
                padding: 0.5rem 1rem;
            }

            .nav-brand {
                font-size: 1.25rem;
            }

            .page-title {
                font-size: 2rem;
            }

            .content-wrapper {
                margin: 1rem;
            }

            .main-nav {
                margin: 0.5rem;
                border-radius: 15px;
            }

            .nav-link {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }

            .floating-circle {
                display: none;
            }
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Loading Animation */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .loader-spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        /* Logout Button Styles */
            .nav-link.bg-red-500 {
                background: linear-gradient(135deg, #ef4444, #dc2626);
                color: white;
                border: none;
                box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
            }

            .nav-link.bg-red-500:hover {
                background: linear-gradient(135deg, #dc2626, #b91c1c);
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
            }

            /* User Info Styles */
            .nav-link .fas.fa-user-circle {
                color: #10b981;
                margin-right: 0.5rem;
            }

            /* Mobile Authentication Styles */
            .border-t {
                border-top: 1px solid rgba(255, 255, 255, 0.2);
            }

            /* Authentication Form Styles */
            form.inline {
                display: inline-block;
            }

            form button[type="submit"] {
                cursor: pointer;
                outline: none;
            }

            form button[type="submit"]:focus {
                box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.5);
            }
    </style>
</head>
<body class="light-mode" id="body">
    <!-- Page Loader -->
    <div class="page-loader" id="pageLoader">
        <div class="loader-spinner"></div>
    </div>

    <!-- Floating Background Elements -->
    <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
    </div>

    <div class="min-h-screen">
        <!-- Theme Toggle -->
        <div class="theme-toggle glass">
            <span class="toggle-label">
                <i class="fas fa-sun" id="lightIcon"></i>
                <i class="fas fa-moon" id="darkIcon" style="display: none;"></i>
            </span>
            <label class="toggle-slider">
                <input type="checkbox" class="toggle-input" id="theme-toggle" />
            </label>
        </div>

        @if(file_exists(resource_path('views/layouts/navigation.blade.php')))
    @include('layouts.navigation')
@else
    <!-- Modern Navigation -->
    <nav class="main-nav glass">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h2 class="nav-brand">
                            <i class="fas fa-graduation-cap mr-2"></i>
                            Sistem Manajemen Siswa
                        </h2>
                    </div>
                </div>
                
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('mahasiswa.index') }}" 
                       class="nav-link {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        Data Mahasiswa
                    </a>
                    <a href="{{ route('matakuliah.index') }}" 
                       class="nav-link {{ request()->routeIs('matakuliah.*') ? 'active' : '' }}">
                        <i class="fas fa-book"></i>
                        Mata Kuliah
                    </a>
                    
                    <!-- User Authentication Area -->
                    @auth
                        <div class="relative ml-3">
                            <div class="flex items-center space-x-3">
                                <!-- User Info -->
                                <span class="nav-link text-sm">
                                    <i class="fas fa-user-circle"></i>
                                    {{ Auth::user()->name }}
                                </span>
                                
                                <!-- Logout Button -->
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="nav-link bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors">
                                        <i class="fas fa-sign-out-alt"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Login/Register Links for Guest Users -->
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="fas fa-sign-in-alt"></i>
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="nav-link">
                            <i class="fas fa-user-plus"></i>
                            Register
                        </a>
                    @endauth
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="nav-link" id="mobile-menu-button">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div class="md:hidden hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="{{ route('mahasiswa.index') }}" 
                       class="nav-link block {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        Data Mahasiswa
                    </a>
                    <a href="{{ route('matakuliah.index') }}" 
                       class="nav-link block {{ request()->routeIs('matakuliah.*') ? 'active' : '' }}">
                        <i class="fas fa-book"></i>
                        Mata Kuliah
                    </a>
                    
                    <!-- Mobile Authentication -->
                    @auth
                        <div class="border-t border-white/20 pt-3 mt-3">
                            <div class="nav-link block text-sm mb-2">
                                <i class="fas fa-user-circle"></i>
                                {{ Auth::user()->name }}
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link block w-full text-left bg-red-500 hover:bg-red-600 text-white rounded-lg">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="border-t border-white/20 pt-3 mt-3">
                            <a href="{{ route('login') }}" class="nav-link block">
                                <i class="fas fa-sign-in-alt"></i>
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="nav-link block">
                                <i class="fas fa-user-plus"></i>
                                Register
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
@endif

        <div class="content-wrapper">
            <!-- Page Heading -->
            @if(isset($header))
                <header class="page-header glass">
                    <div class="page-title">{{ $header }}</div>
                    <div class="page-subtitle">Kelola data dengan mudah dan efisien</div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="main-content glass">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Theme Toggle Functionality
        const toggle = document.getElementById('theme-toggle');
        const body = document.getElementById('body');
        const lightIcon = document.getElementById('lightIcon');
        const darkIcon = document.getElementById('darkIcon');

        // Load saved theme
        const savedTheme = localStorage.getItem('theme') || 'light';
        if (savedTheme === 'dark') {
            body.classList.remove('light-mode');
            body.classList.add('dark-mode');
            toggle.checked = true;
            lightIcon.style.display = 'none';
            darkIcon.style.display = 'inline';
        }

        toggle.addEventListener('change', () => {
            if (toggle.checked) {
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
                lightIcon.style.display = 'none';
                darkIcon.style.display = 'inline';
                localStorage.setItem('theme', 'dark');
            } else {
                body.classList.remove('dark-mode');
                body.classList.add('light-mode');
                lightIcon.style.display = 'inline';
                darkIcon.style.display = 'none';
                localStorage.setItem('theme', 'light');
            }
        });

        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Page Loader
        window.addEventListener('load', () => {
            const loader = document.getElementById('pageLoader');
            setTimeout(() => {
                loader.style.opacity = '0';
                loader.style.visibility = 'hidden';
            }, 500);
        });

        // Smooth scroll for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add subtle parallax effect to floating elements
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.floating-circle');
            const speed = 0.5;

            parallaxElements.forEach((element, index) => {
                const yPos = -(scrolled * speed * (index + 1) * 0.1);
                element.style.transform = `translateY(${yPos}px) rotate(${scrolled * 0.1}deg)`;
            });
        });

        // Add entrance animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.glass').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>
</html>