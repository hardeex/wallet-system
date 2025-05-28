  <!-- Enhanced Footer with Newsletter, Stats, and Better Organization -->
  <footer class="bg-gradient-to-br from-gray-800 to-gray-900 dark:from-gray-700 dark:to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4">
      

        <div x-data="{
            showModal: false,
            modalType: '',
            modalMessage: '',
            loading: false,
            async submitForm(e) {
                e.preventDefault();
                this.loading = true;
        
                try {
                    const form = e.target;
                    const formData = new FormData(form);
        
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            email: formData.get('email')
                        })
                    });
        
                    const data = await response.json();
        
                    if (response.status === 409) {
                        this.modalType = 'info';
                    } else if (response.ok) {
                        this.modalType = 'success';
                        form.reset();
                    } else {
                        this.modalType = 'error';
                    }
        
                    this.modalMessage = data.message;
                    this.showModal = true;
        
                    if (this.modalType === 'success') {
                        setTimeout(() => {
                            this.showModal = false;
                        }, 3000);
                    }
                } catch (error) {
                    this.modalType = 'error';
                    this.modalMessage = 'An error occurred. Please try again later.';
                    this.showModal = true;
                } finally {
                    this.loading = false;
                }
            }
        }">
            <div class="mb-12 p-6 bg-white/5 rounded-xl backdrop-blur-sm border border-white/10">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h3 class="text-2xl font-bold mb-2">Join Our Community</h3>
                        <p class="text-gray-300">Get weekly insights, tips, and exclusive content straight to your
                            inbox.</p>
                    </div>
                    <form @submit="submitForm" action="#"
                        class="flex flex-col md:flex-row gap-4 md:gap-2 w-full">
                        @csrf
                        <input type="email" name="email" placeholder="Enter your email"
                            :disabled="loading"
                            class="flex-1 px-4 py-2 bg-white/10 rounded-lg border border-white/20 focus:border-blue-400 focus:ring-2 focus:ring-blue-400 focus:ring-opacity-20 transition-all outline-none text-white placeholder-gray-400">
                        <button type="submit" :disabled="loading"
                            class="px-6 py-2 bg-blue-500 hover:bg-blue-600 rounded-lg transition-colors font-medium mt-4 md:mt-0 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center">
                            <span x-show="!loading">Subscribe</span>
                            <svg x-show="loading" class="animate-spin h-5 w-5" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Modal -->
            <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
                class="fixed inset-0 z-50 flex items-center justify-center" @click.self="showModal = false">

                <div class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>

                <div
                    class="relative bg-gray-900 rounded-xl p-6 max-w-md w-full mx-4 shadow-2xl border border-white/10">
                    <div class="text-center">
                        <div class="mb-4">
                            <!-- Success Icon -->
                            <template x-if="modalType === 'success'">
                                <svg class="mx-auto h-12 w-12 text-green-500" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </template>
                            <!-- Info Icon -->
                            <template x-if="modalType === 'info'">
                                <svg class="mx-auto h-12 w-12 text-blue-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </template>
                            <!-- Error Icon -->
                            <template x-if="modalType === 'error'">
                                <svg class="mx-auto h-12 w-12 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </template>
                        </div>

                        <h3 class="text-lg font-medium mb-2 text-white"
                            :class="{
                                'text-green-400': modalType === 'success',
                                'text-blue-400': modalType === 'info',
                                'text-red-400': modalType === 'error'
                            }"
                            x-text="modalMessage"></h3>

                        <div class="mt-4">
                            <button @click="showModal = false"
                                class="px-4 py-2 bg-white/10 text-white rounded-lg hover:bg-white/20 transition-colors duration-200">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <!-- About Section -->
            <div class="space-y-4">
                <div class="flex items-center gap-3 mb-6">
                    <!-- Logo placeholder - replace with your logo -->
                    <div class="w-10 h-10 rounded-lg bg-blue-500 flex items-center justify-center">
                        <span class="text-xl font-bold">CN</span>
                    </div>
                    <span class="text-xl font-bold">ConnectNest</span>
                </div>
                <p class="text-gray-400 dark:text-gray-300 leading-relaxed">
                    A vibrant community where knowledge meets discussion. Join thousands of passionate members
                    sharing insights and stories.
                </p>
                <!-- Community Stats -->
                <div class="flex gap-6 pt-4">
                    <div>
                        <span class="block text-2xl font-bold text-blue-400">50K+</span>
                        <span class="text-sm text-gray-400">Members</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-blue-400">10K+</span>
                        <span class="text-sm text-gray-400">Topics</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-blue-400">100K+</span>
                        <span class="text-sm text-gray-400">Posts</span>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold mb-6">Quick Links</h3>
                <ul class="grid grid-cols-2 gap-3">
                    <li><a href="#"
                            class="text-gray-400 hover:text-white transition-colors flex items-center gap-2">
                            <span class="w-1 h-1 bg-blue-400 rounded-full"></span>Home
                        </a></li>
                    <li><a href="#"
                            class="text-gray-400 hover:text-white transition-colors flex items-center gap-2">
                            <span class="w-1 h-1 bg-blue-400 rounded-full"></span>Blog
                        </a></li>
                    <li><a href="#"
                            class="text-gray-400 hover:text-white transition-colors flex items-center gap-2">
                            <span class="w-1 h-1 bg-blue-400 rounded-full"></span>Forums
                        </a></li>
                    <li><a href="#"
                            class="text-gray-400 hover:text-white transition-colors flex items-center gap-2">
                            <span class="w-1 h-1 bg-blue-400 rounded-full"></span>News
                        </a></li>
                    <li><a href="#"
                            class="text-gray-400 hover:text-white transition-colors flex items-center gap-2">
                            <span class="w-1 h-1 bg-blue-400 rounded-full"></span>About
                        </a></li>
                    <li><a href="#"
                            class="text-gray-400 hover:text-white transition-colors flex items-center gap-2">
                            <span class="w-1 h-1 bg-blue-400 rounded-full"></span>Contact
                        </a></li>
                </ul>
            </div>

            <!-- Latest Topics -->
            <div>
                <h3 class="text-xl font-bold mb-6">Trending Topics</h3>
                <div class="space-y-4">
                    @foreach (range(1, 3) as $index)
                        <a href="#" class="block group">
                            <div class="text-sm text-blue-400">#Laravel</div>
                            <div class="text-gray-300 group-hover:text-white transition-colors">Best practices for
                                API authentication</div>
                            <div class="text-gray-500 text-sm">23 replies · 2h ago</div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Social & Download -->
            <div>
                <h3 class="text-xl font-bold mb-6">Connect With Us</h3>
                <!-- Social Links -->
                <div class="flex flex-wrap gap-4 mb-8">
                    <a href="#"
                        class="w-10 h-10 rounded-lg bg-white/10 hover:bg-white/20 transition-colors flex items-center justify-center group">
                        <i class="fab fa-twitter text-xl group-hover:text-blue-400 transition-colors"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-lg bg-white/10 hover:bg-white/20 transition-colors flex items-center justify-center group">
                        <i class="fab fa-facebook text-xl group-hover:text-blue-400 transition-colors"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-lg bg-white/10 hover:bg-white/20 transition-colors flex items-center justify-center group">
                        <i class="fab fa-instagram text-xl group-hover:text-blue-400 transition-colors"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-lg bg-white/10 hover:bg-white/20 transition-colors flex items-center justify-center group">
                        <i class="fab fa-github text-xl group-hover:text-blue-400 transition-colors"></i>
                    </a>
                </div>
                <!-- Mobile App -->
                <div class="space-y-3">
                    <div class="text-sm font-medium text-gray-400">Get our mobile app</div>
                    <div class="flex gap-2">
                        <a href="#"
                            class="bg-white/10 hover:bg-white/20 transition-colors rounded-lg px-4 py-2 flex items-center gap-2">
                            <i class="fab fa-apple text-xl"></i>
                            <span class="text-sm">iOS</span>
                        </a>
                        <a href="#"
                            class="bg-white/10 hover:bg-white/20 transition-colors rounded-lg px-4 py-2 flex items-center gap-2">
                            <i class="fab fa-android text-xl"></i>
                            <span class="text-sm">Android</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-16 pt-8 border-t border-white/10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} ConnectNest Hub. All rights reserved.
                </div>
                <div class="flex gap-6 text-sm text-gray-400">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                    <a href="#" class="hover:text-white transition-colors">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>