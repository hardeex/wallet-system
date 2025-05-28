@extends('components.base')
@section('title', 'Login - Wallet System')

@section('content')

<div class="min-h-screen flex">
    <!-- Left Side - Branding -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 translate-y-1/2"></div>
        </div>
        
        <!-- Content -->
        <div class="relative z-10 flex flex-col justify-center items-center text-white p-12 w-full">
            <!-- Wallet Icon -->
            <div class="w-24 h-24 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center mb-8 backdrop-blur-sm">
                <i class="fas fa-wallet text-4xl text-white"></i>
            </div>
            
            <!-- Hero Image -->
            <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                 alt="Digital Wallet" 
                 class="w-80 h-60 object-cover rounded-2xl mb-8 shadow-2xl opacity-90">
            
            <h2 class="text-4xl font-bold mb-4 text-center">Secure Digital Wallet</h2>
            <p class="text-xl text-blue-100 text-center max-w-md leading-relaxed">
                Manage your finances with confidence. Fast, secure, and intuitive wallet system.
            </p>
        </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-gray-50">
        <div class="w-full max-w-md">
            <!-- Mobile Logo -->
            <div class="lg:hidden flex items-center justify-center mb-8">
                <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-wallet text-2xl text-white"></i>
                </div>
            </div>

            @include('feedback')

            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h1>
                <p class="text-gray-600">Sign in to your wallet account</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700" :status="session('status')" />

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email Address')" class="block text-sm font-semibold text-gray-700 mb-2" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <x-text-input id="email" 
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-white shadow-sm" 
                                    type="email" 
                                    name="email" 
                                    :value="old('email')" 
                                    required 
                                    autofocus 
                                    autocomplete="username"
                                    placeholder="Enter your email" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="block text-sm font-semibold text-gray-700 mb-2" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <x-text-input id="password" 
                                    class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-white shadow-sm"
                                    type="password"
                                    name="password"
                                    required 
                                    autocomplete="current-password"
                                    placeholder="Enter your password" />
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword()">
                            <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="toggleIcon"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" 
                               type="checkbox" 
                               class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" 
                               name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:text-blue-800 font-medium transition duration-200" 
                           href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <x-primary-button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-xl transition duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        {{ __('Sign In') }}
                    </x-primary-button>
                </div>

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-gray-50 text-gray-500">Or continue with</span>
                    </div>
                </div>

                <!-- Social Login Options -->
                <div class="grid grid-cols-2 gap-4">
                    <button type="button" class="flex items-center justify-center px-4 py-3 border border-gray-300 rounded-xl hover:bg-gray-50 transition duration-200 group">
                        <i class="fab fa-google text-red-500 mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                        <span class="text-gray-700 font-medium">Google</span>
                    </button>
                    <button type="button" class="flex items-center justify-center px-4 py-3 border border-gray-300 rounded-xl hover:bg-gray-50 transition duration-200 group">
                        <i class="fab fa-apple text-gray-800 mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                        <span class="text-gray-700 font-medium">Apple</span>
                    </button>
                </div>

                <!-- Sign Up Link -->
                <div class="text-center mt-8">
                    <p class="text-gray-600">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-200">
                            Create one now
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Password Toggle -->
<script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
</script>
@endsection