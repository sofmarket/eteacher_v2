<template>
    <div class="min-h-screen bg-gray-50 w-full pt-[80px]">

        <HeroSection />

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col lg:flex-row gap-8">

                <SidebarFilters @filtered="onFiltersChanged" />

                <!-- Main Content Area -->
                <div class="lg:w-3/4">
                    <!-- Sort and Search Bar -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <span class="text-sm text-gray-600">Sort by:</span>
                                <select v-model="sortBy"
                                    class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="newest">Newest first</option>
                                    <option value="oldest">Oldest First</option>
                                    <option value="asc">Alphabetical A-Z</option>
                                    <option value="desc">Alphabetical Z-A</option>
                                </select>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="relative">
                                    <input type="text" v-model="keyword" placeholder="Search for a tutor"
                                        class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <span class="absolute right-2 top-1.5 cursor-pointer text-gray-500 text-md"
                                        v-if="keyword != ''" @click="keyword = ''">x</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tutors Grid -->
                    <div class="grid grid-cols-1 gap-6"> <!-- md:grid-cols-2 xl:grid-cols-3 gap-6 -->

                        <!-- Actual Tutor Cards -->
                        <TutorCard v-if="tutors.data.length > 0" v-for="tutor in tutors.data" :key="tutor.id"
                            :tutor="tutor" />

                        <LoadingPlaceholder v-if="isLoading" v-for="n in 5" :key="`skeleton-${n}`" />

                        <div v-if="!isLoading && tutors.data.length === 0" class="text-center py-12">
                            <div class="mx-auto w-24 h-24 text-gray-300 mb-4">
                                <svg fill="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                                    <path
                                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No tutors found</h3>
                            <p class="text-gray-500 mb-4">Try adjusting your search criteria or filters</p>
                        </div>

                        <!-- Load More Button  -->
                        <div v-if="!isLoading && tutors.meta.current_page < tutors.meta.last_page"
                            class="text-center mt-8">
                            <button @click="loadMoreTutors"
                                class="bg-white border border-gray-300 text-gray-700 px-8 py-3 rounded-md hover:bg-gray-50 transition-colors">
                                Load More Tutors
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <TipsSection />

    </div>
</template>

<script setup>

import { ref, watch, onMounted } from 'vue';
import SidebarFilters from './Components/SidebarFilters.vue';
import TipsSection from './Components/TipsSection.vue';
import HeroSection from './Components/HeroSection.vue';
import TutorCard from './Components/TutorCard.vue';
import { useDebounceFn } from '@vueuse/core';
import axios from 'axios';
import LoadingPlaceholder from './Components/LoadingPlaceholder.vue';

const tutors = ref({
    data: [],
    meta: {
        current_page: 1,
        last_page: 1,
        total: 0
    }
});
const keyword = ref('');
const filters = ref({});
const sortBy = ref('newest');
const isLoading = ref(true);

const fetchTutors = (loadMore = false) => {

    if (!loadMore) {
        tutors.value.data = [];
    }

    isLoading.value = true;

    let query = {};

    query.sort_by = sortBy.value;

    if (keyword.value != '') {
        query.keyword = keyword.value;
    }
    
    Object.keys(filters.value).forEach(key => {
        query[key] = filters.value[key];
    });

    if (loadMore) {
        query.page = tutors.value.meta.current_page + 1;
    }

    console.log('query', query);

    axios.get(route('front.tutors.index'), {
        params: query
    }).then(response => {
        if (loadMore) {
            tutors.value.data = [...tutors.value.data, ...response.data.data];
        } else {
            tutors.value = response.data;
        }
        tutors.value.meta = response.data.meta;
    }).finally(() => {
        isLoading.value = false;
        if(!loadMore) {
            // scroll to top
            window.scrollTo(0, 0);
        }
    });
};

const loadMoreTutors = () => {
    fetchTutors(true);
}

const onFiltersChanged = (_filters) => {
    filters.value = _filters;
    fetchTutors();
}

watch(keyword, useDebounceFn(() => {
    fetchTutors();
}, 500));

watch(sortBy, () => {
    fetchTutors();
});

onMounted(() => {
    fetchTutors();
});

</script>
