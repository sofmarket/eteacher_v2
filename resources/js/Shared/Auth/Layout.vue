<template>
    <div class="min-h-screen">
        <main>
            <div class="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">
                <div class="relative flex flex-col justify-center w-full h-screen lg:flex-row dark:bg-gray-900">
                    <div class="flex flex-col flex-1 w-full lg:w-1/2">
                        <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
                            <slot></slot>
                        </div>
                    </div>
                    <div
                        class="relative items-center hidden w-full h-full lg:w-1/2 bg-brand-950 dark:bg-white/5 lg:grid">
                        <div class="flex items-center justify-center z-1">
                            <common-grid-shape />
                            <div class="flex flex-col items-center max-w-xs">
                                <Link href="/" class="block mb-4">
                                <img width="300" height="100" src="@/assets/images/logo/logo.png" alt="Logo" />
                                </Link>
                                <p class="text-center text-gray-400 dark:text-white/60">
                                    Empowering Energy Education 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import CommonGridShape from '@/Components/common/CommonGridShape.vue'
import { Link } from '@inertiajs/vue3'
</script>

