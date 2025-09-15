<template>
    <div class="hidden h-11 items-center gap-0.5 rounded-lg bg-gray-100 p-0.5 lg:inline-flex dark:bg-gray-900">
        <button v-for="option in options" :key="option.value" @click="changeFilterStatus(option.value)"
            class="text-theme-sm h-10 rounded-md px-3 py-2 font-medium hover:text-gray-900 dark:hover:text-white text-gray-500 dark:text-gray-400"
            :class="{
                'shadow-theme-xs text-gray-900 dark:text-white bg-white dark:bg-gray-800': modelValue === option.value,
                'text-gray-500 dark:text-gray-400': modelValue !== option.value
            }">
            {{ option.label }}
        </button>
    </div>
</template>

<script setup>

import { router } from '@inertiajs/vue3';

const props = defineProps({
    url: {
        type: String,
        required: true
    },
    options: {
        type: Array,
        required: true
    },
    modelValue: {
        type: String,
        required: true
    }
});

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

const changeFilterStatus = (status) => {
    router.get(getUrlWithParams(props.url), {
        status: status,
        page: 1,
    }, {
        preserveState: true,
        replace: true,
    });
}

</script>