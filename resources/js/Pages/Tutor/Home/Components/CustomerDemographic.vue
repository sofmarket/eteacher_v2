<template>
  <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] sm:p-6">
    <div class="flex justify-between">
      <div>
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
          {{ $t('tutor.home.customer_demographic.title') }}
        </h3>
        <p class="mt-1 text-gray-500 text-theme-sm dark:text-gray-400">
          {{ $t('tutor.home.customer_demographic.description') }}
        </p>
      </div>
    </div>
    <div class="space-y-5 mt-6 h-[380px] overflow-y-auto">
      <div class="flex items-center justify-between" v-for="region in regions">
        <div>
          <p class="font-semibold text-gray-800 text-theme-sm dark:text-white/90">{{ region }}</p>
          <span class="block text-gray-500 text-theme-xs dark:text-gray-400">
            589 {{ $t('tutor.home.customer_demographic.customers') }}
          </span>
        </div>
        <div class="flex w-full max-w-[140px] items-center gap-3">
          <div class="relative block h-2 w-full max-w-[100px] rounded-sm bg-gray-200 dark:bg-gray-800">
            <div
              class="absolute left-0 top-0 flex h-full w-[23%] items-center justify-center rounded-sm bg-brand-500 text-xs font-medium text-white">
            </div>
          </div>
          <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">23%</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const regions = [
  'Tangier-Tetouan-Al Hoceima',
  'Fez-Meknes',
  'Rabat-Salé-Kénitra',
  'Béni Mellal-Khénifra',
  'Marrakech-Safi',
  'Souss-Massa',
  'Drâa-Tafilalet',
  'Guelmim-Oued Noun',
  'Oriental',
]
</script>
