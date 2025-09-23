<template>
    <div class="min-h-screen bg-gray-50 w-full">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">Find Your Answer</h1>
                    <h2 class="text-2xl md:text-3xl font-semibold mb-4">Empowering learners worldwide</h2>
                    <p class="text-xl md:text-2xl text-blue-100 max-w-4xl mx-auto">
                        We are dedicated to providing personalized online tutoring experiences that unlock every learner's potential.
                    </p>
                </div>
            </div>
        </div>

        <!-- FAQ Categories -->
        <div class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                    <p class="text-lg text-gray-600">Choose a category to find answers to your questions</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                    <button 
                        @click="activeCategory = 'student'"
                        :class="[
                            'px-8 py-4 rounded-lg font-semibold transition-colors',
                            activeCategory === 'student' 
                                ? 'bg-blue-600 text-white' 
                                : 'bg-gray-200 text-gray-700 hover:bg-gray-300'
                        ]"
                    >
                        For Student
                    </button>
                    <button 
                        @click="activeCategory = 'tutor'"
                        :class="[
                            'px-8 py-4 rounded-lg font-semibold transition-colors',
                            activeCategory === 'tutor' 
                                ? 'bg-blue-600 text-white' 
                                : 'bg-gray-200 text-gray-700 hover:bg-gray-300'
                        ]"
                    >
                        For Tutor
                    </button>
                </div>

                <!-- Student FAQs -->
                <div v-if="activeCategory === 'student'" class="max-w-4xl mx-auto">
                    <div class="space-y-6">
                        <!-- FAQ Item 1 -->
                        <div class="bg-white rounded-lg shadow-md border border-gray-200">
                            <button 
                                @click="toggleFAQ('student1')"
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-gray-900">How do I find a tutor?</h3>
                                <svg 
                                    :class="[
                                        'w-5 h-5 text-gray-500 transition-transform',
                                        openFAQs.student1 ? 'rotate-180' : ''
                                    ]"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div v-if="openFAQs.student1" class="px-6 pb-4">
                                <p class="text-gray-600">
                                    Use the search bar and filters on the "Find a Tutor" page to search for tutors by subject, availability, rating, and more.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="bg-white rounded-lg shadow-md border border-gray-200">
                            <button 
                                @click="toggleFAQ('student2')"
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-gray-900">How do I book a session?</h3>
                                <svg 
                                    :class="[
                                        'w-5 h-5 text-gray-500 transition-transform',
                                        openFAQs.student2 ? 'rotate-180' : ''
                                    ]"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div v-if="openFAQs.student2" class="px-6 pb-4">
                                <p class="text-gray-600">
                                    Once you find a tutor, view their profile and select an available time slot that suits you. Click "Book Now" and follow the prompts to confirm your session.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="bg-white rounded-lg shadow-md border border-gray-200">
                            <button 
                                @click="toggleFAQ('student3')"
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-gray-900">What if I need to cancel or reschedule a session?</h3>
                                <svg 
                                    :class="[
                                        'w-5 h-5 text-gray-500 transition-transform',
                                        openFAQs.student3 ? 'rotate-180' : ''
                                    ]"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div v-if="openFAQs.student3" class="px-6 pb-4">
                                <p class="text-gray-600">
                                    You can cancel or reschedule a session up to 24 hours before the scheduled time without penalty. Cancellations within 24 hours may incur a fee.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="bg-white rounded-lg shadow-md border border-gray-200">
                            <button 
                                @click="toggleFAQ('student4')"
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-gray-900">How do I pay for sessions?</h3>
                                <svg 
                                    :class="[
                                        'w-5 h-5 text-gray-500 transition-transform',
                                        openFAQs.student4 ? 'rotate-180' : ''
                                    ]"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div v-if="openFAQs.student4" class="px-6 pb-4">
                                <p class="text-gray-600">
                                    Payments are made through our secure payment gateway using credit/debit cards or other available payment methods.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 5 -->
                        <div class="bg-white rounded-lg shadow-md border border-gray-200">
                            <button 
                                @click="toggleFAQ('student5')"
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-gray-900">What should I do if my tutor doesn't show up?</h3>
                                <svg 
                                    :class="[
                                        'w-5 h-5 text-gray-500 transition-transform',
                                        openFAQs.student5 ? 'rotate-180' : ''
                                    ]"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div v-if="openFAQs.student5" class="px-6 pb-4">
                                <p class="text-gray-600">
                                    If your tutor does not show up for a scheduled session, please contact our support team immediately for assistance and to arrange a refund or reschedule.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 6 -->
                        <div class="bg-white rounded-lg shadow-md border border-gray-200">
                            <button 
                                @click="toggleFAQ('student6')"
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-gray-900">How do I leave feedback for my tutor?</h3>
                                <svg 
                                    :class="[
                                        'w-5 h-5 text-gray-500 transition-transform',
                                        openFAQs.student6 ? 'rotate-180' : ''
                                    ]"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div v-if="openFAQs.student6" class="px-6 pb-4">
                                <p class="text-gray-600">
                                    After your session, you will receive an email prompting you to rate your tutor and provide feedback. You can also do this from your account dashboard.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tutor FAQs -->
                <div v-if="activeCategory === 'tutor'" class="max-w-4xl mx-auto">
                    <div class="space-y-6">
                        <!-- FAQ Item 1 -->
                        <div class="bg-white rounded-lg shadow-md border border-gray-200">
                            <button 
                                @click="toggleFAQ('tutor1')"
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-gray-900">How do I become a tutor?</h3>
                                <svg 
                                    :class="[
                                        'w-5 h-5 text-gray-500 transition-transform',
                                        openFAQs.tutor1 ? 'rotate-180' : ''
                                    ]"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div v-if="openFAQs.tutor1" class="px-6 pb-4">
                                <p class="text-gray-600">
                                    Click on the "Become a Tutor" link and follow the instructions to sign up, create your profile, and submit the necessary documentation for approval.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="bg-white rounded-lg shadow-md border border-gray-200">
                            <button 
                                @click="toggleFAQ('tutor2')"
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-gray-900">What qualifications do I need to become a tutor?</h3>
                                <svg 
                                    :class="[
                                        'w-5 h-5 text-gray-500 transition-transform',
                                        openFAQs.tutor2 ? 'rotate-180' : ''
                                    ]"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div v-if="openFAQs.tutor2" class="px-6 pb-4">
                                <p class="text-gray-600">
                                    Tutors are required to have relevant educational qualifications and teaching experience. Specific requirements may vary by subject.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="bg-white rounded-lg shadow-md border border-gray-200">
                            <button 
                                @click="toggleFAQ('tutor3')"
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-gray-900">How do I set my availability?</h3>
                                <svg 
                                    :class="[
                                        'w-5 h-5 text-gray-500 transition-transform',
                                        openFAQs.tutor3 ? 'rotate-180' : ''
                                    ]"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div v-if="openFAQs.tutor3" class="px-6 pb-4">
                                <p class="text-gray-600">
                                    Log in to your account, go to the "Availability" section, and update your calendar with your available time slots.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="bg-white rounded-lg shadow-md border border-gray-200">
                            <button 
                                @click="toggleFAQ('tutor4')"
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-gray-900">How do I get paid?</h3>
                                <svg 
                                    :class="[
                                        'w-5 h-5 text-gray-500 transition-transform',
                                        openFAQs.tutor4 ? 'rotate-180' : ''
                                    ]"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div v-if="openFAQs.tutor4" class="px-6 pb-4">
                                <p class="text-gray-600">
                                    Payments for your tutoring sessions are processed through our platform and transferred to your designated bank account on a regular basis.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 5 -->
                        <div class="bg-white rounded-lg shadow-md border border-gray-200">
                            <button 
                                @click="toggleFAQ('tutor5')"
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-gray-900">What should I do if a student cancels a session?</h3>
                                <svg 
                                    :class="[
                                        'w-5 h-5 text-gray-500 transition-transform',
                                        openFAQs.tutor5 ? 'rotate-180' : ''
                                    ]"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div v-if="openFAQs.tutor5" class="px-6 pb-4">
                                <p class="text-gray-600">
                                    If a student cancels a session within 24 hours of the scheduled time, you may be entitled to a cancellation fee. Check the platform's cancellation policy for details.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Help Section -->
        <div class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Still Need Help?</h2>
                    <p class="text-lg text-gray-600">Can't find the answer you're looking for? We're here to help!</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Contact Support -->
                    <div class="bg-white rounded-lg shadow-md p-8 text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Contact Support</h3>
                        <p class="text-gray-600 mb-6">Get in touch with our support team for personalized assistance.</p>
                        <button class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Contact Us
                        </button>
                    </div>

                    <!-- Live Chat -->
                    <div class="bg-white rounded-lg shadow-md p-8 text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Live Chat</h3>
                        <p class="text-gray-600 mb-6">Chat with our support team in real-time for instant help.</p>
                        <button class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                            Start Chat
                        </button>
                    </div>

                    <!-- Email Support -->
                    <div class="bg-white rounded-lg shadow-md p-8 text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Email Support</h3>
                        <p class="text-gray-600 mb-6">Send us an email and we'll get back to you within 24 hours.</p>
                        <button class="bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors">
                            Send Email
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Get Started?</h2>
                <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
                    Join thousands of students and tutors who are already experiencing the benefits of our platform.
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

const activeCategory = ref('student');
const openFAQs = ref({
    student1: false,
    student2: false,
    student3: false,
    student4: false,
    student5: false,
    student6: false,
    tutor1: false,
    tutor2: false,
    tutor3: false,
    tutor4: false,
    tutor5: false
});

const toggleFAQ = (faqId) => {
    openFAQs.value[faqId] = !openFAQs.value[faqId];
};
</script>
