<template>
    <div>
        <label v-if="label" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            {{ label }}
        </label>
        <div class="relative">
            <flat-pickr
                v-model="dateValue"
                :config="flatpickrConfig"
                :placeholder="placeholder"
                :disabled="disabled"
                class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pl-4 pr-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800 disabled:opacity-50 disabled:cursor-not-allowed"
                :class="{ 'border-red-500 focus:border-red-500 focus:ring-red-500/10': errors }"
            />
            <span
                class="absolute text-gray-500 -translate-y-1/2 pointer-events-none right-3 top-1/2 dark:text-gray-400"
            >
                <svg
                    class="fill-current"
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M6.66659 1.5415C7.0808 1.5415 7.41658 1.87729 7.41658 2.2915V2.99984H12.5833V2.2915C12.5833 1.87729 12.919 1.5415 13.3333 1.5415C13.7475 1.5415 14.0833 1.87729 14.0833 2.2915V2.99984L15.4166 2.99984C16.5212 2.99984 17.4166 3.89527 17.4166 4.99984V7.49984V15.8332C17.4166 16.9377 16.5212 17.8332 15.4166 17.8332H4.58325C3.47868 17.8332 2.58325 16.9377 2.58325 15.8332V7.49984V4.99984C2.58325 3.89527 3.47868 2.99984 4.58325 2.99984L5.91659 2.99984V2.2915C5.91659 1.87729 6.25237 1.5415 6.66659 1.5415ZM6.66659 4.49984H4.58325C4.30711 4.49984 4.08325 4.7237 4.08325 4.99984V6.74984H15.9166V4.99984C15.9166 4.7237 15.6927 4.49984 15.4166 4.49984H13.3333H6.66659ZM15.9166 8.24984H4.08325V15.8332C4.08325 16.1093 4.30711 16.3332 4.58325 16.3332H15.4166C15.6927 16.3332 15.9166 16.1093 15.9166 15.8332V8.24984Z"
                        fill=""
                    />
                </svg>
            </span>
        </div>
        <p class="text-error-500 mt-2 text-sm" v-if="errors" v-cloak>{{ errors }}</p>
        <!-- <p v-else-if="helpText" class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ helpText }}</p> -->
    </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue'
import flatPickr from 'vue-flatpickr-component'
// import 'flatpickr/dist/flatpickr.css'
import 'flatpickr/dist/themes/light.css'

const props = defineProps({
    modelValue: {
        type: [String, Date, null],
        default: null
    },
    label: {
        type: String,
        default: ''
    },
    placeholder: {
        type: String,
        default: 'Select date'
    },
    disabled: {
        type: Boolean,
        default: false
    },
    errors: {
        type: String,
      },
    helpText: {
        type: String,
        default: ''
    },
    dateFormat: {
        type: String,
        default: 'Y-m-d'
    },
    altFormat: {
        type: String,
        default: 'F j, Y'
    },
    enableTime: {
        type: Boolean,
        default: false
    },
    time24hr: {
        type: Boolean,
        default: false
    },
    minDate: {
        type: [String, Date],
        default: null
    },
    maxDate: {
        type: [String, Date],
        default: null
    },
    allowInput: {
        type: Boolean,
        default: false
    },
    clickOpens: {
        type: Boolean,
        default: true
    }
})

const emit = defineEmits(['update:modelValue', 'change'])

const dateValue = ref(props.modelValue)

// Watch for external changes to modelValue
watch(() => props.modelValue, (newValue) => {
    dateValue.value = newValue
})

// Watch for internal changes and emit events
watch(dateValue, (newValue) => {
    emit('update:modelValue', newValue)
    emit('change', newValue)
})

const flatpickrConfig = computed(() => ({
    dateFormat: props.dateFormat,
    altInput: true,
    altFormat: props.altFormat,
    enableTime: props.enableTime,
    time_24hr: props.time24hr,
    minDate: props.minDate,
    maxDate: props.maxDate,
    allowInput: props.allowInput,
    clickOpens: props.clickOpens,
    wrap: false
}))
</script>