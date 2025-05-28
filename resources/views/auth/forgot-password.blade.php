@extends('components.base')
@section('title', 'Forgot Password - E-Wallet')

@section('content')
<div class="min-h-screen flex">
    <!-- Left Side - Branding -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full translate-x-1/3 -translate-y-1/3"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/3 translate-y-1/3"></div>
        </div>
        
        <!-- Content -->
        <div class="relative z-10 flex flex-col justify-center items-center text-white p-12 w-full">
            <!-- Reset Icon -->
            <div class="w-24 h-24 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center mb-8 backdrop-blur-sm">
                <i class="fas fa-key text-4xl text-white"></i>
            </div>
            
            <!-- Hero Image -->
            <img src="https://images.unsplash.com/photo-1555421689-491a97ff2040?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                 alt="Password Recovery" 
                 class="w-80 h-60 object-cover rounded-2xl mb-8 shadow-2xl opacity-90">
            
            <h2 class="text-4xl font-bold mb-4 text-center">Reset Your Password</h2>
            <p class="text-xl text-blue-100 text-center max-w-md leading-relaxed">
                Don't worry, it happens to everyone. We'll help you get back into your account securely.
            </p>
            
            <!-- Recovery Steps -->
            <div class="mt-8 space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-sm font-bold">1</div>
                    <span class="text-blue-100">Enter your email address</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-sm font-bold">2</div>
                    <span class="text-blue-100">Check your inbox for reset link</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-sm font-bold">3</div>
                    <span class="text-blue-100">Create your new password</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Reset Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-gray-50">
        <div class="w-full max-w-md">
            <!-- Mobile Logo -->
            <div class="lg:hidden flex items-center justify-center mb-8">
                <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-wallet text-2xl text-white"></i>
                </div>
            </div>

            <!-- Header -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lock text-2xl text-blue-600"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Forgot Password?</h1>
                <p class="text-gray-600 leading-relaxed">
                    No worries! Enter your email address and we'll send you a password reset link to get you back into your account.
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700" :status="session('status')" />

            <!-- Success Message Display -->
            @if (session('status'))
                <div class="mb-6 p-6 bg-green-50 border border-green-200 rounded-xl">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-semibold text-green-800">Email Sent Successfully!</h3>
                            <p class="text-sm text-green-700 mt-1">{{ session('status') }}</p>
                        </div>
                    </div>
                    <div class="mt-4 text-sm text-green-700">
                        <p>Don't see the email? Check your spam folder or 
                           <button type="button" onclick="document.getElementById('resend-form').submit();" class="font-semibold underline hover:no-underline">
                               resend the link
                           </button>
                        </p>
                    </div>
                </div>
            @endif

            <!-- Reset Password Form -->
            <form method="POST" action="{{ route('password.email') }}" class="space-y-6" id="reset-form">
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
                                    placeholder="Enter your registered email address" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm" />
                </div>

                <!-- Submit Button -->
                <div>
                    <x-primary-button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-xl transition duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg" id="submit-btn">
                        <span id="btn-text">
                            <i class="fas fa-paper-plane mr-2"></i>
                            {{ __('Send Reset Link') }}
                        </span>
                        <span id="btn-loading" class="hidden">
                            <i class="fas fa-spinner fa-spin mr-2"></i>
                            Sending...
                        </span>
                    </x-primary-button>
                </div>

                <!-- Help Text -->
                <div class="text-center">
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-info-circle text-blue-600 mt-0.5"></i>
                            <div class="text-left">
                                <p class="text-sm text-blue-800 font-medium mb-1">What happens next?</p>
                                <p class="text-sm text-blue-700">
                                    We'll send a secure password reset link to your email. Click the link and follow the instructions to create a new password.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Hidden Resend Form -->
            <form method="POST" action="{{ route('password.email') }}" id="resend-form" class="hidden">
                @csrf
                <input type="hidden" name="email" value="{{ old('email') }}">
            </form>

            <!-- Back to Login -->
            <div class="text-center mt-8">
                <div class="flex items-center justify-center space-x-4">
                    <div class="flex-1 border-t border-gray-300"></div>
                    <span class="text-gray-500 text-sm">or</span>
                    <div class="flex-1 border-t border-gray-300"></div>
                </div>
                
                <div class="mt-6">
                    <a href="{{ route('login') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold transition duration-200 group">
                        <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-200"></i>
                        Back to Login
                    </a>
                </div>
                
                <div class="mt-4">
                    <p class="text-gray-600 text-sm">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-200">
                            Create one now
                        </a>
                    </p>
                </div>
            </div>

            <!-- Security Notice -->
            <div class="mt-8 p-4 bg-gray-100 rounded-xl">
                <div class="flex items-start space-x-3">
                    <i class="fas fa-shield-alt text-gray-600 mt-0.5"></i>
                    <div>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            <strong>Security Notice:</strong> Reset links expire after 60 minutes for your security. 
                            If you don't receive an email, please check your spam folder or contact support.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Enhanced UX -->
<script>
    // Form submission with loading state
    document.getElementById('reset-form').addEventListener('submit', function() {
        const submitBtn = document.getElementById('submit-btn');
        const btnText = document.getElementById('btn-text');
        const btnLoading = document.getElementById('btn-loading');
        
        // Show loading state
        submitBtn.disabled = true;
        btnText.classList.add('hidden');
        btnLoading.classList.remove('hidden');
        
        // Re-enable after 3 seconds (in case of errors)
        setTimeout(function() {
            submitBtn.disabled = false;
            btnText.classList.remove('hidden');
            btnLoading.classList.add('hidden');
        }, 3000);
    });

    // Email validation feedback
    document.getElementById('email').addEventListener('input', function() {
        const email = this.value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (email.length > 0) {
            if (emailRegex.test(email)) {
                this.classList.remove('border-red-500');
                this.classList.add('border-green-500');
            } else {
                this.classList.remove('border-green-500');
                this.classList.add('border-red-500');
            }
        } else {
            this.classList.remove('border-red-500', 'border-green-500');
        }
    });

    // Auto-focus email field on page load
    window.addEventListener('load', function() {
        document.getElementById('email').focus();
    });
</script>
@endsection