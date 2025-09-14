<template>
    <div class="space-y-6">
        <Breadcrumbs :title="$t('tutor.disputes.title')" />

        <Statistics />

        <!-- Main Content -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <!-- Header -->
            <div class="pt-4">
                <div class="flex items-center justify-between border-b border-gray-200 px-5 py-4 dark:border-gray-800">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                            {{ $t('tutor.disputes.page_title') }}
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $t('tutor.disputes.description') }}
                        </p>
                    </div>
                    <div class="flex gap-3.5">
                        <div
                            class="hidden h-11 items-center gap-0.5 rounded-lg bg-gray-100 p-0.5 lg:inline-flex dark:bg-gray-900">
                            <button v-for="option in statusOptions" :key="option.value"
                                @click="changeFilterStatus(option.value)"
                                class="text-theme-sm h-10 rounded-md px-3 py-2 font-medium hover:text-gray-900 dark:hover:text-white text-gray-500 dark:text-gray-400"
                                :class="{
                                    'shadow-theme-xs text-gray-900 dark:text-white bg-white dark:bg-gray-800': filterStatus === option.value,
                                    'text-gray-500 dark:text-gray-400': filterStatus !== option.value
                                }">
                                {{ option.label }}
                            </button>
                        </div>
                        <div class="hidden flex-col gap-3 sm:flex sm:flex-row sm:items-center">
                            <div class="relative">
                                <span class="absolute top-1/2 left-4 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                    <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.04199 9.37363C3.04199 5.87693 5.87735 3.04199 9.37533 3.04199C12.8733 3.04199 15.7087 5.87693 15.7087 9.37363C15.7087 12.8703 12.8733 15.7053 9.37533 15.7053C5.87735 15.7053 3.04199 12.8703 3.04199 9.37363ZM9.37533 1.54199C5.04926 1.54199 1.54199 5.04817 1.54199 9.37363C1.54199 13.6991 5.04926 17.2053 9.37533 17.2053C11.2676 17.2053 13.0032 16.5344 14.3572 15.4176L17.1773 18.238C17.4702 18.5309 17.945 18.5309 18.2379 18.238C18.5308 17.9451 18.5309 17.4703 18.238 17.1773L15.4182 14.3573C16.5367 13.0033 17.2087 11.2669 17.2087 9.37363C17.2087 5.04817 13.7014 1.54199 9.37533 1.54199Z"
                                            fill=""></path>
                                    </svg>
                                </span>
                                <input type="text" :placeholder="$t('tutor.disputes.search.placeholder')"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-4 pl-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden xl:w-[300px] dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="">
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ $t('tutor.disputes.table.dispute_id') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ $t('tutor.disputes.table.requested_by') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ $t('tutor.disputes.table.subject') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ $t('tutor.disputes.table.create_date') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ $t('tutor.disputes.table.status') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ $t('tutor.disputes.table.action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        <tr v-if="!disputes.data.length">
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-400 dark:text-gray-500 mb-4" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">{{ $t('tutor.disputes.empty_state.title') }}
                                    </h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $t('tutor.disputes.empty_state.description') }}
                                        your current filters.</p>
                                </div>
                            </td>
                        </tr>
                        <tr v-for="dispute in disputes.data" :key="dispute.id"
                            class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                    #{{ dispute.id }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8">
                                        <div
                                            class="h-8 w-8 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                                            <span class="text-xs font-medium text-gray-600 dark:text-gray-300">
                                                {{ dispute.creatorBy?.name?.charAt(0) || 'U' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ dispute.creatorBy?.name || 'Unknown User' }}
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ dispute.creatorBy?.email || '' }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 dark:text-white max-w-xs truncate">
                                    {{ dispute.dispute_reason }}
                                </div>
                                <div class="text-sm text-gray-500 dark:text-gray-400 max-w-xs truncate">
                                    {{ dispute.dispute_detail }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ formatDate(dispute.created_at) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                    :class="getStatusClasses(dispute.status)">
                                    <svg class="-ml-0.5 mr-1.5 h-2 w-2" :class="getStatusDotClasses(dispute.status)"
                                        fill="currentColor" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="3" />
                                    </svg>
                                    {{ formatStatus(dispute.status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <Link :href="route('tutor.disputes.show', dispute.id)"
                                        class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 transition-colors duration-200">
                                    {{ $t('tutor.disputes.actions.view_more') }}
                                    </Link>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div v-if="disputes.data.length" class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between py-3">
                    <div class="flex items-center space-x-3">
                        <div class="relative pb-3 sm:pb-0">
                            <select v-model="itemsPerPage" @change="changeItemsPerPage"
                                class="block w-full sm:w-32 rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 text-sm">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="text-gray-800 dark:text-white/90">
                            {{ $t('tutor.disputes.pagination.showing_results', { from: disputes.meta.from, to: disputes.meta.to, total: disputes.meta.total }) }}
                            results
                        </div>
                    </div>
                    <Pagination :links="disputes.meta.links" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Pagination from '@/Components/tables/Pagination.vue';
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';
import { computed, ref } from 'vue';
import { usePage, router, Link } from '@inertiajs/vue3';
import Statistics from './Statistics.vue';

const page = usePage();
const disputes = computed(() => page.props.disputes);
const statusOptions = computed(() => page.props.statusOptions);
const filters = computed(() => page.props.filters);
const filterStatus = ref(filters.value.status || 'all');
const itemsPerPage = ref(page.props.per_page);

const changeItemsPerPage = () => {
    router.get(route('tutor.disputes'), {
        status: filterStatus.value,
        page: 1,
        per_page: itemsPerPage.value,
    }, {
        preserveState: true,
        replace: true,
    });
}

const changeFilterStatus = (status) => {
    filterStatus.value = status;
    router.get(route('tutor.disputes'), {
        status: filterStatus.value,
        page: 1,
        per_page: itemsPerPage.value,
    }, {
        preserveState: true,
        replace: true,
    });
}

const formatDate = (date) => {
    return new Date(date).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    });
}

const formatStatus = (status) => {
    return status.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase());
}

const getStatusClasses = (status) => {
    const classes = {
        'closed': 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400',
        'under_review': 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400',
        'in_discussion': 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400',
        'pending': 'bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-300'
    };
    return classes[status] || classes['pending'];
}

const getStatusDotClasses = (status) => {
    const classes = {
        'closed': 'text-green-400',
        'under_review': 'text-yellow-400',
        'in_discussion': 'text-blue-400',
        'pending': 'text-gray-400'
    };
    return classes[status] || classes['pending'];
}
</script>