<template>
    <div class="bg-[#FAF8F5]">
        <Navbar />
        <div class="min-h-screen xl:flex w-full">
            <slot></slot>
        </div>
        <Footer />
    </div>
</template>

<script setup>
import Navbar from './Navbar.vue'
import Footer from './Footer.vue'
import { usePage } from '@inertiajs/vue3';
import { computed, watch } from "vue";
import { useFlash } from "@/Composables/useFlash";

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

<style scoped>

</style>