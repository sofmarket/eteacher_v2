<template>
    <div class="relative" ref="dropdownRef">
        <button
            class="relative flex items-center justify-center text-gray-500 transition-colors bg-white border border-gray-200 rounded-full hover:text-dark-900 h-11 w-11 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white"
            @click="toggleDropdown">
            <img :src="currentLocaleIcon" :alt="locale" class="w-7 h-7">
        </button>

        <!-- Dropdown Start -->
        <div v-if="dropdownOpen"
            class="absolute right-0 mt-[17px] flex w-[160px] flex-col rounded-2xl border border-gray-200 bg-white p-3 shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark">
            <ul class="flex flex-col gap-1 pt-4 pb-3">
                <li v-for="language in languages" :key="language.code" @click="loadLocale(language.code)">
                    <a href="javascript:void(0);" class="flex items-center gap-3 px-3 py-2 font-medium text-gray-700 rounded-lg group text-theme-sm hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                        <img :src="language.icon" :alt="language.name" class="w-7 h-7">
                        <span class="font-medium text-gray-700 rounded-lg group text-theme-sm hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                            {{ language.name }}
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue'
import { usePage, router } from "@inertiajs/vue3";

// Import SVG icons
import enIcon from '@/assets/icons/en.svg'
import arIcon from '@/assets/icons/ar.svg'
import frIcon from '@/assets/icons/fr.svg'

const dropdownOpen = ref(false)
const locale = computed(() => usePage().props.locale);
const dropdownRef = ref(null)

const languages = [
    { name: 'English', code: 'en', icon: enIcon },
    { name: 'Arabic', code: 'ar', icon: arIcon },
    { name: 'French', code: 'fr', icon: frIcon }
];

const currentLocaleIcon = computed(() => {
    return languages.find(language => language.code === locale.value)?.icon;
});

const loadLocale = (locale) => {
    router.get(route('change-locale', { locale: locale }));
    closeDropdown();
}

const toggleDropdown = () => {
    dropdownOpen.value = !dropdownOpen.value
}

const closeDropdown = () => {
    dropdownOpen.value = false
}

const handleClickOutside = (event) => {
    if (dropdownRef.value && !dropdownRef.value.contains(event.target)) {
        closeDropdown()
    }
}

onMounted(() => {
    document.addEventListener('click', handleClickOutside)
})

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside)
})
</script>