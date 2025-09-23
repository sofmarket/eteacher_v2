<template>
    <div class="min-h-screen bg-gray-50 w-full">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-lg font-bold mb-2">- We guarantee quality process -</h1>
                    <h2 class="text-6xl md:text-5xl font-semibold mb-4">Let's join our community today</h2>
                    <p class="text-md text-blue-100 max-w-lg mx-auto mb-8">
                        Join our community to either share your expertise as a tutor or enhance your skills as a student. Connect, learn, and grow with us today.
                    </p>
                    
                    <!-- Role Selection -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                        <button 
                            @click="activeRole = 'student'"
                            :class="[
                                'px-8 py-4 rounded-lg font-semibold transition-colors',
                                activeRole === 'student' 
                                    ? 'bg-white text-blue-600' 
                                    : 'bg-blue-500 text-white hover:bg-blue-400'
                            ]"
                        >
                            As a student
                        </button>
                        <button 
                            @click="activeRole = 'tutor'"
                            :class="[
                                'px-8 py-4 rounded-lg font-semibold transition-colors',
                                activeRole === 'tutor' 
                                    ? 'bg-white text-blue-600' 
                                    : 'bg-blue-500 text-white hover:bg-blue-400'
                            ]"
                        >
                            As a tutor
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Student Process Section -->
        <div v-if="activeRole === 'student'" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">How It Works for Students</h2>
                    <p class="text-lg text-gray-600">Follow these simple steps to start your learning journey</p>
                </div>

                <div class="space-y-20">
                    <!-- Step 1 -->
                    <div class="flex flex-col lg:flex-row items-center gap-12">
                        <div class="lg:w-1/2">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center text-xl font-bold mr-4">1</div>
                                <h3 class="text-2xl font-bold text-gray-900">Fill in your details and set your learning preferences</h3>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                Provide your personal details and set your learning preferences to create a profile tailored to your educational needs. This will help match you with the most suitable tutors and optimize your learning experience.
                            </p>
                            <button class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                Sign Up
                            </button>
                        </div>
                        <div class="lg:w-1/2">
                            <img src="@/assets/images/shape/how-it-works-01.png" alt="Student 1" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                        <div class="lg:w-1/2">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-green-600 text-white rounded-full flex items-center justify-center text-xl font-bold mr-4">2</div>
                                <h3 class="text-2xl font-bold text-gray-900">Use filters to refine your search and view detailed tutor profiles</h3>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                Use filters to narrow down your tutor search based on subject, level, pricing, location, and availability. This allows you to view detailed tutor profiles that best match your learning needs.
                            </p>
                            <button class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                                Find a Tutor
                            </button>
                        </div>
                        <div class="lg:w-1/2">
                            <img src="@/assets/images/shape/how-it-works-02.png" alt="Student 1" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex flex-col lg:flex-row items-center gap-12">
                        <div class="lg:w-1/2">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-purple-600 text-white rounded-full flex items-center justify-center text-xl font-bold mr-4">3</div>
                                <h3 class="text-2xl font-bold text-gray-900">Choose a convenient time and book your lesson instantly</h3>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                Select your preferred time slot and book your lesson instantly. Our streamlined booking process makes it easy to schedule sessions that fit your schedule.
                            </p>
                            
                            <!-- Booking Steps -->
                            <div class="bg-gray-50 rounded-lg p-6 mb-6">
                                <h4 class="text-lg font-semibold text-gray-900 mb-4">Steps to Book a Tutoring Session</h4>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-center">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full mr-3"></span>
                                        Select an Available Time Slot
                                    </li>
                                    <li class="flex items-center">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full mr-3"></span>
                                        Click on the Desired Slot
                                    </li>
                                    <li class="flex items-center">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full mr-3"></span>
                                        Choose Session Type
                                    </li>
                                    <li class="flex items-center">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full mr-3"></span>
                                        Confirm Booking Details
                                    </li>
                                    <li class="flex items-center">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full mr-3"></span>
                                        Proceed to Payment
                                    </li>
                                    <li class="flex items-center">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full mr-3"></span>
                                        Receive Confirmation
                                    </li>
                                </ul>
                            </div>
                            
                            <button class="bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors">
                                Book a Lesson
                            </button>
                        </div>
                        <div class="lg:w-1/2">
                            <img src="@/assets/images/shape/how-it-works-03.png" alt="Student 1" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                        <div class="lg:w-1/2">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-orange-600 text-white rounded-full flex items-center justify-center text-xl font-bold mr-4">4</div>
                                <h3 class="text-2xl font-bold text-gray-900">Log in at the scheduled time and start learning</h3>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                Log in at your scheduled time and join the session to start learning. Connect with your tutor through zoom for an engaging and interactive lesson.
                            </p>
                            <button class="bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-700 transition-colors">
                                Attend the Lesson
                            </button>
                        </div>
                        <div class="lg:w-1/2">
                            <img src="@/assets/images/shape/how-it-works-04.png" alt="Student 1" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="flex flex-col lg:flex-row items-center gap-12">
                        <div class="lg:w-1/2">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-red-600 text-white rounded-full flex items-center justify-center text-xl font-bold mr-4">5</div>
                                <h3 class="text-2xl font-bold text-gray-900">Complete a quick feedback form after your lesson</h3>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                After your lesson, complete a quick feedback form to share your thoughts and rate your experience. Your feedback helps us improve and ensures the best learning environment for everyone.
                            </p>
                            <button class="bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition-colors">
                                Provide Feedback
                            </button>
                        </div>
                        <div class="lg:w-1/2">
                            <img src="@/assets/images/shape/how-it-works-06.png" alt="Student 1" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tutor Process Section -->
        <div v-if="activeRole === 'tutor'" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">How It Works for Tutors</h2>
                    <p class="text-lg text-gray-600">Follow these simple steps to start teaching and earning</p>
                </div>

                <div class="space-y-20">
                    <!-- Step 1 -->
                    <div class="flex flex-col lg:flex-row items-center gap-12">
                        <div class="lg:w-1/2">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center text-xl font-bold mr-4">1</div>
                                <h3 class="text-2xl font-bold text-gray-900">Create your profile and list your qualifications</h3>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                Create your profile to showcase your qualifications, skills, and expertise. Highlight your experience, education, and the subjects you teach to attract potential students and build credibility on the platform.
                            </p>
                            <button class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                Sign Up
                            </button>
                        </div>
                        <div class="lg:w-1/2">
                            <img src="@/assets/images/shape/how-it-works-01.png" alt="Student 1" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                        <div class="lg:w-1/2">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-green-600 text-white rounded-full flex items-center justify-center text-xl font-bold mr-4">2</div>
                                <h3 class="text-2xl font-bold text-gray-900">Manage your schedule to show when you're available to teach</h3>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                Easily manage your availability by updating your schedule with the times you're open to teach. This helps students know when they can book sessions with you and keeps your teaching calendar organized.
                            </p>
                            <button class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                                Set Availability
                            </button>
                        </div>
                        <div class="lg:w-1/2">
                            <img src="@/assets/images/shape/how-it-works-02.png" alt="Student 1" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex flex-col lg:flex-row items-center gap-12">
                        <div class="lg:w-1/2">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-purple-600 text-white rounded-full flex items-center justify-center text-xl font-bold mr-4">3</div>
                                <h3 class="text-2xl font-bold text-gray-900">Review student requests and accept bookings</h3>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                Review incoming student requests and manage your bookings by accepting lessons that fit your availability. Confirm bookings to connect with students and start teaching as per the scheduled sessions.
                            </p>
                            <button class="bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors">
                                Accept Bookings
                            </button>
                        </div>
                        <div class="lg:w-1/2">
                            <img src="@/assets/images/shape/how-it-works-03.png" alt="Student 1" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                        <div class="lg:w-1/2">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-orange-600 text-white rounded-full flex items-center justify-center text-xl font-bold mr-4">4</div>
                                <h3 class="text-2xl font-bold text-gray-900">Conduct your lesson using Zoom</h3>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                Log in at your scheduled time and start teaching your session. Use the platform's integrated video conferencing tool to connect with your students and deliver an engaging learning experience.
                            </p>
                            <button class="bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-700 transition-colors">
                                Teach the Lesson
                            </button>
                        </div>
                        <div class="lg:w-1/2">
                            <img src="@/assets/images/shape/how-it-works-04.png" alt="Student 1" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="flex flex-col lg:flex-row items-center gap-12">
                        <div class="lg:w-1/2">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-red-600 text-white rounded-full flex items-center justify-center text-xl font-bold mr-4">5</div>
                                <h3 class="text-2xl font-bold text-gray-900">Receive payments for your lessons directly to your account</h3>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                Receive payments for your lessons directly to your account. Monitor your earnings from completed lessons and keep track of your income. Withdraw your funds easily whenever needed, directly from your tutor dashboard.
                            </p>
                            <button class="bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition-colors">
                                Get Paid
                            </button>
                        </div>
                        <div class="lg:w-1/2">
                            <img src="@/assets/images/shape/how-it-works-06.png" alt="Student 1" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vision Section -->
        <div class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Vision</h2>
                    <h3 class="text-2xl md:text-3xl font-semibold text-blue-600 mb-8">Our Vision. Drive Learning Growth</h3>
                    <p class="text-lg text-gray-600 max-w-4xl mx-auto mb-12">
                        To be the leading global platform for personalized education, where every student has access to the highest quality tutoring and every tutor can reach and impact learners across the globe, creating a future where education is tailored, accessible, and transformative for all.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center p-6">
                        <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-3">Accessible Education for All</h4>
                        <p class="text-gray-600">Empowering students to learn from the best, anywhere.</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-3">Empowering Tutors Globally</h4>
                        <p class="text-gray-600">Enabling tutors to reach and inspire students across the globe.</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-3">Transformative Learning Experiences</h4>
                        <p class="text-gray-600">Shaping a future of personalized, impactful education for all.</p>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                        Discover More
                    </button>
                </div>
            </div>
        </div>

        <!-- Testimonials Section -->
        <div class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Users Are Saying</h2>
                    <h3 class="text-2xl md:text-3xl font-semibold text-blue-600 mb-8">Real Feedback from Our Clients</h3>
                    <p class="text-lg text-gray-600 max-w-4xl mx-auto">
                        Discover how Lernen is making a difference in the lives of students and educational institutions. Hear from our satisfied users.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-gray-50 rounded-lg shadow-md p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-lg font-bold text-blue-600">AM</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Arlene M</h4>
                                <p class="text-sm text-gray-600">Agile District</p>
                            </div>
                        </div>
                        <p class="text-gray-600">
                            "We have tried several tutoring platforms, but none compare to Lernen. The tutors are top-notch, and the booking process is incredibly."
                        </p>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="bg-gray-50 rounded-lg shadow-md p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-lg font-bold text-green-600">RR</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Ronald R</h4>
                                <p class="text-sm text-gray-600">Educational Consultant</p>
                            </div>
                        </div>
                        <p class="text-gray-600">
                            "Lernen is a dependable and effective tool for our agency, offering knowledgeable and dedicated tutors."
                        </p>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="bg-gray-50 rounded-lg shadow-md p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-lg font-bold text-purple-600">MM</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Marvin M</h4>
                                <p class="text-sm text-gray-600">Tutoring Specialist</p>
                            </div>
                        </div>
                        <p class="text-gray-600">
                            "Lernen has been a game-changer for our students. The variety of tutors and the ease of booking sessions make it a breeze for parents and students alike. Our students' grades have improved significantly since we started using this platform."
                        </p>
                    </div>

                    <!-- Testimonial 4 -->
                    <div class="bg-gray-50 rounded-lg shadow-md p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-lg font-bold text-orange-600">CH</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Courtney H</h4>
                                <p class="text-sm text-gray-600">School Counselor</p>
                            </div>
                        </div>
                        <p class="text-gray-600">
                            "We're delighted with Lernen its top-notch tutors and user-friendly platform have greatly boosted our students."
                        </p>
                    </div>

                    <!-- Testimonial 5 -->
                    <div class="bg-gray-50 rounded-lg shadow-md p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-lg font-bold text-red-600">DL</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Devon L</h4>
                                <p class="text-sm text-gray-600">Classroom Teacher</p>
                            </div>
                        </div>
                        <p class="text-gray-600">
                            "Lernen is a fantastic resource for our students. The diverse range of tutors ensures that we can find the perfect match for each student's."
                        </p>
                    </div>

                    <!-- Testimonial 6 -->
                    <div class="bg-gray-50 rounded-lg shadow-md p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-lg font-bold text-indigo-600">DR</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Darlene R</h4>
                                <p class="text-sm text-gray-600">Academic Advisor</p>
                            </div>
                        </div>
                        <p class="text-gray-600">
                            "Our experience with Lernen has been outstanding. The platform is user-friendly, & the tutors are highly qualified."
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Final CTA Section -->
        <div class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">We guarantee quality process</h2>
                <h3 class="text-2xl md:text-3xl font-semibold mb-4">Let's join our community today</h3>
                <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
                    Join our community to either share your expertise as a tutor or enhance your skills as a student. Connect, learn, and grow with us today.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Find a Tutor
                    </button>
                    <button class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                        Become a Tutor
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const activeRole = ref('student');
</script>