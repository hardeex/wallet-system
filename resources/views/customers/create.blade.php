@extends('components.base')
@section('title', 'Create Customer Account')

@guest
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 rounded flex items-center">
        <span>Please <a href="{{ route('login') }}" class="underline">log in</a> to create a customer or manage your wallet.</span>
    </div>
@endguest

@auth

@section('content')
    <div class="bg-gray-100 min-h-screen py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            @include('feedback')
            <!-- Page Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Create Customer Account</h1>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500">Add a new customer to your organization</p>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <!-- Progress Bar -->
                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                        <div id="progress-bar"
                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500"
                            style="width: 0%"></div>
                    </div>
                </div>

                <!-- Success/Error Messages -->
                <div id="alert-container" class="px-4 py-2">
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded flex items-center"
                            role="alert">
                            <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded flex items-center"
                            role="alert">
                            <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ session('error') }}</span>
                        </div>
                    @endif
                </div>

                <!-- Form -->
                <div class="px-4 py-5 sm:p-6">
                    <form id="customerForm" action="{{ route('create-customer') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <!-- Basic Information Section -->
                            <div class="sm:col-span-6">
                                <h2 class="text-lg font-medium text-gray-900 border-b pb-2">Basic Information</h2>
                            </div>

                            <!-- Email -->
                            <div class="sm:col-span-3">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>
                                    </div>
                                    <input type="email" name="email" id="email" required value="{{ old('email') }}"
                                        class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 sm:text-sm border-gray-300 text-black rounded-md"
                                        placeholder="customer@example.com">
                                </div>
                                <p class="error-message mt-1 text-sm text-red-600 hidden" id="email-error"></p>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="sm:col-span-3">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                        </svg>
                                    </div>
                                    <input type="tel" name="phone" id="phone" required value="{{ old('phone') }}"
                                        class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md"
                                        placeholder="+1 (555) 123-4567">
                                </div>
                                <p class="error-message mt-1 text-sm text-red-600 hidden" id="phone-error"></p>
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- First Name -->
                            <div class="sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-1">
                                    <input type="text" name="first_name" id="first_name" required
                                        value="{{ old('first_name') }}"
                                        class="focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                        placeholder="John">
                                </div>
                                <p class="error-message mt-1 text-sm text-red-600 hidden" id="first_name-error"></p>
                                @error('first_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div class="sm:col-span-3">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-1">
                                    <input type="text" name="last_name" id="last_name" required
                                        value="{{ old('last_name') }}"
                                        class="focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                        placeholder="Doe">
                                </div>
                                <p class="error-message mt-1 text-sm text-red-600 hidden" id="last_name-error"></p>
                                @error('last_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-5">
                            <div class="flex justify-end">
                                <button type="button" id="reset-form"
                                    class="mr-3 bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Reset
                                </button>
                                <button type="submit" id="submit-button"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Create Customer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Result Preview Card -->
            <div id="result-preview" class="mt-8 bg-white shadow overflow-hidden sm:rounded-lg hidden">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Customer Data Preview</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">JSON payload that will be sent to the API</p>
                    </div>
                    <button id="copy-json"
                        class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                            <path
                                d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                        </svg>
                        Copy
                    </button>
                </div>
                <div class="border-t border-gray-200">
                    <div class="px-4 py-5 sm:p-6">
                        <pre id="json-preview" class="bg-gray-50 p-4 rounded overflow-auto text-sm"></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('customerForm');
            const progressBar = document.getElementById('progress-bar');
            const resetButton = document.getElementById('reset-form');
            const resultPreview = document.getElementById('result-preview');
            const jsonPreview = document.getElementById('json-preview');
            const copyJsonButton = document.getElementById('copy-json');
            const alertContainer = document.getElementById('alert-container');

            // Validation functions
            function validateEmail(email) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }

            function validatePhone(phone) {
                return phone.length >= 10;
            }

            function showError(field, message) {
                const errorElement = document.getElementById(`${field.id}-error`);
                errorElement.textContent = message;
                errorElement.classList.remove('hidden');
                field.classList.add('border-red-500');
            }

            function clearError(field) {
                const errorElement = document.getElementById(`${field.id}-error`);
                errorElement.classList.add('hidden');
                field.classList.remove('border-red-500');
            }

            // Real-time validation
            ['email', 'phone', 'first_name', 'last_name'].forEach(id => {
                const field = document.getElementById(id);
                field.addEventListener('blur', () => {
                    if (!field.value) {
                        showError(field, 'This field is required');
                    } else if (id === 'email' && !validateEmail(field.value)) {
                        showError(field, 'Please enter a valid email address');
                    } else if (id === 'phone' && !validatePhone(field.value)) {
                        showError(field, 'Please enter a valid phone number');
                    } else {
                        clearError(field);
                    }
                });
            });

            // Reset form
            resetButton.addEventListener('click', () => {
                form.reset();
                document.querySelectorAll('.error-message').forEach(el => el.classList.add('hidden'));
                document.querySelectorAll('input').forEach(input => input.classList.remove('border-red-500'));
                resultPreview.classList.add('hidden');
                progressBar.style.width = '0%';
                showAlert('Form has been reset', 'success');
            });

            // Show alert
            function showAlert(message, type) {
                const alertDiv = document.createElement('div');
                alertDiv.className =
                    `bg-${type === 'success' ? 'green' : 'red'}-100 border-l-4 border-${type === 'success' ? 'green' : 'red'}-500 text-${type === 'success' ? 'green' : 'red'}-700 p-4 mb-4 rounded flex items-center`;
                alertDiv.innerHTML = `
                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    ${type === 'success' ? '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>' : '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>'}
                </svg>
                <span>${message}</span>
            `;
                alertContainer.innerHTML = '';
                alertContainer.appendChild(alertDiv);
                setTimeout(() => alertDiv.remove(), 5000);
            }

            // Update JSON preview
            function updatePreview() {
                const formData = new FormData(form);
                const payload = {
                    email: formData.get('email'),
                    first_name: formData.get('first_name'),
                    last_name: formData.get('last_name'),
                    phone: formData.get('phone')
                };

                jsonPreview.textContent = JSON.stringify(payload, null, 2);
                resultPreview.classList.remove('hidden');
            }

            // Copy JSON
            copyJsonButton.addEventListener('click', () => {
                navigator.clipboard.writeText(jsonPreview.textContent).then(() => {
                    const originalText = copyJsonButton.innerHTML;
                    copyJsonButton.innerHTML = `
                    <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Copied!`;
                    setTimeout(() => copyJsonButton.innerHTML = originalText, 2000);
                });
            });

            // Progress bar and live preview
            form.addEventListener('input', () => {
                const filledFields = ['email', 'first_name', 'last_name', 'phone'].filter(id => document
                    .getElementById(id).value).length;
                progressBar.style.width = `${(filledFields / 4) * 100}%`;
                updatePreview();
            });
        });
    </script>

@endsection
    
@endauth