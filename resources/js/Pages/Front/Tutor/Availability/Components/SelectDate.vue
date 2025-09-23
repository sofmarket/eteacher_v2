<template>
    <div class="relative input-group">
        <button data-toggle
            class="flex items-center gap-6 bg-white border border-gray-300 hover:border-gray-400 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors">
            {{ weekRage }}
            <svg class="w-4 h-4" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
        </button>
        <flat-pickr
            v-model="selectedDate"
            :config="config" 
            class="invisible absolute inset-0"
            @change="handleDateChange" 
        />
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';
import flatPickr from 'vue-flatpickr-component';

const props = defineProps({
    weekRage: String,
    currentDate: Date,
});

const selectedDate = ref(null);

const emit = defineEmits(['change'])

const config = ref({
    wrap: true, // set wrap to true only when using 'input-group'
    altFormat: 'M j, Y',
    altInput: true,
    dateFormat: 'Y-m-d',
    locale: 'en', // locale for this instance only     
    minDate: 'today'
});

var skipWatcher = false;

const handleDateChange = (e) => {
    if (skipWatcher) {
        skipWatcher = false;
        return;
    }
    emit('change', new Date(selectedDate.value));
}

watch(() => props.currentDate, (newValue) => {
    skipWatcher = true;
    selectedDate.value = newValue;
});

</script>