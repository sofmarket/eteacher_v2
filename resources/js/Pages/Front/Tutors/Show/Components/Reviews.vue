<template>
    <div>
        <!-- Review Card -->
        <div class="bg-white border border-gray-200 rounded-lg p-6 mb-6">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-semibold text-lg">JD</span>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">John Doe</h4>
                        <div class="flex items-center">
                            <div class="flex text-yellow-400 mr-2">
                                <span>★★★★★</span>
                            </div>
                            <span class="text-sm text-gray-600">5.0</span>
                        </div>
                    </div>
                </div>
                <span class="text-sm text-gray-500">2 days ago</span>
            </div>
            
            <p class="text-gray-700 leading-relaxed">
                "Cynthia is an exceptional tutor! Her teaching methods are innovative and she has a great way of making complex topics easy to understand. I've seen significant improvement in my grades since starting sessions with her. Highly recommended!"
            </p>
            
            <div class="mt-4 flex items-center text-sm text-gray-600">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
                <span>Helpful (3)</span>
            </div>
        </div>
        
        <!-- No more reviews message -->
        <div class="text-center py-8">
            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">No more reviews</h3>
            <p class="text-gray-600">This tutor has 1 review. Be the first to leave a review after your session!</p>
        </div>
    </div>
</template>