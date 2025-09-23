<template>
    <div>
        <!-- Navigation -->
        <nav class="fixed top-0 w-full z-50 bg-white/90 backdrop-blur-xl border-b border-gray-100/50 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <h1 class="text-2xl font-bold text-blue-600">ETeacher</h1>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-8">
                            <Link :href="route('front.home')"
                                class="text-gray-600 hover:text-gray-900 font-medium text-md transition-colors duration-200 relative group">
                            Home</Link>
                            <Link :href="route('front.tutors.index')"
                                class="text-gray-600 hover:text-gray-900 font-medium text-md transition-colors duration-200 relative group">
                            Find a Tutor</Link>
                            <Link :href="route('front.about')"
                                class="text-gray-600 hover:text-gray-900 font-medium text-md transition-colors duration-200 relative group">
                            About</Link>
                            <Link :href="route('front.how-it-works')"
                                class="text-gray-600 hover:text-gray-900 font-medium text-md transition-colors duration-200 relative group">
                            How It Works</Link>
                            <Link :href="route('front.faq')"
                                class="text-gray-600 hover:text-gray-900 font-medium text-md transition-colors duration-200 relative group">
                            FAQ</Link>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <ChangeLocale />
                        <ThemeToggler />
                        <template v-if="!sharedUser">
                            <Link :href="route('login')"
                                class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Login
                            </Link>
                            <Link :href="route('signup')"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                            Sign Up</Link>
                        </template>
                        <template v-else>
                            <NotificationMenu />
                            <Link :href="route('conversations.index')"
                                class="relative flex items-center justify-center text-gray-500 transition-colors bg-white border border-gray-200 rounded-full hover:text-dark-900 h-11 w-11 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                            <ChatIcon />
                            </Link>
                            <UserMenu />
                        </template>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { ChatIcon } from '@/icons'
import { computed } from 'vue';
import UserMenu from '../Dashboard/header/UserMenu.vue';
import ChangeLocale from '../Dashboard/header/ChangeLocale.vue';
import NotificationMenu from '../Dashboard/header/NotificationMenu.vue';
import ThemeToggler from '../Dashboard/header/ThemeToggler.vue';

// reactive reference to props
const page = usePage();

// safely access with optional chaining
const sharedUser = computed(() => page.props.sharedUser?.data ?? null)


</script>