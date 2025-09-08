<template>
    <div class="min-h-screen xl:flex">
        <app-sidebar />
        <Backdrop />
        <div class="flex-1 transition-all duration-300 ease-in-out"
            :class="[isExpanded || isHovered ? 'lg:ml-[290px]' : 'lg:ml-[90px]']">
            <app-header />
            <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script setup>
import AppSidebar from './AppSidebar.vue'
import AppHeader from './AppHeader.vue'
import { useSidebar } from '@/Composables/useSidebar'
import Backdrop from './Backdrop.vue'
import { usePage } from '@inertiajs/vue3';
import { computed, onMounted, watch } from "vue";
import { useFlash } from "@/Composables/useFlash";

const { isExpanded, isHovered } = useSidebar()

const flash = computed(() => usePage().props.flash);

watch(
    flash,
    (newFlash) => {
        if (newFlash && newFlash.message) {
            console.log('flashed', newFlash.message);
            useFlash().flashFlashMessage(newFlash.message);
        }
    },
    { immediate: true } // Runs the watcher immediately on mount
);


</script>