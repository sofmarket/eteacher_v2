<template>
  <div class="fixed inset-0 flex items-center justify-center overflow-y-auto z-99999" v-if="modalActive">
    <div v-if="fullScreenBackdrop" class="fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"
      aria-hidden="true"></div>

    <div class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999">
      <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
      <div class="relative w-full max-w-[600px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
        <!-- close btn -->
        <button @click="$emit('close')"
          class="absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11">
          <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z"
              fill=""></path>
          </svg>
        </button>

        <div>
          <h4 class="font-semibold text-gray-800 mb-7 text-title-sm dark:text-white/90">
            {{ title }}
          </h4>

          <slot name="body"></slot>

          <div class="flex items-center justify-end w-full gap-3 mt-8">
            <button @click="$emit('reset')" type="button"
              class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:w-auto">
              Close
            </button>
            <button type="button" @click="$emit('submit')"
              class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600 sm:w-auto">
              Save Changes
            </button>
          </div>
        </div>
      </div>
      <div v-if="loading" class="absolute w-full h-full flex items-center justify-center z-9999999">
        <div class="w-10 h-10">
          <svg width="60" height="60" viewBox="0 0 44 44">
            <circle cx="22" cy="22" r="20" fill="none" stroke="#E5E7EB" stroke-width="4"></circle>
            <circle cx="22" cy="22" r="20" fill="none" stroke="#60A5FA" stroke-width="4" stroke-dasharray="125.6"
              stroke-dashoffset="125.6">
              <animate attributeName="stroke-dashoffset" values="125.6;0" dur="2s" repeatCount="indefinite"></animate>
            </circle>
          </svg>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>

const props = defineProps({
  fullScreenBackdrop: {
    type: Boolean,
    default: false,
  },
  modalActive: {
    type: Boolean,
    default: false,
  },
  title: {
    type: String,
    default: '',
  },
  loading: {
    type: Boolean,
    default: false,
  },
})

defineEmits(['close', 'submit', 'reset']);

</script>

<style scoped>
.backdrop-blur-\[32px\] {
  --tw-backdrop-blur: blur(32px);
  -webkit-backdrop-filter: var(--tw-backdrop-blur, ) var(--tw-backdrop-brightness, ) var(--tw-backdrop-contrast, ) var(--tw-backdrop-grayscale, ) var(--tw-backdrop-hue-rotate, ) var(--tw-backdrop-invert, ) var(--tw-backdrop-opacity, ) var(--tw-backdrop-saturate, ) var(--tw-backdrop-sepia, );
  backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
}
</style>