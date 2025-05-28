<div x-data="{
    mobileMenuOpen: false,
    activeTab: 'home',
    tabs: [
        { id: 'home', icon: 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', label: 'Home', route: 'home' },
        { id: 'feed', icon: 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z', label: 'Feed', route: 'all-posts' },
        { id: 'create', icon: 'M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z', label: 'Create', route: 'posts' },
        { id: 'bookmarks', icon: 'M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z', label: 'News', route: 'news' },
        { id: 'Developers', icon: 'M8 16l.86-3.39L5.5 10l3.36-2.61L8 4l2.61 3.36L14 5.5l-2.61 3.36L12 12l-3.39-.86L6 14l3.36 2.61zM20 14v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m0-4V4a2 2 0 012-2h12a2 2 0 012 2v6', label: 'Developer', route: 'forum' }
    ],
    navigateTo(route) {
        window.location.href = route === 'home' ? '/' : '/' + route;
    }
}" class="bg-gray-50 dark:bg-gray-900 font-sans antialiased relative">
    {{-- Mobile Navigation --}}
    <nav
        class="fixed bottom-0 left-0 right-0 z-30 bg-white dark:bg-gray-800 border-t border-gray-100 dark:border-gray-700 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] md:hidden">
        <div class="grid grid-cols-5 py-3">
            <template x-for="tab in tabs" :key="tab.id">
                <button @click="activeTab = tab.id; navigateTo(tab.route)"
                    :class="{
                        'text-blue-600 dark:text-blue-400': activeTab === tab.id,
                        'text-gray-500 dark:text-gray-400': activeTab !== tab.id
                    }"
                    class="flex flex-col items-center justify-center transition-colors duration-200 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            :d="tab.icon" />
                    </svg>
                    <span x-text="tab.label"
                        class="text-xs mt-1 transition-colors duration-200 ease-in-out"></span>
                </button>
            </template>
        </div>
    </nav>
</div>