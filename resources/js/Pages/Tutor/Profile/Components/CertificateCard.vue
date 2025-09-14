<template>
    <div class="mt-4 border rounded-lg border-gray-200 p-5 relative bg-gray-50">
        <h5 class="text-md lg:text-lg font-medium text-gray-800 dark:text-white/90 mb-2">
            {{ certificate.title }}
        </h5>
        <div class="flex flex-col md:flex-row gap-3 lg:gap-5">
            <div class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
                <p class="text-gray-500 text-sm lg:text-md">
                    {{ certificate.institute_name }}
                </p>
            </div>

            <div class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                <p class="text-gray-500 text-sm lg:text-md">
                    {{ $t('tutor.profile.resume_highlights.education.issued') }}: {{ certificate.issue_date }}
                </p>
            </div>

            <div class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                <p class="text-gray-500 text-sm lg:text-md">
                    {{ $t('tutor.profile.resume_highlights.education.expiry') }} : {{ certificate.expiry_date }}
                </p>
            </div>
        </div>

        <button type="button" class="absolute right-3 top-3 text-gray-400 hover:text-gray-500" @click="isDropdownOpen = !isDropdownOpen">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" class="h-4 w-4 fill-current">
                <path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/>
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div v-if="isDropdownOpen" class="absolute right-0 top-8 mt-2 w-48 rounded-md bg-white z-10">
            <div class="py-1" role="menu" aria-orientation="vertical">
                <button class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center gap-2" role="menuitem" @click="$emit('edit', certificate)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    {{ $t('tutor.profile.actions.edit') }}
                </button>
                <button class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 flex items-center gap-2" role="menuitem" @click="$emit('delete', certificate)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 6h18"></path>
                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                    </svg>
                    {{ $t('tutor.profile.actions.delete') }}
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const props = defineProps({
    certificate: {
        type: Object,
        required: true
    }
});

const emit = defineEmits(['edit', 'delete']);

const isDropdownOpen = ref(false);

// Close dropdown when clicking outside
const handleClickOutside = (event) => {
    if (!event.target.closest('.relative')) {
        isDropdownOpen.value = false;
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});
</script> 