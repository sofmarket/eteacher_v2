<template>
    <div class="min-h-screen bg-gray-50 w-full pt-[80px]">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">
                        Discover a skilled online tutor for your studies
                    </h1>
                    <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
                        Master your studies with personalized online tutoring from expert educators. Our skilled tutors are here to help you build strong foundations and achieve your academic goals.
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Filters -->
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg font-semibold text-gray-900">Filters</h2>
                            <button class="text-sm text-blue-600 hover:text-blue-800">Clear all filters</button>
                        </div>

                        <!-- Session Type Filter -->
                        <div class="mb-6">
                            <h3 class="text-sm font-medium text-gray-700 mb-3">Session Type</h3>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-600">All Sessions</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-600">Private Sessions</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-600">Group Sessions</span>
                                </label>
                            </div>
                        </div>

                        <!-- Subject Group Filter -->
                        <div class="mb-6">
                            <h3 class="text-sm font-medium text-gray-700 mb-3">Subject Group</h3>
                            <select class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Primary school (Grade 1 to 5)</option>
                                <option>Middle School (Grades 6-8)</option>
                                <option>High School (Grades 9-10)</option>
                                <option>Intermediate (Grades 11-12)</option>
                                <option>Undergraduate (Bachelor's Degree)</option>
                                <option>Graduate (Masters degree)</option>
                                <option>Post graduate (Doctoral Degree)</option>
                            </select>
                        </div>

                        <!-- Subject Filter -->
                        <div class="mb-6">
                            <h3 class="text-sm font-medium text-gray-700 mb-3">Choose Subject</h3>
                            <select class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Web Development</option>
                                <option>Web Designing</option>
                                <option>Software Development</option>
                                <option>Software Design</option>
                                <option>UI/UX</option>
                                <option>English</option>
                                <option>Maths</option>
                                <option>Social Studies</option>
                                <option>General Knowledge</option>
                                <option>Science</option>
                                <option>Physical Education</option>
                                <option>Physics</option>
                                <option>Computer</option>
                                <option>Chemistry</option>
                            </select>
                        </div>

                        <!-- Fee Range -->
                        <div class="mb-6">
                            <h3 class="text-sm font-medium text-gray-700 mb-3">Fee per session</h3>
                            <div class="space-y-2">
                                <input type="range" min="0" max="100" class="w-full">
                                <div class="flex justify-between text-xs text-gray-500">
                                    <span>$0</span>
                                    <span>$100+</span>
                                </div>
                            </div>
                        </div>

                        <!-- Location Filter -->
                        <div class="mb-6">
                            <h3 class="text-sm font-medium text-gray-700 mb-3">Tutor location</h3>
                            <select class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>United States</option>
                                <option>United Kingdom</option>
                                <option>Canada</option>
                                <option>Australia</option>
                                <option>Germany</option>
                                <option>France</option>
                                <option>India</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="lg:w-3/4">
                    <!-- Sort and Search Bar -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <span class="text-sm text-gray-600">Sort by:</span>
                                <select class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option>Newest first</option>
                                    <option>Oldest First</option>
                                    <option>Alphabetical A-Z</option>
                                    <option>Alphabetical Z-A</option>
                                </select>
                            </div>
                            <div class="flex items-center gap-4">
                                <input type="text" placeholder="Search for a tutor" class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">Search</button>
                            </div>
                        </div>
                    </div>

                    <!-- Tutors Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        <!-- Tutor Card 1 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                                        <span class="text-2xl font-bold text-blue-600">JS</span>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900">John Smith</h3>
                                        <p class="text-sm text-gray-600">Mathematics Tutor</p>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                <span>★★★★★</span>
                                            </div>
                                            <span class="ml-2 text-sm text-gray-600">(4.9)</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm mb-4">
                                    Experienced math tutor with 5+ years helping students excel in algebra, calculus, and geometry.
                                </p>
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-lg font-bold text-green-600">$25/hour</span>
                                    <span class="text-sm text-gray-500">Online</span>
                                </div>
                                <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                                    Send Message
                                </button>
                            </div>
                        </div>

                        <!-- Tutor Card 2 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center">
                                        <span class="text-2xl font-bold text-purple-600">EJ</span>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Emily Johnson</h3>
                                        <p class="text-sm text-gray-600">English Literature</p>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                <span>★★★★★</span>
                                            </div>
                                            <span class="ml-2 text-sm text-gray-600">(4.8)</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm mb-4">
                                    PhD in English Literature with expertise in creative writing and essay composition.
                                </p>
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-lg font-bold text-green-600">$30/hour</span>
                                    <span class="text-sm text-gray-500">Online</span>
                                </div>
                                <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                                    Send Message
                                </button>
                            </div>
                        </div>

                        <!-- Tutor Card 3 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                                        <span class="text-2xl font-bold text-green-600">MR</span>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Michael Rodriguez</h3>
                                        <p class="text-sm text-gray-600">Physics & Chemistry</p>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                <span>★★★★☆</span>
                                            </div>
                                            <span class="ml-2 text-sm text-gray-600">(4.7)</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm mb-4">
                                    Science teacher with 8 years experience in high school physics and chemistry.
                                </p>
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-lg font-bold text-green-600">$22/hour</span>
                                    <span class="text-sm text-gray-500">Online</span>
                                </div>
                                <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                                    Send Message
                                </button>
                            </div>
                        </div>

                        <!-- Tutor Card 4 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center">
                                        <span class="text-2xl font-bold text-orange-600">SC</span>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Sarah Chen</h3>
                                        <p class="text-sm text-gray-600">Web Development</p>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                <span>★★★★★</span>
                                            </div>
                                            <span class="ml-2 text-sm text-gray-600">(4.9)</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm mb-4">
                                    Full-stack developer teaching React, Node.js, and modern web technologies.
                                </p>
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-lg font-bold text-green-600">$35/hour</span>
                                    <span class="text-sm text-gray-500">Online</span>
                                </div>
                                <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                                    Send Message
                                </button>
                            </div>
                        </div>

                        <!-- Tutor Card 5 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                                        <span class="text-2xl font-bold text-red-600">DW</span>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900">David Wilson</h3>
                                        <p class="text-sm text-gray-600">History & Social Studies</p>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                <span>★★★★☆</span>
                                            </div>
                                            <span class="ml-2 text-sm text-gray-600">(4.6)</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm mb-4">
                                    History professor specializing in world history and social studies for all grade levels.
                                </p>
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-lg font-bold text-green-600">$28/hour</span>
                                    <span class="text-sm text-gray-500">Online</span>
                                </div>
                                <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                                    Send Message
                                </button>
                            </div>
                        </div>

                        <!-- Tutor Card 6 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <span class="text-2xl font-bold text-indigo-600">LT</span>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Lisa Thompson</h3>
                                        <p class="text-sm text-gray-600">Spanish Language</p>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                <span>★★★★★</span>
                                            </div>
                                            <span class="ml-2 text-sm text-gray-600">(4.8)</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm mb-4">
                                    Native Spanish speaker with certification in teaching Spanish as a second language.
                                </p>
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-lg font-bold text-green-600">$20/hour</span>
                                    <span class="text-sm text-gray-500">Online</span>
                                </div>
                                <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Load More Button -->
                    <div class="text-center mt-8">
                        <button class="bg-white border border-gray-300 text-gray-700 px-8 py-3 rounded-md hover:bg-gray-50 transition-colors">
                            Load More Tutors
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tips Section -->
        <div class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Tips to find the best Tutor</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                        Choosing the right tutor online requires careful consideration. Here are tips to help you make an informed decision.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Filter your requirements</h3>
                        <p class="text-gray-600 text-sm">Use our advanced filters to find tutors that match your specific needs and preferences.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Check qualifications</h3>
                        <p class="text-gray-600 text-sm">Review each tutor's education, certifications, and teaching experience.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Read reviews</h3>
                        <p class="text-gray-600 text-sm">Check ratings and reviews from other students to gauge tutor quality.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Evaluate communication</h3>
                        <p class="text-gray-600 text-sm">Assess how well the tutor communicates and explains concepts clearly.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Check availability</h3>
                        <p class="text-gray-600 text-sm">Ensure the tutor's schedule aligns with your learning needs and timezone.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
// Component logic can be added here
</script>
