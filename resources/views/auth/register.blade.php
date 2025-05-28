@extends('components.base')
@section('title', 'Register - Wallet System')

@section('content')
<div class="min-h-screen flex">
    <!-- Left Side - Branding -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full -translate-x-1/2 translate-y-1/2"></div>
        </div>
        
        <!-- Content -->
        <div class="relative z-10 flex flex-col justify-center items-center text-white p-12 w-full">
            <!-- Security Icon -->
            <div class="w-24 h-24 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center mb-8 backdrop-blur-sm">
                <i class="fas fa-shield-alt text-4xl text-white"></i>
            </div>
            
            <!-- Hero Image -->
            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                 alt="Secure Registration" 
                 class="w-80 h-60 object-cover rounded-2xl mb-8 shadow-2xl opacity-90">
            
            <h2 class="text-4xl font-bold mb-4 text-center">Join E-Wallet</h2>
            <p class="text-xl text-blue-100 text-center max-w-md leading-relaxed">
                Start your secure financial journey today. Create your account in just a few simple steps.
            </p>
            
            <!-- Features -->
            <div class="mt-8 space-y-4">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-check-circle text-green-300"></i>
                    <span class="text-blue-100">Bank-grade security</span>
                </div>
                <div class="flex items-center space-x-3">
                    <i class="fas fa-check-circle text-green-300"></i>
                    <span class="text-blue-100">Instant transactions</span>
                </div>
                <div class="flex items-center space-x-3">
                    <i class="fas fa-check-circle text-green-300"></i>
                    <span class="text-blue-100">24/7 support</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Register Form -->
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
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Create Account</h1>
                <p class="text-gray-600">Join thousands of satisfied users</p>
            </div>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Full Name')" class="block text-sm font-semibold text-gray-700 mb-2" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <x-text-input id="name" 
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-white shadow-sm" 
                                    type="text" 
                                    name="name" 
                                    :value="old('name')" 
                                    required 
                                    autofocus 
                                    autocomplete="name"
                                    placeholder="Enter your full name" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600 text-sm" />
                </div>

                
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
                                    autocomplete="username"
                                    placeholder="Enter your email address" />
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
                                    autocomplete="new-password"
                                    placeholder="Create a strong password" />
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword('password')">
                            <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="togglePasswordIcon"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
                    
                    <!-- Password Requirements -->
                    <div class="mt-2 text-xs text-gray-500">
                        <p>Password must contain:</p>
                        <ul class="list-disc list-inside mt-1 space-y-1">
                            <li>At least 8 characters</li>
                            <li>One uppercase letter</li>
                            <li>One lowercase letter</li>
                            <li>One number</li>
                        </ul>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-semibold text-gray-700 mb-2" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <x-text-input id="password_confirmation" 
                                    class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-white shadow-sm"
                                    type="password"
                                    name="password_confirmation"
                                    required 
                                    autocomplete="new-password"
                                    placeholder="Confirm your password" />
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword('password_confirmation')">
                            <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="toggleConfirmPasswordIcon"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600 text-sm" />
                </div>

                <!-- Terms and Privacy -->
                <div class="flex items-start space-x-3">
                    <input id="terms" 
                           type="checkbox" 
                           class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 mt-1" 
                           required>
                    <label for="terms" class="text-sm text-gray-600 leading-relaxed">
                        I agree to the 
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Terms of Service</a> 
                        and 
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Privacy Policy</a>
                    </label>
                </div>

                <!-- Marketing Consent -->
                <div class="flex items-start space-x-3">
                    <input id="marketing" 
                           type="checkbox" 
                           class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 mt-1" 
                           name="marketing_consent">
                    <label for="marketing" class="text-sm text-gray-600 leading-relaxed">
                        I want to receive updates about new features and promotions (optional)
                    </label>
                </div>

                <!-- Submit Button -->
                <div>
                    <x-primary-button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-xl transition duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg">
                        <i class="fas fa-user-plus mr-2"></i>
                        {{ __('Create Account') }}
                    </x-primary-button>
                </div>

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-gray-50 text-gray-500">Or sign up with</span>
                    </div>
                </div>

                <!-- Social Registration Options -->
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

                <!-- Sign In Link -->
                <div class="text-center mt-8">
                    <p class="text-gray-600">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-200">
                            Sign in here
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Password Toggle -->
<script>
    function togglePassword(fieldId) {
        const passwordField = document.getElementById(fieldId);
        const toggleIcon = document.getElementById('toggle' + (fieldId === 'password' ? 'Password' : 'ConfirmPassword') + 'Icon');
        
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

    // Real-time password validation
    document.getElementById('password').addEventListener('input', function() {
        const password = this.value;
        const requirements = document.querySelectorAll('.password-requirement');
        
        // Check requirements
        const hasMinLength = password.length >= 8;
        const hasUppercase = /[A-Z]/.test(password);
        const hasLowercase = /[a-z]/.test(password);
        const hasNumber = /\d/.test(password);
        
        // Update visual feedback (you can enhance this further)
        this.classList.toggle('border-green-500', hasMinLength && hasUppercase && hasLowercase && hasNumber);
        this.classList.toggle('border-red-500', password.length > 0 && !(hasMinLength && hasUppercase && hasLowercase && hasNumber));
    });

    // Password matching validation
    document.getElementById('password_confirmation').addEventListener('input', function() {
        const password = document.getElementById('password').value;
        const confirmPassword = this.value;
        
        if (confirmPassword.length > 0) {
            this.classList.toggle('border-green-500', password === confirmPassword);
            this.classList.toggle('border-red-500', password !== confirmPassword);
        }
    });
</script>
@endsection