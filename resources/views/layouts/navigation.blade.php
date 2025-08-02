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
                <!-- Dashboard Link -->
                <a href="{{ route('dashboard') }}" 
                   class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
                
                <!-- Data Mahasiswa Link -->
                <a href="{{ route('mahasiswa.index') }}" 
                   class="nav-link {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    Data Mahasiswa
                </a>
                
                <!-- Mata Kuliah Link -->
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
                                <i class="fas fa-user-circle text-green-400"></i>
                                {{ Auth::user()->name }}
                            </span>
                            
                            <!-- Logout Button -->
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="nav-link logout-btn">
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
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link">
                            <i class="fas fa-user-plus"></i>
                            Register
                        </a>
                    @endif
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
                <!-- Dashboard Mobile -->
                <a href="{{ route('dashboard') }}" 
                   class="nav-link block {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
                
                <!-- Data Mahasiswa Mobile -->
                <a href="{{ route('mahasiswa.index') }}" 
                   class="nav-link block {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    Data Mahasiswa
                </a>
                
                <!-- Mata Kuliah Mobile -->
                <a href="{{ route('matakuliah.index') }}" 
                   class="nav-link block {{ request()->routeIs('matakuliah.*') ? 'active' : '' }}">
                    <i class="fas fa-book"></i>
                    Mata Kuliah
                </a>
                
                <!-- Mobile Authentication -->
                @auth
                    <div class="border-t border-white/20 pt-3 mt-3">
                        <div class="nav-link block text-sm mb-2">
                            <i class="fas fa-user-circle text-green-400"></i>
                            {{ Auth::user()->name }}
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link block w-full text-left logout-btn">
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
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link block">
                                <i class="fas fa-user-plus"></i>
                                Register
                            </a>
                        @endif
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
/* Logout Button Specific Styles */
.logout-btn {
    background: linear-gradient(135deg, #ef4444, #dc2626) !important;
    color: white !important;
    border: none !important;
    box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3) !important;
}

.logout-btn:hover {
    background: linear-gradient(135deg, #dc2626, #b91c1c) !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4) !important;
}

.logout-btn::before {
    display: none !important;
}
</style>