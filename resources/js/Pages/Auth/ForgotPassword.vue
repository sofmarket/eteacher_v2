<template>
    <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
        <div class="mb-5 sm:mb-8">
            <h1 class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md"> Forgot Your
                Password? </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400"> Enter the email address linked to your account, and
                we'll send you a link to reset your password. </p>
        </div>
        <div>
            <form @submit.prevent="handleSubmit">
                <div class="space-y-5">

                    <!-- Email -->
                    <UniversalInput :label="$t('email')" :placeholder="$t('email')" v-model="loginForm.username"
                        :errors="loginForm.errors.username" parentClasses="mb-3" dir="ltr" :required="true" />

                    <button type="submit"
                        class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                        Send Reset Link </button>
                    
                </div>
            </form>
            <div class="mt-5">
                <p class="text-sm font-normal text-center text-gray-700 dark:text-gray-400 sm:text-start"> Wait, I
                    remember my password... <Link href="/login"
                        class="text-brand-500 hover:text-brand-600 dark:text-brand-400">Click here</Link></p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3"
import UniversalInput from '@/Components/forms/FormElements/UniversalInput.vue'
import { usePage } from '@inertiajs/vue3'

const form = useForm({
    username: '',
})

function handleSubmit() {
    form.post(route('forgot-password'))
}
</script>