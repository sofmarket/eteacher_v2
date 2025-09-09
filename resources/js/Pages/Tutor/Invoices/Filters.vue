<template>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Invoices</h1>
        <div class="flex items-center space-x-2">
            <span class="text-sm text-gray-600 dark:text-gray-400">Filter by:</span>
            <select
                class="block w-full sm:w-48 rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 text-sm">
                <option v-for="option in filterOptions" :key="option" :value="option">
                    {{ option }}
                </option>
            </select>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const filterOptions = ref([
    'All Invoices',
    'Complete',
    'Pending',
    'Failed',
    'Refunded',
]);

const filterStatus = ref('All Invoices');

</script>