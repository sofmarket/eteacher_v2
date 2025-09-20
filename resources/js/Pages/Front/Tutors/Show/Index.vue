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
                <Profile :tutor="tutor" />

                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <!-- Navigation Tabs -->
                    <div class="bg-white rounded-lg shadow-md mb-6">
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex space-x-8 px-6">
                                <button 
                                    v-for="tab in tabs" 
                                    :key="tab.id"
                                    @click="activeTab = tab.id"
                                    :class="[
                                        'py-4 px-1 text-sm font-medium border-b-2 transition-colors',
                                        activeTab === tab.id 
                                            ? 'border-blue-500 text-blue-600' 
                                            : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                                    ]"
                                >
                                    {{ tab.name }}
                                    <span v-if="tab.count" class="ml-2 bg-gray-100 text-gray-600 py-0.5 px-2 rounded-full text-xs">
                                        {{ tab.count }}
                                    </span>
                                </button>
                            </nav>
                        </div>
                        
                        <!-- Tab Content -->
                        <div class="p-6">
                            <Introduction v-if="activeTab === 'introduction'" :tutor="tutor" />
                            <Availability v-if="activeTab === 'availability'" :tutor="tutor" />
                            <Resume v-if="activeTab === 'resume'" :tutor="tutor" />
                            <Reviews v-if="activeTab === 'reviews'" :tutor="tutor" />
                        </div>
                    </div>
                    <!-- <RequestSession /> -->
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
import { computed, ref, onMounted } from 'vue';
import Introduction from './Components/Introduction.vue';
import Availability from './Components/Availability.vue';
import Resume from './Components/Resume.vue';
import Reviews from './Components/Reviews.vue';
import Profile from './Components/Profile.vue';

const tutor = computed(() => usePage().props.tutor.data);
const activeTab = ref('introduction');

// Tab configuration
const tabs = [
    { id: 'introduction', name: 'Introduction' },
    { id: 'availability', name: 'Availability' },
    { id: 'resume', name: 'Resume Highlights' },
    { id: 'reviews', name: 'Reviews', count: tutor.value?.reviews?.length || 1 }
];

onMounted(() => {
    console.log(tutor);
});

</script>

