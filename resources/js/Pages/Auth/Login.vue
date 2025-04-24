<template>
    <div>
        <div class="mb-5 sm:mb-8">
            <h1 class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md">
                Sign In
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Enter your email and password to sign in!
            </p>
        </div>
        <div>

            <form @submit.prevent="handleSubmit">
                <div class="space-y-5">

                    <!-- Email -->
                    <UniversalInput :label="$t('email')" :placeholder="$t('email')"
                        v-model="loginForm.username" :errors="loginForm.errors.username" dir="ltr"
                        :required="true" :inline="false" />

                    <!-- Password -->
                    <PasswordInput :label="$t('password')" :placeholder="$t('password')" v-model="loginForm.password"
                        :errors="loginForm.errors.password" :required="true" />

                    <!-- Checkbox -->
                    <div class="flex items-center justify-between">
                        <div>
                            <label for="keepLoggedIn"
                                class="flex items-center text-sm font-normal text-gray-700 cursor-pointer select-none dark:text-gray-400">
                                <div class="relative">
                                    <input v-model="keepLoggedIn" type="checkbox" id="keepLoggedIn" class="sr-only" />
                                    <div :class="keepLoggedIn
                                        ? 'border-brand-500 bg-brand-500'
                                        : 'bg-transparent border-gray-300 dark:border-gray-700'
                                        "
                                        class="mr-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]">
                                        <span :class="keepLoggedIn ? '' : 'opacity-0'">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="white"
                                                    stroke-width="1.94437" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                Keep me logged in
                            </label>
                        </div>
                        <Link href="/forgot-password"
                            class="text-sm text-brand-500 hover:text-brand-600 dark:text-brand-400">
                        Forgot
                        password?</Link>
                    </div>

                    <!-- Button -->
                    <div>
                        <button type="submit"
                            class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                            Sign In
                        </button>
                    </div>

                </div>
            </form>

            <div class="mt-5">
                <p class="text-sm font-normal text-center text-gray-700 dark:text-gray-400 sm:text-start">
                    Don't have an account?
                    <Link href="/signup" class="text-brand-500 hover:text-brand-600 dark:text-brand-400">Sign
                    Up</Link>
                </p>
            </div>
            
            <SigninWithGoogle />

        </div>
    </div>
</template>

<script setup>

import { ref } from 'vue'
import { Link, useForm } from "@inertiajs/vue3"
import UniversalInput from '@/Components/forms/FormElements/UniversalInput.vue'
import PasswordInput from '@/Components/forms/FormElements/PasswordInput.vue'
import SigninWithGoogle from './Components/SigninWithGoogle.vue'

const keepLoggedIn = ref(false)

const loginForm = useForm({
    username: 'tutor@test.com',
    password: '',
    remember: false
});

function handleSubmit() {
    loginForm.post('/login'); // route('front.login')
};

</script>