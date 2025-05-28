@extends('components.base')

@section('title', 'Verify Email - Wallet System')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="max-w-lg w-full space-y-8">
        <!-- Header Section -->
        <div class="text-center">
            <div class="mx-auto h-20 w-20 bg-blue-600 rounded-full flex items-center justify-center mb-6 shadow-lg animate-pulse">
                <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Verify Your Email</h2>
            <p class="text-gray-600 text-base leading-relaxed">We're almost there! Let's secure your wallet account</p>
        </div>

        <!-- Main Content Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <!-- Email Sent Icon and Message -->
            <div class="flex items-start space-x-4 mb-6">
                <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Check Your Inbox</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </p>
                </div>
            </div>

            <!-- Success Message -->
            @if (session('status') == 'verification-link-sent')
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="space-y-4">
                <!-- Resend Email Button -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <x-primary-button class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        {{ __('Resend Verification Email') }}
                    </x-primary-button>
                </form>

                <!-- Divider -->
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">or</span>
                    </div>
                </div>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex justify-center items-center py-3 px-4 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>

        <!-- Help Section -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h4 class="text-sm font-semibold text-gray-900 mb-3">Having trouble?</h4>
            <div class="space-y-3">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0 w-5 h-5 bg-blue-100 rounded-full flex items-center justify-center mt-0.5">
                        <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    </div>
                    <p class="text-sm text-gray-600">Check your spam or junk folder</p>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0 w-5 h-5 bg-blue-100 rounded-full flex items-center justify-center mt-0.5">
                        <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    </div>
                    <p class="text-sm text-gray-600">Make sure you're checking the correct email address</p>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0 w-5 h-5 bg-blue-100 rounded-full flex items-center justify-center mt-0.5">
                        <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    </div>
                    <p class="text-sm text-gray-600">Click "Resend" if you haven't received the email after 5 minutes</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Background Decoration -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
        <div class="absolute top-20 left-20 w-32 h-32 bg-blue-200 rounded-full opacity-20 animate-float"></div>
        <div class="absolute top-60 right-10 w-24 h-24 bg-blue-300 rounded-full opacity-25 animate-float-delayed"></div>
        <div class="absolute bottom-32 left-10 w-20 h-20 bg-blue-400 rounded-full opacity-30 animate-float"></div>
        <div class="absolute bottom-20 right-32 w-16 h-16 bg-blue-100 rounded-full opacity-20 animate-float-delayed"></div>
    </div>
</div>

<style>
    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-20px);
        }
    }
    
    @keyframes float-delayed {
        0%, 100% {
            transform: translateY(-10px);
        }
        50% {
            transform: translateY(-30px);
        }
    }
    
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    
    .animate-float-delayed {
        animation: float-delayed 8s ease-in-out infinite;
    }
    
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>
@endsection