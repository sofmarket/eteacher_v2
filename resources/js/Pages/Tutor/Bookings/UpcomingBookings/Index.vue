<template>
    <div>

        <Breadcrumbs title="Upcoming Bookings" />

        <RoutedTabs :tabs="tabs">

            <div>
                <!-- Header Controls -->
                <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
                    <!-- Date Navigation & Display -->
                    <div class="flex items-center space-x-2">
                        <button @click="previous" class="p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                        </button>
                        <button @click="goToToday"
                            class="px-3 py-1 text-sm rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300">
                            Today
                        </button>
                        <button @click="next" class="p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                        <span class="text-md font-medium text-gray-700 dark:text-gray-300 w-40 text-center">{{
                            currentViewDateDisplay }}</span>
                        <button class="p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </button>
                    </div>

                    <!-- Search & Filters -->
                    <div class="flex items-center space-x-2 flex-grow sm:flex-grow-0">
                        <div class="relative flex-grow sm:flex-grow-0">
                            <input type="text" placeholder="Search here"
                                class="pl-8 pr-2 py-1.5 text-sm rounded border border-gray-300 dark:border-gray-600 focus:ring-brand-500 focus:border-brand-500 dark:bg-gray-700 dark:text-gray-300 w-full sm:w-40">
                            <svg class="w-4 h-4 text-gray-400 absolute left-2 top-1/2 transform -translate-y-1/2"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <button
                            class="p-1.5 rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                                </path>
                            </svg>
                        </button>
                    </div>

                    <!-- View Switcher -->
                    <div class="flex items-center border border-gray-300 dark:border-gray-600 rounded text-sm">
                        <button v-for="view in views" :key="view.value" @click="currentView = view.value"
                            class="px-3 py-1" :class="{
                                'bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-white': currentView === view.value,
                                'hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-600 dark:text-gray-400': currentView !== view.value,
                                'rounded-l': view.value === 'daily',
                                'rounded-r': view.value === 'monthly',
                                'border-l border-r border-gray-300 dark:border-gray-600': view.value === 'weekly'
                            }">
                            {{ view.label }}
                        </button>
                    </div>
                </div>

                <!-- Daily View -->
                <div v-if="currentView === 'daily'" class="border border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-[auto,1fr]">
                        <div class="flex">
                            <!-- Time Column Header -->
                            <div
                                class="border-b border-r border-gray-200 dark:border-gray-700 px-2 py-5 text-sm font-medium text-gray-600 dark:text-gray-400 w-20 text-center">
                                Time</div>
                            <!-- Date Header -->
                            <div
                                class="border-b border-gray-200 dark:border-gray-700 px-2 py-5 text-sm font-medium text-gray-600 dark:text-gray-400 flex-1 text-center">
                                {{ currentDayFullFormatted }}</div>
                        </div>

                        <!-- Time Slots -->
                        <template v-for="hour in 24" :key="`daily-${hour}`">
                            <!-- Time Label -->
                            <div
                                class="border-r border-gray-200 dark:border-gray-700 p-2 text-xs text-gray-500 dark:text-gray-400 h-16 flex items-center justify-center w-20">
                                {{ formatHour(hour - 1) }}
                            </div>
                            <!-- Schedule Area for the hour -->
                            <div class="border-b border-gray-200 dark:border-gray-700 relative">
                                <!-- Placeholder for events/sessions within this hour -->
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Weekly View -->
                <div v-if="currentView === 'weekly'" class="border border-l border-gray-200 dark:border-gray-700">
                    <!-- Day Headers -->
                    <div class="grid grid-cols-7 border-b border-gray-200 dark:border-gray-700">
                        <div v-for="day in weekDays" :key="`header-${day.toISOString()}`"
                            class="p-2 text-center border-r border-gray-200 dark:border-gray-700 last:border-r-0"
                            :class="{ 'bg-blue-50 dark:bg-blue-900/10': isToday(day) }">
                            <div class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ formatDate(day, {
                                day:
                                'numeric',
                                month: 'short' }) }}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">{{ formatDate(day, {
                                weekday: 'short'
                                }) }}</div>
                        </div>
                    </div>
                    <!-- Content Area -->
                    <div class="grid grid-cols-7 min-h-[50vh]">
                        <div v-for="day in weekDays" :key="`content-${day.toISOString()}`"
                            class="border-r border-gray-200 dark:border-gray-700 p-2 last:border-r-0 relative"
                            :class="{ 'bg-blue-50 dark:bg-blue-900/10': isToday(day) }">
                            <div
                                class="bg-gray-50 dark:bg-gray-700/50 rounded p-2 text-center text-xs text-gray-500 dark:text-gray-400">
                                No sessions
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly View -->
                <div v-if="currentView === 'monthly'" class="border border-l border-gray-200 dark:border-gray-700">
                    <!-- Day Headers -->
                    <div class="grid grid-cols-7 border-b border-gray-200 dark:border-gray-700">
                        <div v-for="dayName in monthDayNames" :key="dayName"
                            class="p-2 text-center text-xs font-medium text-gray-500 dark:text-gray-400 border-r border-gray-200 dark:border-gray-700 last:border-r-0">
                            {{ dayName }}
                        </div>
                    </div>
                    <!-- Calendar Grid -->
                    <div class="grid grid-cols-7 grid-rows-6">
                        <div v-for="(day, index) in monthDays" :key="index"
                            class="border-b border-r border-gray-200 dark:border-gray-700 p-2 h-40 relative" :class="{
                                'bg-gray-50 dark:bg-gray-700/30 text-gray-400 dark:text-gray-500': !day.isCurrentMonth, // Dim days not in the current month
                                'bg-blue-50 dark:bg-blue-900/10': day.isToday, // Highlight today
                                'border-r-0': (index + 1) % 7 === 0, // Remove right border for last column
                                'border-b-0': index >= monthDays.length - 7 // Remove bottom border for last row (approx)
                            }">
                            <span class="text-xs font-semibold"
                                :class="{ 'text-brand-600 dark:text-brand-400': day.isToday, 'rounded-full bg-brand-600 text-white px-1.5 py-0.5': day.isToday }">
                                {{ day.date.getDate() }}
                            </span>
                            <!-- Add event/session display here -->
                        </div>
                    </div>
                </div>

            </div>

        </RoutedTabs>
    </div>

</template>

<script setup>
import { ref, computed } from 'vue';
import RoutedTabs from '../Components/RoutedTabs.vue';
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';

const tabs = [
    { id: 'teached-subjects', label: 'Subjects I Can Teach', route: 'tutor.bookings.teached-subjects', isActive: false },
    { id: 'manage-sessions', label: 'Manage Sessions', route: 'tutor.bookings.manage-sessions', isActive: false },
    { id: 'upcoming-bookings', label: 'Upcoming Bookings', route: 'tutor.bookings.upcoming-bookings', isActive: true },
];

const views = [
    { label: 'Daily', value: 'daily' },
    { label: 'Weekly', value: 'weekly' },
    { label: 'Monthly', value: 'monthly' },
];

const currentView = ref('daily'); // Default view
const selectedDate = ref(new Date());

// --- General Helpers ---
const today = new Date();
today.setHours(0, 0, 0, 0);

const isToday = (date) => {
    return date.getFullYear() === today.getFullYear() &&
        date.getMonth() === today.getMonth() &&
        date.getDate() === today.getDate();
};

// Ensure selectedDate is always set to the start of the day
selectedDate.value.setHours(0, 0, 0, 0);

// --- Date Formatting --- 
const formatHour = (hour) => {
    const date = new Date();
    date.setHours(hour, 0, 0, 0);
    return date.toLocaleTimeString('en-US', { hour: 'numeric', hour12: true }).toLowerCase();
};

const formatDate = (date, options) => {
    return date.toLocaleDateString('en-US', options);
}

// --- Computed Properties for Display ---
const currentDayFormatted = computed(() => {
    return formatDate(selectedDate.value, { year: 'numeric', month: 'long', day: 'numeric' });
});

const currentDayFullFormatted = computed(() => {
    const datePart = formatDate(selectedDate.value, { year: 'numeric', month: 'long', day: 'numeric' });
    const offsetMinutes = selectedDate.value.getTimezoneOffset();
    const offsetHours = Math.abs(offsetMinutes / 60);
    const offsetSign = offsetMinutes <= 0 ? '+' : '-';
    const timezoneOffset = `GMT${offsetSign}${String(offsetHours).padStart(2, '0')}:${String(Math.abs(offsetMinutes % 60)).padStart(2, '0')}`;
    return `${datePart} ${timezoneOffset}`;
});

const currentMonthYear = computed(() => {
    return formatDate(selectedDate.value, { year: 'numeric', month: 'long' });
});

const weekDays = computed(() => {
    const startOfWeek = new Date(selectedDate.value);
    const dayOfWeek = startOfWeek.getDay(); // 0 = Sunday, 1 = Monday, ...
    startOfWeek.setDate(startOfWeek.getDate() - dayOfWeek);

    const days = [];
    for (let i = 0; i < 7; i++) {
        const date = new Date(startOfWeek);
        date.setDate(date.getDate() + i);
        days.push(date);
    }
    return days;
});

const currentWeekRangeFormatted = computed(() => {
    const start = weekDays.value[0];
    const end = weekDays.value[6];
    const startMonth = formatDate(start, { month: 'short' });
    const endMonth = formatDate(end, { month: 'short' });
    const startDay = formatDate(start, { day: 'numeric' });
    const endDay = formatDate(end, { day: 'numeric' });
    const year = formatDate(start, { year: 'numeric' });

    if (startMonth === endMonth) {
        return `${startMonth} ${startDay} - ${endDay}, ${year}`;
    } else {
        return `${startMonth} ${startDay} - ${endMonth} ${endDay}, ${year}`;
    }
});

// --- Monthly View Computeds ---
const monthDayNames = computed(() => {
    // Generate short day names (Sun, Mon, ...)
    const formatter = new Intl.DateTimeFormat('en-US', { weekday: 'short' });
    const names = [];
    for (let i = 0; i < 7; i++) { // Assuming week starts on Sunday
        const date = new Date(2023, 0, i + 1); // Use a known Sunday start point
        names.push(formatter.format(date));
    }
    return names;
});

const monthDays = computed(() => {
    const year = selectedDate.value.getFullYear();
    const month = selectedDate.value.getMonth(); // 0-indexed

    const firstDayOfMonth = new Date(year, month, 1);
    const lastDayOfMonth = new Date(year, month + 1, 0);

    const firstDayWeekday = firstDayOfMonth.getDay(); // 0 for Sunday, 1 for Monday, ...
    const lastDayDate = lastDayOfMonth.getDate();

    const daysInMonth = [];

    // 1. Days from the previous month
    const prevMonthLastDay = new Date(year, month, 0);
    const prevMonthDaysToShow = firstDayWeekday; // Number of days to show from prev month
    for (let i = prevMonthDaysToShow - 1; i >= 0; i--) {
        const date = new Date(prevMonthLastDay);
        date.setDate(prevMonthLastDay.getDate() - i);
        daysInMonth.push({ date: date, isCurrentMonth: false, isToday: false });
    }

    // 2. Days of the current month
    for (let day = 1; day <= lastDayDate; day++) {
        const date = new Date(year, month, day);
        daysInMonth.push({ date: date, isCurrentMonth: true, isToday: isToday(date) });
    }

    // 3. Days from the next month
    const totalDaysShown = daysInMonth.length;
    const nextMonthDaysToShow = (7 - (totalDaysShown % 7)) % 7; // Ensure grid fills up to multiple of 7
    const nextMonthFirstDay = new Date(year, month + 1, 1);
    for (let i = 0; i < nextMonthDaysToShow; i++) {
        const date = new Date(nextMonthFirstDay);
        date.setDate(nextMonthFirstDay.getDate() + i);
        daysInMonth.push({ date: date, isCurrentMonth: false, isToday: false });
    }

    // Ensure 6 rows (42 days) for consistent layout
    while (daysInMonth.length < 42) {
        const lastDate = daysInMonth[daysInMonth.length - 1].date;
        const nextDate = new Date(lastDate);
        nextDate.setDate(lastDate.getDate() + 1);
        daysInMonth.push({ date: nextDate, isCurrentMonth: false, isToday: false });
    }


    return daysInMonth;
});

// Display correct date format based on current view
const currentViewDateDisplay = computed(() => {
    switch (currentView.value) {
        case 'daily': return currentDayFormatted.value;
        case 'weekly': return currentWeekRangeFormatted.value;
        case 'monthly': return currentMonthYear.value;
        default: return '';
    }
});

// --- Navigation Functions --- 
const previousDay = () => {
    selectedDate.value = new Date(selectedDate.value.setDate(selectedDate.value.getDate() - 1));
};
const nextDay = () => {
    selectedDate.value = new Date(selectedDate.value.setDate(selectedDate.value.getDate() + 1));
};

const previousWeek = () => {
    selectedDate.value = new Date(selectedDate.value.setDate(selectedDate.value.getDate() - 7));
};
const nextWeek = () => {
    selectedDate.value = new Date(selectedDate.value.setDate(selectedDate.value.getDate() + 7));
};

const previousMonth = () => {
    selectedDate.value = new Date(selectedDate.value.getFullYear(), selectedDate.value.getMonth() - 1, 1);
    selectedDate.value.setHours(0, 0, 0, 0); // Ensure it stays at the start of the day
};
const nextMonth = () => {
    selectedDate.value = new Date(selectedDate.value.getFullYear(), selectedDate.value.getMonth() + 1, 1);
    selectedDate.value.setHours(0, 0, 0, 0); // Ensure it stays at the start of the day
};

// Generic navigation based on view
const previous = () => {
    switch (currentView.value) {
        case 'daily': previousDay(); break;
        case 'weekly': previousWeek(); break;
        case 'monthly': previousMonth(); break;
    }
};
const next = () => {
    switch (currentView.value) {
        case 'daily': nextDay(); break;
        case 'weekly': nextWeek(); break;
        case 'monthly': nextMonth(); break;
    }
};

const goToToday = () => {
    selectedDate.value = new Date();
    selectedDate.value.setHours(0, 0, 0, 0);
};

</script>

<style scoped>
/* Add component-specific styles if needed */
/* Style for dimmed days */
.bg-gray-50.dark\:bg-gray-700\/30 {
    /* Add a subtle pattern for previous/next month days like the image */
    background-image: repeating-linear-gradient(-45deg,
            transparent,
            transparent 5px,
            rgba(0, 0, 0, 0.02) 5px,
            /* Light mode pattern */
            rgba(0, 0, 0, 0.02) 10px);
}

.dark .bg-gray-50.dark\:bg-gray-700\/30 {
    background-image: repeating-linear-gradient(-45deg,
            transparent,
            transparent 5px,
            rgba(255, 255, 255, 0.03) 5px,
            /* Dark mode pattern */
            rgba(255, 255, 255, 0.03) 10px);
}
</style>
