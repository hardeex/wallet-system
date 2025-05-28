<header class="bg-white dark:bg-gray-800 shadow-md fixed top-0 left-0 right-0 z-50">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center">
        <a href="{{route('welcome')}}" class="inline-block">
            <div class="inline-flex items-baseline">
                <span class="text-md font-bold text-red-600 dark:text-red-400">C</span>
                <span
                    class="text-3xl font-extrabold text-gradient bg-clip-text text-transparent bg-gradient-to-r from-blue-700 to-indigo-900 dark:from-blue-400 dark:to-indigo-600 tracking-tighter">
                    N
                    <span class="text-sm font-medium text-gray-600 dark:text-green-300">Hub</span>
                </span>
            </div>
        </a>

        <style>
            .text-gradient {
                -webkit-background-clip: text;
                background-clip: text;
                display: inline-block;
            }

            @media (max-width: 640px) {
                .search-input {
                    width: 180px;
                    /* Adjust for mobile */
                }

                .mobile-menu-button {
                    margin-left: auto;
                    /* Ensure hamburger is aligned to the right */
                }
            }
        </style>
{{-- 
        <div class="flex items-center space-x-4">
            <!-- Search Input -->
          

            <div class="relative">
                <form method="GET" action="#">
                    <input type="search" name="query" placeholder="Search..."
                        class="pl-8 pr-4 py-2 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 search-input"
                        value="{{ request('query') }}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 absolute left-2 top-3 text-gray-500 dark:text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </form>
            </div>

        </div> --}}

        <nav class=" shadow-sm relative" x-data="{
            mobileMenuOpen: false,
            accountDropdownOpen: false,
            closeAllDropdowns() {
                this.accountDropdownOpen = false;
            }
        }">
            <!-- Desktop Navigation -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden mobile-menu-button">
                        <button @click="mobileMenuOpen = !mobileMenuOpen"
                            class="text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            aria-expanded="false" :aria-expanded="mobileMenuOpen" aria-controls="mobile-menu">
                            <span class="sr-only">Toggle menu</span>
                            <svg class="h-6 w-6" x-show="!mobileMenuOpen" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="h-6 w-6" x-show="mobileMenuOpen" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Desktop Menu Items -->
                    <div class="hidden md:flex items-center space-x-4">
                       

                            <a href="{{route('create-wallet')}}"
                            class="text-blue-200 hover:text-indigo-600 transition-colors duration-200">Create Wallet</a>

                         @auth
    <!-- Dashboard Link -->
    <a href="{{ route('dashboard') }}" 
       class="text-blue-500 hover:text-indigo-600 transition-colors duration-200">
        Dashboard
    </a>

    <!-- Logout Form (Styled as Link) -->
    <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button type="submit"
            class="text-blue-500 hover:text-indigo-600 transition-colors duration-200 bg-transparent border-none p-0 m-0 cursor-pointer">
            Log Out
        </button>
    </form>
@endauth


                            @guest
                                 <a href="#"
                            class="text-blue-500 hover:text-indigo-600 transition-colors duration-200">Register</a>

                             <a href="#"
                            class="text-blue-500 hover:text-indigo-200 transition-colors duration-200">Login</a>
                            

                            @endguest
                           
                       
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-1"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-1"
                class="absolute right-0 mt-2 w-screen bg-white shadow-lg z-50" id="mobile-menu">
                <div class="px-4 pt-2 pb-3 space-y-1">
                    
                        <a href="#"
                            class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 rounded-md">Register</a>
                        <a href="#"
                            class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 rounded-md">Login</a>
                       
                    </div>
                    
                </div>
            </div>
        </nav>
    </div>
</header>
