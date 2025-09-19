<template>
    <div class="min-h-screen bg-gray-50 w-full pt-[80px]">
        
        <HeroSection />

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col lg:flex-row gap-8">

                <SidebarFilters  @filtered="onFiltersChanged" />

                <!-- Main Content Area -->
                <div class="lg:w-3/4">
                    <!-- Sort and Search Bar -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <span class="text-sm text-gray-600">Sort by:</span>
                                <select v-model="sortBy" class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="newest">Newest first</option>
                                    <option value="oldest">Oldest First</option>
                                    <option value="asc">Alphabetical A-Z</option>
                                    <option value="desc">Alphabetical Z-A</option>
                                </select>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="relative">
                                    <input type="text" v-model="keyword" placeholder="Search for a tutor" class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <span class="absolute right-2 top-1.5 cursor-pointer text-gray-500 text-md" v-if="keyword != ''" @click="keyword = ''">x</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tutors Grid -->
                    <div class="grid grid-cols-1 gap-6"> <!-- md:grid-cols-2 xl:grid-cols-3 gap-6 -->
                        <LoadingPlaceholder v-if="isLoading" v-for="n in 6" :key="`skeleton-${n}`" />
                        <!-- Actual Tutor Cards -->
                        <TutorCard v-else v-for="tutor in tutors.data" :key="tutor.id" :tutor="tutor" />
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

import { ref, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';
import SidebarFilters from './Components/SidebarFilters.vue';
import TipsSection from './Components/TipsSection.vue';
import HeroSection from './Components/HeroSection.vue';
import TutorCard from './Components/TutorCard.vue';
import { useDebounceFn } from '@vueuse/core';
import axios from 'axios';
import LoadingPlaceholder from './Components/LoadingPlaceholder.vue';

const page = usePage();
const tutors = ref(page.props.tutors);
const keyword = ref('');
const sortBy = ref('newest');
const isLoading = ref(false);

const fetchTutors = (filters = {}) => {
    isLoading.value = true;
    filters.sort_by = sortBy.value;
    if(keyword.value != '') {
        filters.keyword = keyword.value;
    }
    axios.get(route('front.tutors.index'), {
        params: filters
    }).then(response => {
        tutors.value = response.data;
    }).finally(() => {
        setTimeout(() => {
            console.log('here');
            isLoading.value = false;
        }, 2000);
    });
};

const onFiltersChanged = (filters) => {
    fetchTutors(filters);
}

watch(keyword, useDebounceFn(() => {
    fetchTutors();
}, 500));

watch(sortBy, () => {
    fetchTutors();
});

</script>
