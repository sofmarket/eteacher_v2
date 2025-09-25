<template>
    <div class="w-full bg-gray-50 font-sans border-t py-8 lg:py-20 px-5 lg:px-15 lg:px-0">
        <div class="w-full max-w-7xl mx-auto">
            <!-- Section Title -->
            <h2 class="text-3xl font-bold text-black mb-8 text-left">Similar Tutors</h2>

            <!-- Tutors Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                <!-- Tutor Card 1 - Steven Ford -->
                <div v-for="i in 4" :key="i"
                    class="bg-white rounded-xl p-5 hover:shadow-sm hover:-translate-y-0.5 transition-all duration-200">
                    <div class="mb-5">
                        <div class="flex items-center gap-3 mb-2">
                            <img src="@/assets/images/user/user-01.jpg" alt="Steven Ford"
                                class="w-12 h-12 rounded-full object-cover border-2 border-gray-100" />
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-black mb-1">Steven Ford</h3>
                                <div class="flex items-center gap-2">
                                    <div class="w-3 h-3 rounded-full bg-green-400 flex items-center justify-center">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                        </svg>
                                    </div>
                                    <img src="@/assets/images/country/country-01.svg" alt="Pakistan"
                                        class="w-4 h-3 rounded-sm object-cover" />
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 italic">Prepare for beta testing</p>
                    </div>

                    <div class="mb-5">
                        <div class="flex items-center gap-2 mb-2 text-sm text-gray-800">
                            <span class="font-semibold text-black">$ 20.00/session</span>
                        </div>
                        <div class="flex items-center gap-2 mb-2 text-sm text-gray-800">
                            <svg class="w-3.5 h-3.5 text-gray-600 flex-shrink-0" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polygon
                                    points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26 12,2">
                                </polygon>
                            </svg>
                            <span class="font-semibold text-black">4.2 /5.0</span>
                            <span class="text-gray-500 text-xs">(142 reviews)</span>
                        </div>
                        <div class="flex items-center gap-2 mb-2 text-sm text-gray-800">
                            <svg class="w-3.5 h-3.5 text-gray-600 flex-shrink-0" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>2 Active students</span>
                        </div>
                        <div class="flex items-center gap-2 mb-2 text-sm text-gray-800">
                            <svg class="w-3.5 h-3.5 text-gray-600 flex-shrink-0" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                <line x1="3" y1="18" x2="3.01" y2="18"></line>
                            </svg>
                            <span>2205 Sessions</span>
                        </div>
                        <div class="flex items-center gap-2 mb-2 text-sm text-gray-800">
                            <svg class="w-3.5 h-3.5 text-gray-600 flex-shrink-0" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path
                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                </path>
                            </svg>
                            <span>English, Afrikaans, Albanian, Amharic</span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <button class="bg-white border border-gray-300 rounded-md px-4 py-2.5 text-sm text-gray-800 cursor-pointer flex items-center justify-center gap-2 hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 w-full">
                            Book a session
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </button>
                        <div class="flex items-center gap-3">
                            <button class="flex-1 bg-white border border-gray-300 rounded-md px-4 py-2.5 text-sm text-gray-800 cursor-pointer flex items-center justify-center gap-2 hover:bg-gray-50 hover:border-gray-400 transition-all duration-200">
                                Send message
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                            </button>
                            <button class="bg-white border border-gray-300 rounded-md p-2.5 cursor-pointer flex items-center justify-center hover:bg-gray-50 hover:border-gray-400 hover:text-red-500 transition-all duration-200 text-gray-600">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View All Tutors Button -->
            <div class="flex justify-center my-5 lg:my-15">
                <button
                    class="bg-white border border-orange-500 rounded-md px-4 py-2 text-base text-orange-500 cursor-pointer transition-all duration-200 font-medium hover:bg-orange-500 hover:text-white">View
                    All Tutors</button>
            </div>
        </div>
    </div>
</template>

<script setup>
// Component logic can be added here
</script>
