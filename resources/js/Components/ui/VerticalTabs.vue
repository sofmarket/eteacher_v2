<template>
    <div class="flex flex-col gap-6 sm:flex-row sm:gap-8">

      <div class="overflow-x-auto pb-2 sm:w-[200px] [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-100 dark:[&::-webkit-scrollbar-thumb]:bg-gray-600 [&::-webkit-scrollbar-track]:bg-white dark:[&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar]:h-1.5">
        <nav
          class="flex flex-row w-full sm:flex-col sm:space-y-2">
          <button
            v-for="tab in tabs"
            :key="tab.id"
            @click="activeTab = tab.id"
            :class="[
              'inline-flex items-center px-3 py-2 text-sm font-medium transition-colors duration-200 ease-in-out rounded-lg sm:p-3',
              activeTab === tab.id 
                ? 'text-brand-500 dark:bg-brand-400/20 dark:text-brand-400 bg-brand-50'
                : 'bg-transparent text-gray-500 border-transparent hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200'
            ]">
            {{ tab.label }}
          </button>
        </nav>
      </div>
      <div class="flex-1 block">
        <slot :name="activeTab"></slot>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const props = defineProps({
    tabs: {
      type: Array,
      required: true,
      validator: (value) => {
        return value.every(tab => tab.id && tab.label);
      }
    },
    defaultTab: {
      type: String,
      default: null
    }
  });
  
  const activeTab = ref(props.defaultTab || props.tabs[0]?.id);
  </script> 