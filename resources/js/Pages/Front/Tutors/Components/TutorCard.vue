<template>
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
        <div class="flex">

            <div class="w-1/3 p-4">
                <!-- Video Player Section -->
                <div class="relative bg-gray-200 rounded-lg overflow-hidden aspect-video">
                    <!-- Video Thumbnail/Player -->
                    <div
                        class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mb-2 mx-auto">
                                <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8 5v10l8-5-8-5z" />
                                </svg>
                            </div>
                            <p class="text-sm text-gray-600">Video Introduction</p>
                        </div>
                    </div>
                    <!-- Video Controls Overlay -->
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2">
                        <div class="flex items-center justify-between text-xs">
                            <div class="flex items-center space-x-2">
                                <button class="hover:text-gray-300">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8 5v10l8-5-8-5z" />
                                    </svg>
                                </button>
                                <span>0:00</span>
                                <div class="w-16 h-1 bg-gray-600 rounded-full">
                                    <div class="w-0 h-full bg-white rounded-full"></div>
                                </div>
                                <span>0:26</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="hover:text-gray-300">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.617.816L4.383 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.383l4-3.816zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" />
                                    </svg>
                                </button>
                                <button class="hover:text-gray-300">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                                    </svg>
                                </button>
                                <button class="hover:text-gray-300">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="w-full mt-2 space-y-2">
                    <button
                        class="w-full flex-1 bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition-colors flex items-center justify-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                        Book a session
                    </button>
                    <div class="flex items-center space-x-3 mb-4 w-full">
                        <button
                            class="flex-1 bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-50 transition-colors flex items-center justify-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            Send message
                        </button>
                        <button class="p-2 text-gray-400 hover:text-red-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tutor Information Section -->
            <div class="w-2/3 p-4">
                <!-- Tutor Header -->
                <div class="flex items-center justify-between mb-3">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-blue-400 to-purple-500 rounded-sm flex items-center justify-center mr-3">
                        <Link :href="route('front.tutors.show', tutor.slug)" class="text-white font-semibold text-lg">{{ getInitials(tutor.name) }}</Link>
                    </div>
                    <div class="flex-1 flex items-center justify-between">
                        <div class="">
                            <Link :href="route('front.tutors.show', tutor.slug)">
                                <h3 class="text-md font-bold text-gray-900 mr-2">{{ tutor.name }}</h3>
                            </Link>
                            
                            <!-- Tagline -->
                            <p class="text-sm text-gray-600">{{ tutor.tagline || 'Empowering Students with Customized Learning Support' }}</p>

                        </div>
                        <div class="text-right">
                            <span class="text-sm text-gray-500">Session fee</span>
                            <div class="text-md font-bold text-gray-900">${{ tutor.hourly_rate || '40.00' }}<span
                                    class="text-sm font-normal text-gray-500">/Session</span></div>
                        </div>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="space-y-1 mb-5">
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span>{{ tutor.rating || '5.0' }}/5.0 ({{ tutor.reviews_count || '1' }} review)</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                        <span>{{ tutor.booked_sessions || '74' }} Booked sessions</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                        </svg>
                        <span>{{ tutor.completed_sessions || '0' }} Sessions</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2L3 7v11a1 1 0 001 1h12a1 1 0 001-1V7l-7-5zM8 15v-3a2 2 0 114 0v3H8z" />
                        </svg>
                        <span>Languages I Know {{ tutor.languages || 'Armenian, Asturian' }}</span>
                    </div>
                </div>

                <!-- Tutor Description -->
                <p class="text-sm text-gray-600 leading-relaxed">
                    {{ tutor.description || 'Hi! I am ' + tutor.name + ', a dedicated and experienced tutor with a passion for helping students excel in their academic pursuits.With expertise across a variety of subjects, including mathematics, science, and language...' }}
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    tutor: {
        type: Object,
        required: true
    }
});

// Function to get initials from tutor name
const getInitials = (name) => {
    if (!name) return 'T';
    return name
        .split(' ')
        .map(word => word.charAt(0))
        .join('')
        .toUpperCase()
        .slice(0, 2);
};


</script>