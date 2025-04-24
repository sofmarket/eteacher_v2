<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    links: {
        type: Array,
        required: true,
    },
});
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
                  :href="link.url"
                  v-html="link.label" />
        </template>
    </div>
</template> 