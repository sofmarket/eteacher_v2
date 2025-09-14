<template>
    <div>
        <Breadcrumbs :title="$t('tutor.payouts.title')" />


        <div class="py-7">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <div class="p-6 text-gray-900 dark:text-gray-100 w-full">

                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-semibold">{{ $t('tutor.payouts.title') }}</h1>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600 dark:text-gray-400">{{ $t('tutor.payouts.filters.filter_by') }}</span>
                            <select
                                class="block w-full sm:w-48 rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 text-sm">
                                <option v-for="option in filterOptions" :key="option" :value="option">
                                    {{ $t(option) }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <!-- Payout Methods -->
                    <!-- Payouts Table -->
                    <div class="w-full overflow-x-auto">
                        <table class="w-full table-auto divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700/50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $t('tutor.payouts.table.ref') }}</th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $t('tutor.payouts.table.method') }}</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $t('tutor.payouts.table.date') }}</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $t('tutor.payouts.table.amount') }}</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $t('tutor.payouts.table.status') }}</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50" v-for="payout in payouts.data" :key="payout.id">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        {{ payout.id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{
                                        payout.payout_method }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{
                                        payout.created_at }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{
                                        payout.amount }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{
                                        payout.status }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button
                                            class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-1">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                </path>
                                            </svg> <!-- Options -->
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div v-if="payouts.data.length"
                        class="mt-6 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
                        <div class="flex items-center space-x-2 text-sm text-gray-700 dark:text-gray-400">
                            <span>{{ $t('tutor.payouts.pagination.show') }}</span>
                            <select v-model="itemsPerPage" @change="changeItemsPerPage"
                                class="block w-20 rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 text-sm">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="hidden sm:inline">| {{ $t('tutor.payouts.pagination.showing_results', { from: payouts.meta.from, to: payouts.meta.to, total: payouts.meta.total }) }}</span>
                        </div>
                        <Pagination :links="payouts.meta.links" />
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';
import { computed, ref } from 'vue';
import { usePage, router } from '@inertiajs/vue3';
import Pagination from '@/Components/tables/Pagination.vue';

const page = usePage();
const payouts = computed(() => page.props.payouts);
const itemsPerPage = ref(page.props.per_page);
const filterOptions = ref([
    'tutor.payouts.filters.all_payouts',
    'tutor.payouts.status.complete',
    'tutor.payouts.status.pending',
    'tutor.payouts.status.failed',
    'tutor.payouts.status.refunded',
]);

const changeItemsPerPage = () => {
    router.get(route('tutor.payouts'), {
        page: 1,
        per_page: itemsPerPage.value,
    }, {
        preserveState: true,
        replace: true,
    });
}

</script>