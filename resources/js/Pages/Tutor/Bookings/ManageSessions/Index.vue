<template>
  <div>

    <Breadcrumbs :title="$t('tutor.bookings.manage_sessions.title')" />

    <RoutedTabs :tabs="tabs">
      <div class="">
        <!-- Header: Month Navigation and Title -->
        <div class="flex items-center justify-between mb-4">
          <h2 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $t('tutor.bookings.manage_sessions.title') }}</h2>
          <div class="flex items-center space-x-2">
            <button @click="previousMonth" class="p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
              <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
              </svg>
            </button>
            <button @click="goToToday"
              class="px-3 py-1 text-sm rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300">
              {{ $t('tutor.bookings.manage_sessions.today') }}
            </button>
            <button @click="nextMonth" class="p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
              <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </button>
            <span class="text-md font-medium text-gray-700 dark:text-gray-300 w-28 text-center">{{ currentMonthYear
            }}</span>
            <!-- Add Session Button -->
            <button @click="openAddSessionModal"
              class="ml-4 px-4 py-2 text-sm font-medium text-white bg-green-900 rounded-lg hover:bg-green-800 flex items-center gap-1">
              {{ $t('tutor.bookings.manage_sessions.add_new_session') }}
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
              </svg>
            </button>
          </div>
        </div>

        <div v-if="precessing" class="flex justify-center items-center">
          <div class="w-20 h-20">
            <svg width="60" height="60" viewBox="0 0 44 44">
              <circle cx="22" cy="22" r="20" fill="none" stroke="#E5E7EB" stroke-width="4"></circle>
              <circle cx="22" cy="22" r="20" fill="none" stroke="#60A5FA" stroke-width="4" stroke-dasharray="125.6"
                stroke-dashoffset="125.6">
                <animate attributeName="stroke-dashoffset" values="125.6;0" dur="2s" repeatCount="indefinite"></animate>
              </circle>
            </svg>
          </div>
        </div>

        <!-- Calendar Grid -->
        <div v-if="!precessing" class="grid grid-cols-7 border-t border-l border-gray-200 dark:border-gray-700">
          <!-- Day Headers -->
          <div v-for="day in daysOfWeek" :key="day"
            class="text-center py-2 border-r border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50 text-sm font-medium text-gray-600 dark:text-gray-400">
            {{ $t(day) }}
          </div>

          <!-- Calendar Days -->
          <div v-for="(day, index) in calendarDays" :key="index"
            class="h-40 border-r border-b border-gray-200 dark:border-gray-700 p-2 relative flex justify-center items-center group"
            :class="{
              'bg-gray-100 dark:bg-gray-700/30 opacity-70': !day.isCurrentMonth,
              'bg-white dark:bg-gray-800': day.isCurrentMonth
            }">
            <span class="text-sm group-hover:bg-blue-50 rounded-full py-3 px-4" :class="{
              'text-gray-400 dark:text-gray-500': !day.isCurrentMonth,
              'text-gray-700 dark:text-gray-300': day.isCurrentMonth
            }">
              {{ day.number }}
            </span>
            <!-- Session Info -->
            <div v-if="getSlotsForDay(day)"
              class="absolute bottom-2 left-2 right-2 text-xs text-gray-600 dark:text-gray-400 hidden md:flex flex-col items-center">
              <span class="font-medium">{{ getSlotsForDay(day).total_booked }}/{{ getSlotsForDay(day).spaces }}</span>
              <div class="w-full h-1 bg-blue-400 rounded mt-1"></div>
              <span class="text-xs opacity-75">{{ getSlotsForDay(day).slots.length }} {{ getSlotsForDay(day).slots.length > 1 ? $t('tutor.bookings.manage_sessions.sessions') : $t('tutor.bookings.manage_sessions.session') }}</span>
            </div>
          </div>
        </div>

        <!-- Add Session Modal -->
        <AddSessionModal v-model:modalActive="addSessionModalActive" />
      </div>
    </RoutedTabs>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue';
import axios from 'axios';
import AddSessionModal from './AddSessionModal.vue';
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';
import RoutedTabs from '../Components/RoutedTabs.vue';
import { usePage } from '@inertiajs/vue3';

const daysOfWeek = ['tutor.bookings.manage_sessions.days_of_week.sun', 'tutor.bookings.manage_sessions.days_of_week.mon', 'tutor.bookings.manage_sessions.days_of_week.tue', 'tutor.bookings.manage_sessions.days_of_week.wed', 'tutor.bookings.manage_sessions.days_of_week.thu', 'tutor.bookings.manage_sessions.days_of_week.fri', 'tutor.bookings.manage_sessions.days_of_week.sat'];

const precessing = ref(false);

const tabs = [
    { id: 'teached-subjects', label: 'tutor.bookings.tabs.subjects_i_can_teach', route: 'tutor.bookings.teached-subjects', isActive: false },
    { id: 'manage-sessions', label: 'tutor.bookings.tabs.manage_sessions', route: 'tutor.bookings.manage-sessions', isActive: true },
    { id: 'upcoming-bookings', label: 'tutor.bookings.tabs.upcoming_bookings', route: 'tutor.bookings.upcoming-bookings', isActive: false },
];


// use page inertia
const page = usePage();

// Create a reactive copy of the data
const slots = ref([]);

const currentDate = ref(new Date()); // Use ref for reactivity
const addSessionModalActive = ref(false);

// Ensure currentDate is always set to the start of the day 
currentDate.value.setHours(0, 0, 0, 0);

const currentMonthYear = computed(() => {
  return currentDate.value.toLocaleDateString('en-US', { year: 'numeric', month: 'long' });
});

const calendarDays = computed(() => {
  const year = currentDate.value.getFullYear();
  const month = currentDate.value.getMonth();

  const firstDayOfMonth = new Date(year, month, 1);
  const lastDayOfMonth = new Date(year, month + 1, 0);

  const firstDayWeekday = firstDayOfMonth.getDay(); // 0 for Sunday, 1 for Monday, etc.
  const lastDayDate = lastDayOfMonth.getDate();

  const days = [];

  // Days from previous month
  const lastDayOfPrevMonth = new Date(year, month, 0).getDate();
  for (let i = firstDayWeekday - 1; i >= 0; i--) {
    days.push({ number: lastDayOfPrevMonth - i, isCurrentMonth: false });
  }

  // Days of current month
  for (let i = 1; i <= lastDayDate; i++) {
    days.push({ number: i, isCurrentMonth: true });
  }

  // Days from next month
  const remainingCells = 7 - (days.length % 7);
  if (remainingCells < 7) { // Only add if needed to fill the grid
    for (let i = 1; i <= remainingCells; i++) {
      days.push({ number: i, isCurrentMonth: false });
    }
  }

  // Ensure the grid always has 6 rows (42 cells) for consistent height
  while (days.length < 42) {
    const nextMonthDay = days.length - (firstDayWeekday + lastDayDate) + 1;
    days.push({ number: nextMonthDay, isCurrentMonth: false });
  }

  // Trim excess rows if the month fits in 5 weeks (35 cells)
  // This might be needed depending on styling/preference. 
  // For now, we keep 6 rows for consistency.
  // if (days.length > 35) { 
  //    // Trim logic here if needed
  // } 

  return days;
});

const previousMonth = () => {
  currentDate.value = new Date(currentDate.value.getFullYear(), currentDate.value.getMonth() - 1, 1);
  currentDate.value.setHours(0, 0, 0, 0);
};

const nextMonth = () => {
  currentDate.value = new Date(currentDate.value.getFullYear(), currentDate.value.getMonth() + 1, 1);
  currentDate.value.setHours(0, 0, 0, 0);
};

const goToToday = () => {
  currentDate.value = new Date();
  currentDate.value.setHours(0, 0, 0, 0);
};

const openAddSessionModal = () => {
  addSessionModalActive.value = true;
};

const getSlots = () => {
  precessing.value = true;
  const year = currentDate.value.getFullYear();
  const month = currentDate.value.getMonth() + 1;
  axios.get(route('tutor.bookings.manage-sessions', { year, month })).then(response => {
    slots.value = response.data.data;
  }).finally(() => {
    precessing.value = false;
  });
}

const getSlotsForDay = (day) => {
  if (day.isCurrentMonth && !slots.value.length) return null;
  
  // Create a date string for the current day in YYYY-MM-DD format
  const dayDate = new Date(currentDate.value.getFullYear(), currentDate.value.getMonth(), day.number);
  const dayString = dayDate.toISOString().split('T')[0];
  
  // console.log(dayString, day.number);

  // Find slots for this specific day
  const daySlots = slots.value.filter(slot => slot.date === dayString);
  
  if (daySlots.length === 0) return null;
  
  // If multiple slots exist for the same day, aggregate the data
  const totalSpaces = daySlots.reduce((sum, slot) => sum + slot.spaces, 0);
  const totalBooked = daySlots.reduce((sum, slot) => sum + slot.total_booked, 0);
  
  return {
    total_booked: totalBooked,
    spaces: totalSpaces,
    slots: daySlots
  };
}

onMounted(() => {
  getSlots();
});

watch(currentDate, () => {
  getSlots();
});

</script>

<style scoped>
/* Add any component-specific styles here if needed */
</style>