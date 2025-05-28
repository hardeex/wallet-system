{{-- preloader.blade.php --}}
<div id="preloader"
class="fixed inset-0 bg-white dark:bg-gray-900 flex items-center justify-center z-[9999] transition-all duration-500">
<div class="relative">
    {{-- Enhanced Logo Animation --}}
    <div class="flex items-baseline justify-center mb-8 scale-110 transition-transform duration-300">
        <span class="text-3xl font-bold text-red-600 dark:text-red-400 animate-pulse">C</span>
        <span
            class="text-5xl font-extrabold text-gradient bg-clip-text text-transparent bg-gradient-to-r from-blue-700 to-indigo-900 dark:from-blue-400 dark:to-indigo-600 tracking-tighter">
            Nest
            <span class="text-xl font-medium text-gray-600 dark:text-gray-300">Hub</span>
        </span>
    </div>

    {{-- Enhanced Loading Animation --}}
    <div class="flex justify-center items-center space-x-3">
        <div class="w-4 h-4 bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400 rounded-full animate-bounce shadow-lg"
            style="animation-delay: -0.32s"></div>
        <div class="w-4 h-4 bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400 rounded-full animate-bounce shadow-lg"
            style="animation-delay: -0.16s"></div>
        <div
            class="w-4 h-4 bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400 rounded-full animate-bounce shadow-lg">
        </div>
    </div>

    {{-- Loading Text --}}
    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400 text-center animate-pulse">
        Loading amazing things...
    </p>
</div>
</div>

<script>
    window.addEventListener('load', () => {
        const preloader = document.getElementById('preloader');
        preloader.style.opacity = '0';
        setTimeout(() => {
            preloader.style.display = 'none';
        }, 500);
    });
</script>
<style>
    .text-gradient {
        -webkit-background-clip: text;
        background-clip: text;
        display: inline-block;
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const preloader = document.getElementById('preloader');

        // Fade out preloader when content is loaded
        window.addEventListener('load', function() {
            preloader.classList.add('opacity-0');
            setTimeout(() => {
                preloader.classList.add('hidden');
            }, 500);
        });
    });
</script>