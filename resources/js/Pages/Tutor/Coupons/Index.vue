<template>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">All Coupons</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Browse and manage all your certificates conveniently in one place.
                    </p>
                </div>
                <button
                    class="inline-flex items-center px-4 py-2 bg-[#2B5F4A] hover:bg-[#224b3a] text-white text-sm font-medium rounded-lg">
                    <span class="mr-2">Create Coupon</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="p-6">
                    <!-- Search and Filters -->
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0 mb-6">
                        <!-- Search -->
                        <div class="w-full sm:w-96">
                            <div class="relative">
                                <input v-model="searchQuery" type="text" placeholder="Search by keyword" class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg 
                                    focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-transparent
                                    bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100" />
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Tabs -->
                        <div class="flex rounded-lg border border-gray-200 dark:border-gray-700">
                            <button @click="activeTab = 'active'" :class="[
                                'px-4 py-2 text-sm font-medium rounded-l-lg',
                                activeTab === 'active'
                                    ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400'
                                    : 'bg-white text-gray-700 hover:text-gray-900 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-white'
                            ]">
                                Active
                            </button>
                            <button @click="activeTab = 'inactive'" :class="[
                                'px-4 py-2 text-sm font-medium rounded-r-lg border-l border-gray-200 dark:border-gray-700',
                                activeTab === 'inactive'
                                    ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400'
                                    : 'bg-white text-gray-700 hover:text-gray-900 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-white'
                            ]">
                                In Active
                            </button>
                        </div>
                    </div>

                    <!-- Updated Coupons Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        <div v-for="coupon in filteredCoupons" :key="coupon.id" class="max-w-md mx-auto w-full">
                            <div class="rounded-lg overflow-hidden shadow-lg">
                                <!-- Top section with discount -->
                                <div class="bg-black text-white p-4 relative">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <span class="text-3xl font-bold">{{ coupon.discount }}</span>
                                            <span class="text-xl mx-2">% OFF</span>
                                            <div class="mt-1">
                                                <p class="text-gray-200 truncate">Course: <em class="elipsis">{{ coupon.courseName }}</em></p>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Dotted divider -->
                                    <div id="dotted-divider" class="border-black"></div>
                                </div>


                                <!-- Bottom section with coupon code -->
                                <div class="bg-gray-100 p-4">
                                    <p class="text-gray-600 mb-2">Coupon Code</p>
                                    <div class="flex items-center">
                                        <span class="text-xl font-semibold text-gray-700 mr-2">{{ coupon.code }}</span>
                                        <button @click="copyCode(coupon.code, coupon.id)"
                                            class="text-gray-500 hover:text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                            </svg>
                                        </button>
                                        <span v-if="copiedId === coupon.id"
                                            class="ml-2 text-sm text-green-600">Copied!</span>
                                    </div>
                                    <p class="text-gray-600 mt-2">Valid until: {{ coupon.validUntil }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';
import { ref, computed } from 'vue';

const searchQuery = ref('');
const activeTab = ref('active');
const copiedId = ref(null);

// Sample data - replace with actual data from your backend
const coupons = ref([
    {
        id: 1,
        discount: 100,
        discountType: '%',
        code: 'JST',
        courseName: 'Leadership Essentials: Inspiring and Motivating Others',
        validUntil: '30 Apr 2026',
        status: 'active'
    },
    // Add more sample coupons as needed
]);

const copyCode = (code, id) => {
    navigator.clipboard.writeText(code);
    copiedId.value = id;
    setTimeout(() => {
        copiedId.value = null;
    }, 2000);
};

const filteredCoupons = computed(() => {
    return coupons.value.filter(coupon => {
        const matchesSearch = searchQuery.value === '' ||
            coupon.code.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            coupon.courseName.toLowerCase().includes(searchQuery.value.toLowerCase());
        const matchesTab = activeTab.value === 'all' ||
            (activeTab.value === 'active' && coupon.status === 'active') ||
            (activeTab.value === 'inactive' && coupon.status === 'inactive');
        return matchesSearch && matchesTab;
    });
});
</script>

<style scoped>
#dotted-divider {
    z-index: 0;
    right: 0px;
    height: 6px;
    width: 100%;
    content: "";
    bottom: -4px;
    position: absolute;
    border-bottom: 8px dotted transparent;
    border-color: #101828;
}
</style>

