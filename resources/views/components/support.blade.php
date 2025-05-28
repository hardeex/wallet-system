<div x-data="supportBubble()" class="fixed left-4 bottom-12 z-50 mb-8">
    {{-- Support Bubble Button with Pulse Effect --}}
    <button @click="toggleForm()"
        class="group bg-gradient-to-r from-purple-500 to-indigo-600 text-white p-4 rounded-full shadow-lg transition-all duration-300 ease-in-out transform hover:scale-110 hover:rotate-12 relative">

        {{-- Animated Pulse Ring --}}
        <span class="absolute inset-0 rounded-full animate-ping bg-purple-400 opacity-75"></span>

        {{-- Hover Text --}}
        <span x-show="!isFormOpen" x-transition:enter="transition-opacity duration-300 ease-out"
            x-transition:leave="transition-opacity duration-300 ease-in"
            class="absolute bottom-12 left-0 whitespace-nowrap bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-4 py-2 rounded-lg shadow-lg text-sm font-medium">
            👋
            {{-- Let's chat! We're here to help --}}
            {{-- Arrow Pointer --}}
            <span class="absolute -bottom-2 left-6 w-4 h-4 bg-purple-500 transform rotate-45"></span>
        </span>

        {{-- Icon with Animation --}}
        <svg xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 transform group-hover:rotate-180 transition-transform duration-300" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
    </button>

    {{-- Contact Form with Enhanced Design --}}
    <div x-show="isFormOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90 -translate-y-2"
        x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 transform scale-90 -translate-y-2"
        class="absolute left-0 bottom-20 w-96 bg-white shadow-2xl rounded-lg border-t-4 border-purple-500 overflow-hidden">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-purple-500 to-indigo-600 p-4 text-white">
            <h2 class="text-xl font-bold">How can we help? 🌟</h2>
            <p class="text-sm opacity-90">We usually respond within an hour</p>
        </div>

        <form method="POST" action="#" class="p-6 space-y-4">
            @csrf

            <div class="space-y-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                <input type="text" name="name" id="name" required
                    class="w-full px-4 py-2 rounded-md border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50 transition-colors duration-200">
            </div>

            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-4 py-2 rounded-md border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50 transition-colors duration-200">
            </div>

            <div class="space-y-2">
                <label for="category" class="block text-sm font-medium text-gray-700">What's this about?</label>
                <select name="category" id="category" required
                    class="w-full px-4 py-2 rounded-md border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50 transition-colors duration-200">
                    <option value="">Choose a topic...</option>
                    <option value="general">👋 General Question</option>
                    <option value="technical">🔧 Technical Support</option>
                    <option value="sales">💼 Sales Inquiry</option>
                    <option value="billing">💳 Billing Support</option>
                    <option value="other">✨ Something Else</option>
                </select>
            </div>

            <div class="space-y-2">
                <label for="message" class="block text-sm font-medium text-gray-700">Your Message</label>
                <textarea name="message" id="message" rows="4" required
                    class="w-full px-4 py-2 rounded-md border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50 transition-colors duration-200"
                    placeholder="Tell us how we can help..."></textarea>
            </div>

            <button type="submit"
                class="w-full bg-gradient-to-r from-purple-500 to-indigo-600 text-white py-3 px-4 rounded-md hover:from-purple-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transform transition-all duration-200 hover:scale-[1.02]">
                Send Message ✨
            </button>
        </form>
    </div>
</div>

<script>
    function supportBubble() {
        return {
            isFormOpen: false,
            toggleForm() {
                this.isFormOpen = !this.isFormOpen;
            }
        }
    }
</script>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>