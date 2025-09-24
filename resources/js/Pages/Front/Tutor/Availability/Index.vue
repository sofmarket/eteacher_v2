<template>
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Book a session</h1>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                Request a Session
            </button>
        </div>

        <!-- Date Selection Controls -->
        <div class="mb-6 flex justify-between">
            <div class="flex gap-3">
                <button @click="goToToday"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors">
                    Today
                </button>
                <SelectDate :currentDate="currentDate" :weekRage="weekRange" @change="handleDateChange" />
            </div>
            <div class="flex items-center gap-3">
                <div
                    class="border border-gray-300 rounded-lg p-1 bg-white text-gray-500 cursor-pointer hover:text-gray-700 transition-colors">
                    <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.75001 19L6.75001 12M17.25 19V12M11.9999 19V17.25M6.75001 6.75V5M6.75001 6.75C7.71652 6.75 8.50002 7.5335 8.50002 8.5C8.50002 9.4665 7.71652 10.25 6.75001 10.25C5.78351 10.25 5 9.4665 5 8.5C5 7.5335 5.78351 6.75 6.75001 6.75ZM17.25 6.75V5M17.25 6.75C18.2165 6.75 19 7.5335 19 8.5C19 9.4665 18.2165 10.25 17.25 10.25C16.2835 10.25 15.5 9.4665 15.5 8.5C15.5 7.5335 16.2835 6.75 17.25 6.75ZM11.9999 12L11.9999 5M11.9999 12C12.9665 12 13.75 12.7835 13.75 13.75C13.75 14.7165 12.9665 15.5 11.9999 15.5C11.0334 15.5 10.2499 14.7165 10.2499 13.75C10.2499 12.7835 11.0334 12 11.9999 12Z"
                            stroke="#464455" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Weekly Calendar View -->
        <div class="bg-white border border-gray-200 rounded-lg p-4 h-[75vh] relative">
            <div class="flex items-start justify-between">
                <button @click="navigateWeek(-1)" 
                        :disabled="!canNavigatePrevious"
                        class="py-5 px-2 rounded-lg transition-colors mt-5"
                        :class="canNavigatePrevious ? 'hover:bg-gray-100 cursor-pointer' : 'cursor-not-allowed opacity-50'">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15,18 9,12 15,6"></polyline>
                    </svg>
                </button>

                <div class="grid grid-cols-7 gap-4 w-full">
                    <div v-for="day in weekDays" :key="day.date.toISOString()" class="text-center">
                        <div class="text-sm font-medium mb-2 flex flex-col items-center justify-center rounded-lg p-5"
                            :class="{
                                'bg-slate-100': day.isSelected,
                                'text-gray-700': !day.isSelected && !day.isBeforeToday,
                                'text-gray-400': day.isBeforeToday
                            }">
                            <strong>{{ day.number }} {{ day.monthName }}</strong>
                            <span class="text-sm">{{ day.dayName }}</span>
                        </div>
                        <div class="w-full">
                            <div v-if="getSlotsForDate(day.date).length > 0" class="space-y-2">
                                <div v-for="slot in getSlotsForDate(day.date)" :key="slot.id || slot.date + slot.time"
                                     class="px-2 py-1 rounded text-xs font-medium transition-colors cursor-pointer bg-blue-50 hover:bg-blue-100 text-blue-600 border border-blue-200"
                                     >
                                       <!--:class="{
                                            //  'bg-blue-50 hover:bg-blue-100 text-blue-600 border border-blue-200'
                                            //  'bg-green-50 hover:bg-green-100 text-green-600 border border-green-200': !day.isSelected && !day.isBeforeToday,
                                            //  'bg-gray-50 text-gray-400 cursor-not-allowed': day.isBeforeToday
                                        }-->
                                    <div class="text-center py-1 select-none" @click="bookSlot(slot)">
                                        <div v-if="slot.time" class="font-semibold">{{ slot.time }}</div>
                                        <div v-else class="font-semibold">Available</div>
                                        <div v-if="slot.available_spaces" class="text-xs opacity-75">{{ slot.available_spaces }}/{{ slot.spaces }}</div>
                                    </div>
                                </div>
                            </div>
                            <div v-else class="px-3 py-4 rounded-lg text-sm font-medium transition-colors select-none"
                                 :class="{
                                     'bg-gray-100 hover:bg-gray-200 text-gray-600': !day.isBeforeToday,
                                     'bg-gray-50 text-gray-400 cursor-not-allowed': day.isBeforeToday
                                 }">
                                {{ day.isBeforeToday ? 'Past' : 'No sessions' }}
                            </div>
                        </div>
                    </div>
                </div>

                <button @click="navigateWeek(1)" 
                        :disabled="!canNavigateNext"
                        class="py-5 px-2 rounded-lg transition-colors mt-5"
                        :class="canNavigateNext ? 'hover:bg-gray-100 cursor-pointer' : 'cursor-not-allowed opacity-50'">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9,18 15,12 9,6"></polyline>
                    </svg>
                </button>
            </div>
            <div class="absolute top-0 right-0 left-0 bottom-0 bg-black opacity-25" v-if="precessing">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <div class="w-10 h-10">
                        <svg width="60" height="60" viewBox="0 0 44 44">
                            <circle cx="22" cy="22" r="20" fill="none" stroke="#E5E7EB" stroke-width="4"></circle>
                            <circle cx="22" cy="22" r="20" fill="none" stroke="#1447e6" stroke-width="4" stroke-dasharray="125.6" stroke-dashoffset="125.6">
                                <animate attributeName="stroke-dashoffset" values="125.6;0" dur="1s" repeatCount="indefinite"></animate>
                            </circle>
                        </svg>
                    </div>
                </div>
            </div>
        </div>


        <div class="w-full mt-6 flex justify-end">
            <button class="bg-blue-500 rounded-lg p-1.5">
                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 7C12.5523 7 13 7.44772 13 8V13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13V8C11 7.44772 11.4477 7 12 7Z"
                        fill="#ffffff" />
                    <path
                        d="M12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z"
                        fill="#ffffff" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12Z"
                        fill="#ffffff" />
                </svg>
            </button>
        </div>

    </div>
</template>

<script setup>
import { computed, ref, watch } from 'vue';
import SelectDate from './Components/SelectDate.vue';
import axios from 'axios';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const slug = computed(() => page.props.slug);

const precessing = ref(false);
const currentDate = ref(new Date());
currentDate.value.setHours(0, 0, 0, 0);
const slots = ref([]);
const numDays = ref(4);

const weekDays = computed(() => {
    const today = new Date(currentDate.value);
    const currentDay = today.getDay(); // 0 for Sunday, 1 for Monday, etc.

    // Calculate the start of the week (Sunday)
    const startOfWeek = new Date(today);
    startOfWeek.setDate(today.getDate() - currentDay);

    const days = [];
    const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    const now = new Date();
    now.setHours(0, 0, 0, 0);

    // Generate 7 days starting from Sunday
    for (let i = 0; i < numDays.value; i++) {
        const day = new Date(startOfWeek);
        day.setDate(startOfWeek.getDate() + i);

        const isToday = day.toDateString() === new Date().toDateString();
        const isSelected = day.toDateString() === currentDate.value.toDateString();
        const isBeforeToday = day < now;

        days.push({
            date: day,
            number: day.getDate(),
            dayName: dayNames[i],
            monthName: monthNames[day.getMonth()],
            isToday,
            isSelected,
            isBeforeToday
        });
    }

    return days;
});

const weekRange = computed(() => {
    if (weekDays.value.length === 0) return '';

    const firstDay = weekDays.value[0];
    const lastDay = weekDays.value[numDays.value - 1];

    if (firstDay.date.getMonth() === lastDay.date.getFullYear() && firstDay.date.getMonth() === lastDay.date.getMonth()) {
        return `${firstDay.monthName} ${firstDay.number} - ${lastDay.number} ${firstDay.date.getFullYear()}`;
    } else {
        return `${firstDay.monthName} ${firstDay.number} - ${lastDay.monthName} ${lastDay.number} ${firstDay.date.getFullYear()}`;
    }
});

const navigateWeek = (direction) => {
    // Prevent navigation to previous week if not allowed
    if (direction === -1 && !canNavigatePrevious.value) {
        return;
    }
    
    // Prevent navigation to next week if not allowed (though currently always allowed)
    if (direction === 1 && !canNavigateNext.value) {
        return;
    }
    
    const newDate = new Date(currentDate.value);
    newDate.setDate(newDate.getDate() + (direction * numDays.value));
    currentDate.value = newDate;
};

const goToToday = () => {
    currentDate.value = new Date();
    currentDate.value.setHours(0, 0, 0, 0);
};

// Check if we can navigate to previous week (disable if current week contains today or earlier)
const canNavigatePrevious = computed(() => {
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    const currentWeekStart = new Date(currentDate.value);
    const currentDay = currentWeekStart.getDay();
    currentWeekStart.setDate(currentWeekStart.getDate() - currentDay);
    
    // If the current week starts on or after today, we can go back
    return currentWeekStart > today;
});

// Check if we can navigate to next week (always allow forward navigation)
const canNavigateNext = computed(() => {
    return true; // Always allow forward navigation
});

const handleDateChange = (newValue) => {
    currentDate.value = newValue;
}

const formatDate = (dateString) => {
    const date = new Date(dateString);
    const options = { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    };
    return date.toLocaleDateString('en-US', options);
}

const getSlotsForDate = (date) => {
    const dateString = date.toISOString().split('T')[0]; // Get YYYY-MM-DD format
    return slots.value.filter(slot => slot.date === dateString);
}

watch(currentDate, () => {

    precessing.value = true;
    
    let firstDay = weekDays.value[0];
    let lastDay = weekDays.value[numDays.value - 1];

    axios.get(route('front.tutors.availability', {
        slug: slug.value
    }), {
        params: {
            first_day: firstDay.date.toISOString(),
            last_day: lastDay.date.toISOString()
        }
    }).then((response) => {
        slots.value = response.data.slots || [];
    }).finally(() => {
        precessing.value = false;
    });

});

const bookSlot = (slot) => {
    console.log(slot);
}

</script>