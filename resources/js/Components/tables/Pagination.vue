<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    links: {
        type: Array,
        required: true,
    },
});


// Get current query parameters (excluding page parameter)
const queryParams = computed(() => {
    let params = new URLSearchParams(window.location.search);
    
    // Remove the page parameter as it will be handled by the pagination links
    params.delete('page');
    
    // Convert to object
    const queryObject = {};
    for (const [key, value] of params.entries()) {
        queryObject[key] = value;
    }
    
    return queryObject;
});

// Function to merge pagination URL with current query params
const getUrlWithParams = (url) => {
    if (!url) return null;
    
    const urlObj = new URL(url);
    const currentParams = new URLSearchParams(urlObj.search);
    
    // Add current query parameters to the pagination URL
    Object.entries(queryParams.value).forEach(([key, value]) => {
        if (!currentParams.has(key)) {
            currentParams.set(key, value);
        }
    });
    
    return `${urlObj.pathname}?${currentParams.toString()}`;
};
</script>

<template>
    <div v-if="links.length > 3" class="flex items-center space-x-1">
        <template v-for="(link, key) in links" :key="key">
            <div v-if="link.url === null"
                 class="px-3 py-1.5 text-sm leading-4 text-gray-400 dark:text-gray-500 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800"
                 v-html="link.label" />
            <Link v-else
                  class="px-3 py-1.5 text-sm leading-4 border border-gray-300 dark:border-gray-600 rounded focus:outline-none focus:border-indigo-500 focus:text-indigo-500 dark:focus:border-indigo-700 dark:focus:text-indigo-400"
                  :class="{
                      'bg-gray-900 dark:bg-gray-700 text-white dark:text-gray-200': link.active,
                      'bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300': !link.active
                  }"
                  :href="getUrlWithParams(link.url)"
                  v-html="link.label" />
        </template>
    </div>
</template> 