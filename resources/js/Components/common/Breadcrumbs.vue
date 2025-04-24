<template>
    <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageTitle">{{ title }}</h2>
            <nav>
                <ol class="flex items-center gap-1.5">
                    <li><a href="/" class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400">
                            Home <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="" stroke-width="1.2"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></a></li>
                    <li class="text-sm text-gray-800 dark:text-white/90">{{ title }}</li>
                </ol>
            </nav>
        </div>
</template>

<script setup>

const props = defineProps({
  title: {
    type: String,
    required: true,
  }
});

</script>

