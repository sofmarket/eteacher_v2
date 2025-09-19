<template>
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
        <div class="flex">

            <div class="w-1/3 p-4">
                <!-- Video Player Section -->
                <VideoPlayer />

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
                        <button class="p-2.5 text-gray-400 hover:text-red-500 transition-colors bg-white rounded-md border border-gray-300">
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
                        <Link :href="route('front.tutors.show', tutor.profile.slug)" class="text-white font-semibold text-lg">{{ getInitials(tutor.profile.full_name) }}</Link>
                    </div>
                    <div class="flex-1 flex items-center justify-between">
                        <div class="">
                            <Link :href="route('front.tutors.show', tutor.profile.slug)">
                                <h3 class="text-md font-bold text-gray-900 mr-2">{{ tutor.profile.full_name }}</h3>
                            </Link>
                            
                            <!-- Tagline -->
                            <p class="text-sm text-gray-600">{{ tutor.profile.tagline }}</p>

                        </div>
                        <div class="text-right">
                            <span class="text-sm text-gray-500">Session fee</span>
                            <div class="text-md font-bold text-gray-900">{{ tutor.min_price }}<span
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
                        <span>{{ tutor.avg_rating || '0' }}/5.0 ({{ tutor.total_reviews }} review)</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                        <span>{{ tutor.sessions }} Booked sessions</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                        </svg>
                        <span>{{ tutor.sessions }} Sessions</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2L3 7v11a1 1 0 001 1h12a1 1 0 001-1V7l-7-5zM8 15v-3a2 2 0 114 0v3H8z" />
                        </svg>
                        <span>Languages I Know <b>{{ tutor.languages.map(language => language.name).join(', ') }}</b></span>
                    </div>
                </div>

                <!-- Tutor Description -->
                <p class="text-sm text-gray-600 leading-relaxed">
                    {{ tutor.profile.description }}
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import VideoPlayer from '@/Components/ui/VideoPlayer.vue';

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