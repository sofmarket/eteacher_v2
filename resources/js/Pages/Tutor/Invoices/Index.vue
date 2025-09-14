<template>
    <div>
        <Breadcrumbs :title="$t('tutor.invoices.title')" />

        <div class="py-7">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <div class="p-6 text-gray-900 dark:text-gray-100 w-full">

                    <!-- Header and Filters -->
                    <Filters />

                    <!-- Invoices Table -->
                    <div class="w-full overflow-x-auto">
                        <table class="w-full table-auto divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700/50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $t('tutor.invoices.table.invoice_id') }}</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $t('tutor.invoices.table.date') }}</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $t('tutor.invoices.table.student_name') }}</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $t('tutor.invoices.table.amount') }}</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $t('tutor.invoices.table.tutor_payout') }}</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $t('tutor.invoices.table.status') }}</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">{{ $t('tutor.invoices.table.actions') }}</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                <tr v-if="!invoices.data.length">
                                    <td colspan="9"
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-center">
                                        {{ $t('tutor.invoices.table.no_invoices_found') }}
                                    </td>
                                </tr>
                                <tr v-for="invoice in invoices.data" :key="invoice.id"
                                    class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        {{ invoice.id }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ invoice.issued_at }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        <div class="flex items-center">
                                            <!-- <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                    :src="invoice.student.avatar" alt="Student">
                                            </div> -->
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 dark:text-white">{{
                                                    invoice.student.name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ invoice.amount }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ invoice.tutor_payout }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                            :class="{
                                                'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300': invoice.status === 'paid',
                                                'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300': invoice.status === 'pending',
                                                'bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-300': !['paid', 'pending'].includes(invoice.status)
                                            }">
                                            <svg class="-ml-0.5 mr-1.5 h-2 w-2" :class="{
                                                'text-green-400': invoice.status === 'paid',
                                                'text-yellow-400': invoice.status === 'pending',
                                                'text-gray-400': !['paid', 'pending'].includes(invoice.status)
                                            }" fill="currentColor" viewBox="0 0 8 8">
                                                <circle cx="4" cy="4" r="3" />
                                            </svg>
                                            {{ invoice.status }}
                                        </span>
                                    </td>
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
                    <div v-if="invoices.data.length"
                        class="mt-6 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
                        <div class="flex items-center space-x-2 text-sm text-gray-700 dark:text-gray-400">
                            <span>{{ $t('tutor.invoices.pagination.show') }}</span>
                            <select v-model="itemsPerPage" @change="changeItemsPerPage"
                                class="block w-20 rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 text-sm">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="hidden sm:inline">| {{ $t('tutor.invoices.pagination.showing_results', { from: invoices.meta.from, to: invoices.meta.to, total: invoices.meta.total }) }}</span>
                        </div>
                        <Pagination :links="invoices.meta.links" />
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';
import { computed, ref } from 'vue';
import { router, usePage } from '@inertiajs/vue3';
import Pagination from '@/Components/tables/Pagination.vue'; // Assuming a Pagination component
import Filters from './Filters.vue';

const page = usePage();
const invoices = computed(() => page.props.invoices);
const itemsPerPage = ref(page.props.per_page);

// Function to change items per page - requires backend integration
const changeItemsPerPage = () => {
    router.get(route('tutor.invoices.index'), {
        // status: filterStatus.value === 'All Invoices' ? '' : filterStatus.value,
        page: 1,
        per_page: itemsPerPage.value,
    }, {
        preserveState: true,
        replace: true,
    });
}

</script>