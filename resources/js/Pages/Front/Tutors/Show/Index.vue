<template>
    <div class="min-h-screen bg-gray-50 w-full pt-[80px]">
        <!-- Breadcrumb -->
        <div class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-4">
                        <li>
                            <a href="/" class="text-gray-400 hover:text-gray-500">Home</a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <a href="/tutors" class="ml-4 text-gray-400 hover:text-gray-500">Find tutor</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-4 text-gray-500 font-medium">{{ tutor?.name || 'Tutor Name' }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left Sidebar -->
                <div class="lg:w-1/3">
                    <!-- Tutor Profile Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                        <div class="text-center">
                            <!-- Profile Image -->
                            <div class="w-32 h-32 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-4xl font-bold text-white">{{ getInitials(tutor?.name || 'Tutor Name') }}</span>
                            </div>
                            
                            <!-- Name and Verification -->
                            <div class="flex items-center justify-center mb-2">
                                <h1 class="text-2xl font-bold text-gray-900">{{ tutor?.name || 'Tutor Name' }}</h1>
                                <svg class="w-6 h-6 text-green-500 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            
                            <p class="text-gray-600 mb-4">Verified</p>
                            <p class="text-lg text-gray-700 mb-6">Empowering Students with Customized Learning Support</p>
                            
                            <!-- Pricing -->
                            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                                <div class="text-center">
                                    <span class="text-3xl font-bold text-green-600">${{ tutor?.hourly_rate || '40.00' }}</span>
                                    <span class="text-gray-600">/session</span>
                                    <p class="text-sm text-gray-500 mt-1">Starting from</p>
                                </div>
                            </div>
                            
                            <!-- Stats -->
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="text-center">
                                    <div class="flex items-center justify-center mb-1">
                                        <div class="flex text-yellow-400">
                                            <span>★★★★★</span>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-600">5.0/5.0 (1 review)</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-gray-900">{{ tutor?.booked_sessions || '74' }}</p>
                                    <p class="text-sm text-gray-600">Booked sessions</p>
                                </div>
                            </div>
                            
                            <!-- Response Time -->
                            <div class="text-center mb-6">
                                <p class="text-sm text-gray-600">Response time</p>
                                <p class="text-lg font-semibold text-gray-900">{{ tutor?.response_time || '2 Hours' }}</p>
                            </div>
                            
                            <!-- Social Profiles -->
                            <div class="mb-6">
                                <h3 class="text-sm font-medium text-gray-700 mb-3">Social Profiles</h3>
                                <div class="flex justify-center space-x-3">
                                    <a href="#" class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="w-8 h-8 bg-blue-800 rounded-full flex items-center justify-center text-white hover:bg-blue-900">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="w-8 h-8 bg-pink-600 rounded-full flex items-center justify-center text-white hover:bg-pink-700">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="space-y-3">
                                <button class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                    Book a session
                                </button>
                                <button class="w-full border border-gray-300 text-gray-700 py-3 px-6 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                                    Send message
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <!-- Navigation Tabs -->
                    <div class="bg-white rounded-lg shadow-md mb-6">
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex space-x-8 px-6">
                                <button class="border-b-2 border-blue-500 py-4 px-1 text-sm font-medium text-blue-600">
                                    Introduction
                                </button>
                                <button class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                                    Availability
                                </button>
                                <button class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                                    Resume Highlights
                                </button>
                                <button class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                                    Reviews (1)
                                </button>
                            </nav>
                        </div>
                        
                        <!-- Tab Content -->
                        <div class="p-6">
                            <!-- About Me Section -->
                            <div class="mb-8">
                                <h2 class="text-2xl font-bold text-gray-900 mb-4">About me</h2>
                                <div class="prose max-w-none text-gray-600">
                                    <p class="mb-4">
                                        Hi! I am {{ tutor?.name || 'Cynthia Hunter' }}, a dedicated and experienced tutor with a passion for helping students excel in their academic pursuits. With expertise across a variety of subjects, including mathematics, science, and language arts, I offer a personalized approach to tutoring that addresses each student's unique learning needs.
                                    </p>
                                    <p class="mb-4">
                                        My teaching philosophy is centered on fostering a supportive and engaging learning environment where students feel encouraged to explore, ask questions, and develop a strong understanding of the material.
                                    </p>
                                    <p class="mb-4">
                                        Over the years, I have had the privilege of working with students from diverse backgrounds and educational levels, from elementary school through college. My approach involves using interactive and practical teaching methods that make complex concepts more accessible and relatable.
                                    </p>
                                    <p class="mb-4">
                                        I am committed to not only improving academic performance but also building confidence and instilling a genuine love for learning. By tailoring my sessions to align with each student's individual goals and learning style, I aim to make every lesson both effective and enjoyable.
                                    </p>
                                    <p>
                                        In addition to subject-specific tutoring, I emphasize the development of key academic skills, such as effective study habits, time management, and test-taking strategies. These skills are essential for long-term success and personal growth.
                                    </p>
                                </div>
                            </div>

                            <!-- Subjects I Can Teach -->
                            <div class="mb-8">
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">I can teach</h3>
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Software Design</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">UI/UX</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">English</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Physical Education</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Social Studies</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">General Knowledge</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Science</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Maths</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Computer</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Physics</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Chemistry</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Biology</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">History</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Geography</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Art</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Music</span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">+7 more</span>
                                </div>
                            </div>

                            <!-- Languages I Can Speak -->
                            <div class="mb-8">
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">I can speak</h3>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm mr-3">French</span>
                                        <span class="text-sm text-gray-600">Native</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm mr-3">Armenian</span>
                                        <span class="text-sm text-gray-600">Fluent</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm mr-3">Asturian</span>
                                        <span class="text-sm text-gray-600">Intermediate</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Achievements -->
                            <div class="mb-8">
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">Achievements</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <svg class="w-8 h-8 text-yellow-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        <div>
                                            <h4 class="font-semibold text-gray-900">Profile Complete</h4>
                                            <p class="text-sm text-gray-600">All profile sections completed</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-8 h-8 text-red-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <div>
                                            <h4 class="font-semibold text-gray-900">Student Favorite</h4>
                                            <p class="text-sm text-gray-600">Highly rated by students</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                    <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                    <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                                <input type="email" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                                <textarea rows="4" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Tell the tutor about your learning goals..."></textarea>
                            </div>
                            <button type="submit" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                Send Request
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking Instructions -->
        <div class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Book your session now</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-blue-600">1</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Choose an available time</h3>
                        <p class="text-gray-600 text-sm">slot for your tutor</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-green-600">2</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Choose one-on-one</h3>
                        <p class="text-gray-600 text-sm">or Group Sessions</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-yellow-600">3</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Choose a time slot</h3>
                        <p class="text-gray-600 text-sm">and click "Book session"</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-purple-600">4</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Proceed order</h3>
                        <p class="text-gray-600 text-sm">confirm, and start learning!</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tips Section -->
        <div class="bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Tips for a Smooth Booking Experience</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="font-semibold text-gray-900 mb-2">1. Read our Terms and Conditions</h3>
                        <p class="text-gray-600 text-sm">Before booking, familiarize yourself with our terms.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="font-semibold text-gray-900 mb-2">2. Visit How booking works</h3>
                        <p class="text-gray-600 text-sm">Need help? Check our booking guide.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="font-semibold text-gray-900 mb-2">3. View our Privacy Guidelines</h3>
                        <p class="text-gray-600 text-sm">For information about data protection.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="font-semibold text-gray-900 mb-2">4. Check our FAQ section</h3>
                        <p class="text-gray-600 text-sm">Have questions? Find answers here.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="font-semibold text-gray-900 mb-2">5. Review our Pricing guidelines</h3>
                        <p class="text-gray-600 text-sm">For session costs and payment info.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="font-semibold text-gray-900 mb-2">6. Read our Cancellation policies</h3>
                        <p class="text-gray-600 text-sm">For cancellation procedures and refunds.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const tutor = computed(() => usePage().props.tutor);

// Helper function to get initials from name
const getInitials = (name) => {
    if (!name) return 'TN';
    return name.split(' ').map(n => n[0]).join('').toUpperCase().slice(0, 2);
};
</script>

