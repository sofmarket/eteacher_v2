<template>
    <div class="min-h-screen bg-gray-50 w-full pt-[80px]">
        
        <HeroSection />

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col lg:flex-row gap-8">

                <SidebarFilters />

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
                    <div class="grid grid-cols-1 gap-6"> <!-- md:grid-cols-2 xl:grid-cols-3 gap-6 -->
                        <TutorCard v-for="tutor in tutors.data" :key="tutor.id" :tutor="tutor" />
                    </div>

                    <!-- Load More Button 
                    <div class="text-center mt-8">
                        <button class="bg-white border border-gray-300 text-gray-700 px-8 py-3 rounded-md hover:bg-gray-50 transition-colors">
                            Load More Tutors
                        </button>
                    </div> -->
                </div>

            </div>
        </div>

        <TipsSection />

    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import SidebarFilters from './Components/SidebarFilters.vue';
import TipsSection from './Components/TipsSection.vue';
import HeroSection from './Components/HeroSection.vue';
import TutorCard from './Components/TutorCard.vue';

const page = usePage();
const tutors = computed(() => page.props.tutors);

</script>
