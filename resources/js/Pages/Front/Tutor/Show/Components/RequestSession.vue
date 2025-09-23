<template>
    <div>
        <!-- Request a Session Form -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Request a Session</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <button class="p-4 border-2 border-blue-500 bg-blue-50 rounded-lg text-center">
                    <h3 class="font-semibold text-blue-900">Private Session</h3>
                    <p class="text-sm text-blue-700">One-on-one learning</p>
                </button>
                <button class="p-4 border-2 border-gray-300 rounded-lg text-center hover:border-gray-400">
                    <h3 class="font-semibold text-gray-900">Group Session</h3>
                    <p class="text-sm text-gray-600">Learn with others</p>
                </button>
            </div>

            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                        <input type="text"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                        <input type="text"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                    <input type="email"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                    <textarea rows="4"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Tell the tutor about your learning goals..."></textarea>
                </div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                    Send Request
                </button>
            </form>
        </div>
    </div>
</template>