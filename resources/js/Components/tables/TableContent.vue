<template>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
        <!-- Header -->
        <div class="pt-4">
            <div class="flex items-center justify-between border-b border-gray-200 px-5 py-4 dark:border-gray-800">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                        {{ props.title }}
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400" v-if="props.description">
                        {{ props.description }}
                    </p>
                </div>
                <div class="flex flex-col gap-3.5 sm:flex-row sm:items-center">
                    <slot name="actions"></slot>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="">
                    <slot name="thead"></slot>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    <slot name="tbody"></slot>
                </tbody>
            </table>
            <div class="p-6 w-full text-center" v-if="pager && pager.total === 0">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">{{ $t('common.no_results_found') }}</h3>
            </div>
        </div>

        <Pagination :pager="pager" v-if="pager" />

    </div>
</template>


<script setup>
import Pagination from '@/Components/tables/Pagination.vue';
const props = defineProps({
    title: {
        type: String,
        required: true
    },
    description: {
        type: String,
        required: false,
        default: null
    },
    pager: {
        type: Object,
        required: false,
        default: null
    }
});

console.log(props.pager);

</script>