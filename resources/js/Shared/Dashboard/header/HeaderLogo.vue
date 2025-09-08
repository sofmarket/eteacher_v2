<template>
  <Link :href="route('tutor.home')" class="lg:hidden">
  <img class="dark:hidden" src="@/assets/images/logo/logo.png" alt="Logo" />
  <img class="hidden dark:block" src="@/assets/images/logo/logo.png" alt="Logo" />
  </Link>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
