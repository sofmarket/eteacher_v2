<script setup>
import { Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    pager: {
        type: Object,
        required: true,
    },
});

const itemsPerPage = ref(props.pager.per_page);

const changeItemsPerPage = () => {
    router.get(getUrlWithParams(props.pager.path), {
        per_page: itemsPerPage.value,
    }, {
        preserveState: true,
        replace: true,
    });
};

const getUrlWithParams = (url) => {
    if (!url) return null;

    const urlObj = new URL(url);
    const currentParams = new URLSearchParams(urlObj.search);

    const pageParams = new URLSearchParams(window.location.search);

    pageParams.forEach((value, key) => {
        if (!currentParams.has(key)) {
            currentParams.set(key, value);
        }
    });

    return `${urlObj.pathname}?${currentParams.toString()}`;
};
</script>

<template>
    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700" v-if="pager.total > 0">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between py-3">
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
                <span class="hidden sm:inline">| {{ $t('tutor.payouts.pagination.showing_results', {
                    from:
                        pager.from, to: pager.to, total: pager.total
                }) }}</span>
            </div>
            <div v-if="pager.links.length > 3" class="flex items-center space-x-1">
                <template v-for="(link, key) in pager.links" :key="key">
                    <div v-if="link.url === null"
                        class="px-3 py-1.5 text-sm leading-4 text-gray-400 dark:text-gray-500 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800"
                        v-html="link.label" />
                    <Link v-else
                        class="px-3 py-1.5 text-sm leading-4 border border-gray-300 dark:border-gray-600 rounded focus:outline-none focus:border-indigo-500 focus:text-indigo-500 dark:focus:border-indigo-700 dark:focus:text-indigo-400"
                        :class="{
                            'bg-gray-900 dark:bg-gray-700 text-white dark:text-gray-200': link.active,
                            'bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300': !link.active
                        }" :href="getUrlWithParams(link.url)" v-html="link.label" />
                </template>
            </div>
        </div>
    </div>
</template>