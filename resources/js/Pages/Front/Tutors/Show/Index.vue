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

        <SimilarTutors />
        
        <Instructions />

        <TipsSection />

        
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
import SimilarTutors from './Components/SimilarTutors.vue';
import Instructions from './Components/Instructions.vue';
import TipsSection from './Components/TipsSection.vue';


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

