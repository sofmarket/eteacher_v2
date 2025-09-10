<template>
  <div class="mx-auto mb-2 w-full max-w-60 rounded-2xl bg-gray-50 px-4 pt-5 py-2 text-center dark:bg-white/[0.03]">
    <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">{{ balance }} MAD</h3>
    <p class="mb-4 text-gray-500 text-theme-sm dark:text-gray-400">
      Wallet Balance
    </p>
    <hr class="my-4">
    <a href="#" target="_blank" rel="nofollow"
      class="flex items-center justify-center p-3 font-medium text-white rounded-lg bg-brand-500 text-theme-sm hover:bg-brand-600">
      Withdraw now
    </a>
  </div>

  <Link :href="route('logout')" method="post" as="button"
    class="flex items-center justify-start gap-2 px-3 py-2 mb-4 font-small text-red-600 rounded-lg bg-red-100 text-theme-sm cursor-pointer">
  <span>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
      class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
    </svg>
  </span>
  logout
  </Link>
</template>

<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';


const page = usePage();
const balance = computed(() => page.props.sharedUser?.data?.wallet_balance);

</script>