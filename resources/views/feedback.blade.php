

@if (session('success'))
    <div class="mt-4 bg-green-100 border-l-4 border-green-600 text-green-800 p-4 rounded-lg flex items-center shadow-md">
        <span class="text-3xl font-bold text-red-600 dark:text-red-400 animate-pulse">C</span>
        <span
            class="text-5xl font-extrabold text-gradient bg-clip-text text-transparent bg-gradient-to-r from-blue-700 to-indigo-900 dark:from-blue-400 dark:to-indigo-600 tracking-tighter">
            Nest
            <span class="text-xl font-medium text-gray-600 dark:text-gray-300">Hub</span>
        </span>
        <!-- Success Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="mt-4 bg-red-100 border-l-4 border-red-600 text-red-800 p-4 rounded-lg flex items-center shadow-md">
        <span class="text-3xl font-bold text-red-600 dark:text-red-400 animate-pulse">C</span>
        <span
            class="text-5xl font-extrabold text-gradient bg-clip-text text-transparent bg-gradient-to-r from-blue-700 to-indigo-900 dark:from-blue-400 dark:to-indigo-600 tracking-tighter">
            Nest
            <span class="text-xl font-medium text-gray-600 dark:text-gray-300">Hub</span>
        </span>
        <!-- Error Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-3" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 10-18 0 9 9 0 0018 0z" />
        </svg>
        <span>{{ session('error') }}</span>
    </div>
@endif
