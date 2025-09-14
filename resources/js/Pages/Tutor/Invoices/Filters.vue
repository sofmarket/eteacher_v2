<template>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">{{ $t('tutor.invoices.title') }}</h1>
        <div class="flex items-center space-x-2">
            <span class="text-sm text-gray-600 dark:text-gray-400">{{ $t('tutor.invoices.filters.filter_by') }}</span>
            <select
                class="block w-full sm:w-48 rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 text-sm">
                <option v-for="option in filterOptions" :key="option" :value="option">
                    {{ $t(option) }}
                </option>
            </select>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const filterOptions = ref([
    'tutor.invoices.filters.all_invoices',
    'tutor.invoices.status.complete',
    'tutor.invoices.status.pending',
    'tutor.invoices.status.failed',
    'tutor.invoices.status.refunded',
]);

const filterStatus = ref('tutor.invoices.filters.all_invoices');

</script>