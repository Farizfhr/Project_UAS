<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-400 to-indigo-500 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto h-16 w-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center mb-6 shadow-lg transform hover:scale-105 transition-transform duration-200">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome back</h2>
                <p class="text-gray-600">Sign in to your account to continue</p>
            </div>

            <!-- Login Card -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 relative overflow-hidden">
                <!-- Decorative elements -->
                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-purple-200 to-indigo-300 rounded-full -translate-y-10 translate-x-10 opacity-30"></div>
                <div class="absolute bottom-0 left-0 w-16 h-16 bg-gradient-to-tr from-purple-200 to-indigo-300 rounded-full translate-y-8 -translate-x-8 opacity-30"></div>
                
                <div class="relative z-10">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold mb-2 flex items-center" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                                <x-text-input id="email" 
                                    class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white hover:bg-gray-50" 
                                    type="email" 
                                    name="email" 
                                    :value="old('email')" 
                                    required 
                                    autofocus 
                                    autocomplete="username"
                                    placeholder="Enter your email address" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold mb-2 flex items-center" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <x-text-input id="password" 
                                    class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white hover:bg-gray-50"
                                    type="password"
                                    name="password"
                                    required 
                                    autocomplete="current-password"
                                    placeholder="Enter your password" />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="flex items-center cursor-pointer group">
                                <input id="remember_me" 
                                    type="checkbox" 
                                    class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded transition-colors" 
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600 group-hover:text-gray-800 transition-colors">{{ __('Remember me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-purple-600 hover:text-purple-800 font-medium transition-colors" 
                                   href="{{ route('password.request') }}">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <x-primary-button class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold py-3 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013 3v1"></path>
                                </svg>
                                {{ __('Sign in') }}
                            </span>
                        </x-primary-button>
                    </form>

                    <!-- Divider -->
                    <div class="mt-8">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">Don't have an account yet?</span>
                            </div>
                        </div>
                    </div>

                    <!-- Register Link -->
                    <div class="mt-6 text-center">
                        <a href="{{ route('register') }}" class="inline-flex items-center text-purple-600 hover:text-purple-800 font-semibold transition-colors group">
                            <span>Create new account</span>
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center text-gray-500 text-sm">
                <p>© 2024 Your Company. Secure login powered by Laravel</p>
            </div>
        </div>
    </div>
</x-guest-layout>
