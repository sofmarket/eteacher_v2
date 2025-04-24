<script setup>
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';
import { ref, computed } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Pagination from '@/Components/tables/Pagination.vue'; // Assuming a Pagination component

// Props - Replace with actual props from your controller
const props = defineProps({
    invoices: {
        type: Object, // Assuming Laravel Paginator object
        default: () => ({
            data: [
                // Sample Data - Replace with actual fetched data
                { id: 506, order_id: '506', date: '2025-04-19', transaction_id: 'pi_3Rf6WslnN7de3xLM11wdhP1', item_name: 'General Knowledge', item_grade: 'Middle School (Grades 6-8)', item_image: 'https://placehold.co/400x400', student_name: 'Isobel', student_image: 'https://placehold.co/400x400', amount: 100.00, tutor_payout: 95.00, status: 'Complete' },
                { id: 502, order_id: '502', date: '2025-04-09', transaction_id: 'pi_3RC4ArlnN7de3xLM0bLmuXgU', item_name: 'Science', item_grade: 'High School (Grades 9-10)', item_image: 'https://placehold.co/400x400', student_name: 'Isobel', student_image: 'https://placehold.co/400x400', amount: 40.00, tutor_payout: 38.00, status: 'Complete' },
                { id: 501, order_id: '501', date: '2025-04-08', transaction_id: 'pi_3RBVDulnN7de3xLM3qntREqg', item_name: 'Science', item_grade: 'High School (Grades 9-10)', item_image: 'https://placehold.co/400x400', student_name: 'Ann', student_image: 'https://placehold.co/400x400', amount: 40.00, tutor_payout: 38.00, status: 'Complete' },
                { id: 499, order_id: '499', date: '2025-04-05', transaction_id: 'pi_3RAroXlnN7de3xLM2hbeLvef', item_name: 'Science', item_grade: 'High School (Grades 9-10)', item_image: 'https://placehold.co/400x400', student_name: 'Isobel', student_image: 'https://placehold.co/400x400', amount: 40.00, tutor_payout: 38.00, status: 'Complete' },
                { id: 494, order_id: '494', date: '2025-04-02', transaction_id: 'pi_3R9QNKlnN7de3xLM3AizMpvN', item_name: 'Web Development Mastery', item_grade: '', item_image: 'https://placehold.co/400x400', student_name: 'Sarah', student_image: 'https://placehold.co/400x400', amount: 144.00, tutor_payout: 129.60, status: 'Complete' },
                { id: 486, order_id: '486', date: '2025-03-27', transaction_id: 'pi_3R79fWlnN7de3xLM3vaZpVz6', item_name: 'Science', item_grade: 'High School (Grades 9-10)', item_image: 'https://placehold.co/400x400', student_name: 'Sarah', student_image: 'https://placehold.co/400x400', amount: 40.00, tutor_payout: 38.00, status: 'Complete' },
                { id: 481, order_id: '481', date: '2025-03-24', transaction_id: 'pi_3R61ZQlnN7de3xLM3wuGmTBu', item_name: 'Full Stack Development', item_grade: '', item_image: 'https://placehold.co/400x400', student_name: 'Sarah', student_image: 'https://placehold.co/400x400', amount: 53.96, tutor_payout: 48.56, status: 'Complete' },
                { id: 472, order_id: '472', date: '2025-03-18', transaction_id: 'pi_3R49jllnN7de3xLM3KKsfyLE', item_name: 'Learn Spanish for Beginners', item_grade: '', item_image: 'https://placehold.co/400x400', student_name: 'Sarah', student_image: 'https://placehold.co/400x400', amount: 167.00, tutor_payout: 150.30, status: 'Complete' },
            ],
            // Sample pagination links - replace with actual links
            links: [
                { url: null, label: '&laquo; Previous', active: false },
                { url: '#', label: '1', active: true },
                { url: '#', label: '2', active: false },
                { url: '#', label: '3', active: false },
                { url: '#', label: '4', active: false },
                { url: '#', label: '5', active: false },
                { url: null, label: 'Next &raquo;', active: false },
            ],
            current_page: 1,
            last_page: 5,
            per_page: 10,
            total: 48,
            from: 1,
            to: 8,
        }),
    },
    filters: {
        type: Object,
        default: () => ({ status: 'All Invoices' }),
    },
});

const filterStatus = ref(props.filters.status || 'All Invoices');
const itemsPerPage = ref(props.invoices.per_page || 10);

const filterOptions = [
    'All Invoices',
    'Complete',
    'Pending',
    'Failed',
    'Refunded',
];

// Function to apply filters - requires backend integration
const applyFilters = () => {
    router.get(route('tutor.invoices.index'), { // Adjust route name as needed
        status: filterStatus.value === 'All Invoices' ? '' : filterStatus.value,
        page: 1, // Reset to page 1 when filtering
        per_page: itemsPerPage.value,
    }, {
        preserveState: true,
        replace: true,
    });
};

// Function to change items per page - requires backend integration
const changeItemsPerPage = () => {
    router.get(route('tutor.invoices.index'), {
        status: filterStatus.value === 'All Invoices' ? '' : filterStatus.value,
        page: 1, // Reset to page 1
        per_page: itemsPerPage.value,
    }, {
        preserveState: true,
        replace: true,
    });
}

// Format currency helper
const formatCurrency = (value) => {
    return value.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
}

// Format date helper
const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('en-US', options);
}

</script>

<template>
    <div>
        <Breadcrumbs title="Invoices" />

        <div class="py-7">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <div class="p-6 text-gray-900 dark:text-gray-100 w-full">

                    <!-- Header and Filters -->
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-semibold">Invoices</h1>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Filter by:</span>
                            <select v-model="filterStatus" @change="applyFilters"
                                class="block w-full sm:w-48 rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 text-sm">
                                <option v-for="option in filterOptions" :key="option" :value="option">
                                    {{ option }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Invoices Table -->
                    <div class="w-full">
                        <table class="w-full table-auto divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700/50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        #Order Id</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Date</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Student Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Amount</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Tutor Payout</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Status</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                <tr v-if="!props.invoices.data.length">
                                    <td colspan="9"
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-center">
                                        No invoices found.
                                    </td>
                                </tr>
                                <tr v-for="invoice in props.invoices.data" :key="invoice.id"
                                    class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        {{ invoice.order_id }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ formatDate(invoice.date) }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                    :src="invoice.student_image" alt="Student">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 dark:text-white">{{
                                                    invoice.student_name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ formatCurrency(invoice.amount) }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ formatCurrency(invoice.tutor_payout) }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                            :class="{
                                                'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300': invoice.status === 'Complete',
                                                'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300': invoice.status === 'Pending',
                                                'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300': invoice.status === 'Failed' || invoice.status === 'Refunded',
                                                'bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-300': !['Complete', 'Pending', 'Failed', 'Refunded'].includes(invoice.status)
                                            }">
                                            <svg class="-ml-0.5 mr-1.5 h-2 w-2" :class="{
                                                'text-green-400': invoice.status === 'Complete',
                                                'text-yellow-400': invoice.status === 'Pending',
                                                'text-red-400': invoice.status === 'Failed' || invoice.status === 'Refunded',
                                                'text-gray-400': !['Complete', 'Pending', 'Failed', 'Refunded'].includes(invoice.status)
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
                    <div v-if="props.invoices.data.length"
                        class="mt-6 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
                        <div class="flex items-center space-x-2 text-sm text-gray-700 dark:text-gray-400">
                            <span>Show</span>
                            <select v-model="itemsPerPage" @change="changeItemsPerPage"
                                class="block w-20 rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 text-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span>listings per page</span>
                            <span class="hidden sm:inline">| Showing {{ props.invoices.from }} to {{
                                props.invoices.to }} of {{ props.invoices.total }} results</span>
                        </div>
                        <Pagination :links="props.invoices.links" />
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>