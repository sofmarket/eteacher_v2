<template>

    <div class="py-5">
        <div class="mb-5 sm:mb-8">
            <h1 class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md">
                {{ $t('auth.signup.title') }}
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ $t('auth.signup.description') }}
            </p>
        </div>
        <div>
            <form @submit.prevent="handleSubmit">
                <div class="space-y-5">

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <!-- First Name -->
                            <UniversalInput :label="$t('first_name')" :placeholder="$t('first_name')"
                                v-model="signupForm.first_name" :errors="signupForm.errors.first_name" :required="true" />
                        </div>
                        <div class="sm:col-span-1">
                            <!-- Last Name -->
                            <UniversalInput :label="$t('last_name')" :placeholder="$t('last_name')"
                                v-model="signupForm.last_name" :errors="signupForm.errors.last_name" :required="true" />
                        </div>
                    </div>

                    <!-- Email -->
                    <UniversalInput :label="$t('email')" :placeholder="$t('email')" v-model="signupForm.email"
                        :errors="signupForm.errors.email" dir="ltr" :required="true" />

                    <!-- Password -->
                    <PasswordInput :label="$t('password')" :placeholder="$t('password')" v-model="signupForm.password"
                        :errors="signupForm.errors.password" dir="ltr" :required="true" />

                    <!-- Password Confirmation -->
                    <PasswordInput :label="$t('password_confirmation')" :placeholder="$t('password_confirmation')"
                        v-model="signupForm.password_confirmation" dir="ltr" :required="true" />

                    <div><label for="checkboxLabelOne"
                            class="flex items-start text-sm font-normal text-gray-700 cursor-pointer select-none dark:text-gray-400">
                            <div class="relative"><input type="checkbox" id="checkboxLabelOne" class="sr-only">
                                <div
                                    class="bg-transparent border-gray-300 dark:border-gray-700 mr-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]">
                                    <span class="opacity-0"><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="white"
                                                stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg></span>
                                </div>
                            </div>
                            <p class="inline-block font-normal text-gray-500 dark:text-gray-400"> {{ $t('auth.signup.terms_conditions') }} <span class="text-gray-800 dark:text-white/90"> {{ $t('auth.signup.terms_conditions_link') }} </span> {{ $t('auth.signup.privacy_policy') }} <span class="text-gray-800 dark:text-white"> {{ $t('auth.signup.privacy_policy_link') }} </span></p>
                        </label></div>

                    <!-- Button -->
                    <div>
                        <button type="submit"
                            class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                            {{ $t('auth.signup.sign_up_button') }}
                        </button>
                    </div>

                </div>
            </form>

            <div class="mt-5">
                <p class="text-sm font-normal text-center text-gray-700 dark:text-gray-400 sm:text-start">
                    {{ $t('auth.signup.have_account') }}
                    <Link href="/login" class="text-brand-500 hover:text-brand-600 dark:text-brand-400">{{ $t('auth.signup.login_link') }}</Link>
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
const signupForm = useForm({
    email: null,
    first_name: null,
    last_name: null,
    phone: null,
    password: null,
    password_confirmation: null,
});

function handleSubmit() {
    signupForm.post('/signup'); // route('front.login')
};

</script>