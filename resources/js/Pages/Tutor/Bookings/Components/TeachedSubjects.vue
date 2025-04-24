<template>
    <div class="p-6">
        <!-- Header -->
        <div class="flex justify-between items-start mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Subjects I Can Teach</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    Please provide your educational background to help us assess your qualifications.
                </p>
            </div>
            <button class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2 px-4 rounded-lg flex items-center space-x-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                <span>Add New</span>
            </button>
        </div>

        <!-- Subject Groups List (Draggable) -->
        <draggable
            v-model="subjectGroups"
            tag="div"
            item-key="id"
            handle=".group-handle"
            class="space-y-4"
            animation="150"
        >
            <template #item="{ element: group, index: groupIndex }">
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg">
                    <!-- Group Header -->
                    <div class="flex items-center justify-between p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-t-lg" :class="{'rounded-b-lg': !group.isOpen }">
                        <div class="flex items-center space-x-3">
                             <svg class="w-5 h-5 text-gray-400 cursor-grab group-handle" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg> <!-- Drag Handle -->
                            <span class="font-medium text-gray-800 dark:text-gray-200">{{ group.name }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                             <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-1">
                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg> <!-- Options -->
                             </button>
                             <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-1 rounded-full border border-gray-300 dark:border-gray-600">
                                 <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> <!-- Add -->
                             </button>
                             <!-- Chevron Button controls collapse/expand -->
                              <button @click="toggleGroup(groupIndex)" class="p-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-600">
                                  <svg class="w-5 h-5 text-gray-400 transition-transform duration-200" :class="{'rotate-180': group.isOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                              </button>
                        </div>
                    </div>

                    <!-- Subjects List (Draggable & Collapsible) -->
                    <div v-if="group.isOpen" class="border-t border-gray-200 dark:border-gray-700 p-4 space-y-4">
                         <draggable
                            v-model="group.subjects"
                            tag="div"
                            item-key="id"
                            handle=".subject-handle"
                            class="space-y-4"
                             animation="150"
                         >
                             <template #item="{ element: subject }">
                                 <div class="flex items-start space-x-4 p-3 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                      <svg class="w-5 h-5 text-gray-400 cursor-grab subject-handle mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg> <!-- Drag Handle -->
                                      <img :src="subject.imageUrl" alt="Subject Image" class="w-10 h-10 rounded object-cover flex-shrink-0">
                                      <div class="flex-grow">
                                          <div class="flex justify-between items-start">
                                              <div>
                                                  <h4 class="font-semibold text-gray-800 dark:text-gray-200">{{ subject.name }}</h4>
                                                  <p class="text-sm text-blue-600 dark:text-blue-400 font-medium">Hourly rate: ${{ subject.rate.toFixed(2) }}</p>
                                                  <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ subject.description }}</p>
                                              </div>
                                              <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-1 ml-2 flex-shrink-0">
                                                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg> <!-- Options -->
                                              </button>
                                          </div>
                                      </div>
                                 </div>
                            </template>
                        </draggable>
                        <!-- Add New Subject Button -->
                        <button class="w-full border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-3 text-center text-sm font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-center space-x-1">
                            <span>Add new subject</span>
                             <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </button>
                    </div>
                </div>
            </template>
        </draggable>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import draggable from 'vuedraggable';

// Sample data structure - replace with your actual data source
const subjectGroups = ref([
    {
        id: 1,
        name: 'High School (Grades 9-10)',
        isOpen: true, // Start open for demonstration
        subjects: [
            { id: 101, name: 'Maths', rate: 80.00, description: 'Mathematics is the study of numbers, quantities, shapes, and patterns, and their relationships through abstract reasoning and logical deduction. It includes various branches such as algebra, geometry, calculus, and statistics, used to solve problems and model real-world phenomena.', imageUrl: 'https://placehold.co/400x400' }, // Placeholder image
            { id: 102, name: 'Computer', rate: 70.00, description: 'Computer science is the study of computers and computational systems, encompassing their theory, design, development, and application. It involves programming, algorithms, data structures, and the development of software and hardware to solve problems and create technological solutions.', imageUrl: 'https://placehold.co/400x400' }, // Placeholder image
            { id: 103, name: 'Science', rate: 40.00, description: 'Science is the systematic study of the natural world through observation, experimentation, and analysis. It aims to understand and explain phenomena, uncovering fundamental principles and advancing knowledge across various disciplines.', imageUrl: 'https://placehold.co/400x400' } // Placeholder image
        ]
    },
    {
        id: 2,
        name: 'Intermediate (Grades 11-12)',
        isOpen: false,
        subjects: [] // Add subjects here if needed
    },
    {
        id: 3,
        name: 'Primary school (Grade 1 to 5)',
        isOpen: false,
        subjects: []
    },
    {
        id: 4,
        name: 'Middle School (Grades 6-8)',
        isOpen: false,
        subjects: []
    }
]);

const toggleGroup = (selectedIndex) => {
    const wasOpen = subjectGroups.value[selectedIndex].isOpen;

    // Close all groups first
    subjectGroups.value.forEach((group, index) => {
        group.isOpen = false;
    });

    // Open the selected one only if it was previously closed
    if (!wasOpen) {
        subjectGroups.value[selectedIndex].isOpen = true;
    }
    // If it was open, clicking again will just keep it closed (because all were closed above)
};

</script>

<style scoped>
/* Add component-specific styles if needed */
.sortable-ghost {
  opacity: 0.4;
  background-color: #f0f0f0;
}
.dark .sortable-ghost {
    background-color: #374151; /* Example dark mode ghost background */
}
</style>
