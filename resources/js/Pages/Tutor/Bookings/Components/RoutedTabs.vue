<template>
  <div class="bg-white dark:bg-white/[0.03]">
    <div class="p-3 border border-gray-200 rounded-t-xl dark:border-gray-800">
      <nav
        class="flex overflow-x-auto rounded-lg bg-gray-100 p-1 dark:bg-gray-900 [&amp;::-webkit-scrollbar]:h-1.5 [&amp;::-webkit-scrollbar-track]:bg-white dark:[&amp;::-webkit-scrollbar-track]:bg-transparent [&amp;::-webkit-scrollbar-thumb]:rounded-full [&amp;::-webkit-scrollbar-thumb]:bg-gray-200 dark:[&amp;::-webkit-scrollbar-thumb]:bg-gray-600">
        <Link
          v-for="tab in tabs"
          :key="tab.id"
          :href="route(tab.route)"
          :class="[
            'inline-flex items-center rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200 ease-in-out',
            tab.isActive 
              ? 'bg-white text-gray-900 shadow-theme-xs dark:bg-white/[0.03] dark:text-white'
              : 'bg-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200'
          ]">
          {{ tab.label }}
        </Link>
      </nav>
    </div>
    <div class="p-6 pt-2 border border-t-0 border-gray-200 rounded-b-xl dark:border-gray-800">
      <slot />
    </div>
  </div>
</template>

<script setup>

import { Link } from '@inertiajs/vue3';

const props = defineProps({
  tabs: {
    type: Array,
    required: true,
    validator: (value) => {
      return value.every(tab => tab.id && tab.label && tab.route);
    }
  },
});

</script> 
