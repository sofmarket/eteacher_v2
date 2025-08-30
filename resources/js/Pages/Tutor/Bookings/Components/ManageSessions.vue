<template>
  <div class="">
    <!-- Header: Month Navigation and Title -->
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Manage Sessions</h2>
      <div class="flex items-center space-x-2">
        <button @click="previousMonth" class="p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
        </button>
        <button @click="goToToday"
          class="px-3 py-1 text-sm rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300">
          Today
        </button>
        <button @click="nextMonth" class="p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </button>
        <span class="text-md font-medium text-gray-700 dark:text-gray-300 w-28 text-center">{{ currentMonthYear
          }}</span>
        <!-- Placeholder for Add Session Button -->
        <button
          class="ml-4 px-4 py-2 text-sm font-medium text-white bg-green-900 rounded-lg hover:bg-green-800 flex items-center gap-1">
          Add new Session
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Calendar Grid -->
    <div class="grid grid-cols-7 border-t border-l border-gray-200 dark:border-gray-700">
      <!-- Day Headers -->
      <div v-for="day in daysOfWeek" :key="day"
        class="text-center py-2 border-r border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50 text-sm font-medium text-gray-600 dark:text-gray-400">
        {{ day }}
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
        <!-- Placeholder for Session Info -->
        <div v-if="false"
          class="absolute bottom-2 left-2 right-2 text-xs text-gray-600 dark:text-gray-400 hidden md:flex flex-col items-center">
          <!-- Example session data placeholder -->
          <span>60/ 60 Left</span>
          <div class="w-full h-1 bg-blue-400 rounded mt-1"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

const currentDate = ref(new Date()); // Use ref for reactivity

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

</script>

<style scoped>
/* Add any component-specific styles here if needed */
</style>