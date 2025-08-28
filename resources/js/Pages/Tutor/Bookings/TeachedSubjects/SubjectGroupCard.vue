<template>
    <div class="border border-gray-200 dark:border-gray-700 rounded-lg">
        <!-- Group Header -->
        <div class="flex items-center justify-between p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-t-lg" :class="{'rounded-b-lg': !subjectGroup.isOpen }">
            <div class="flex items-center space-x-3">
                 <svg class="w-5 h-5 text-gray-400 cursor-grab group-handle" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg> <!-- Drag Handle -->
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ subjectGroup.name }}</span>
            </div>
            <div class="flex items-center space-x-2 relative">
                <!-- Dropdown Menu -->
                <div class="relative">
                    <button 
                        @click="toggleDropdown" 
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-1"
                        ref="dropdownButton"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                    </button>
                    
                    <!-- Dropdown Content -->
                    <div 
                        v-if="isDropdownOpen" 
                        class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg z-50 border border-gray-200 dark:border-gray-700"
                        ref="dropdownMenu"
                    >
                        <div class="py-1">
                            <button 
                                @click="editGroup"
                                class="flex items-center w-full px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                            >
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit Group
                            </button>
                            <button 
                                @click="deleteGroup"
                                class="flex items-center w-full px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700"
                            >
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete Group
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Chevron Button controls collapse/expand -->
                 <button @click="$emit('toggle', groupIndex)" class="p-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-600">
                     <svg class="w-5 h-5 text-gray-400 transition-transform duration-200" :class="{'rotate-180': subjectGroup.isOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                 </button>
            </div>
        </div>

        <!-- Subjects List (Draggable & Collapsible) -->
        <div v-if="subjectGroup.isOpen" class="border-t border-gray-200 dark:border-gray-700 p-4 space-y-4">
             <draggable
                v-model="subjectGroup.subjects"
                tag="div"
                item-key="id"
                handle=".subject-handle"
                class="space-y-4"
                 animation="150"
                 @end="(event) => $emit('subjectOrderChanged', event, subjectGroup)"
             >
                 <template #item="{ element: subject }">
                    <SubjectCard :subject="subject" @edit="$emit('editSubject', subject)" />
                </template>
            </draggable>
            <!-- Add New Subject Button -->
            <button class="w-full border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-3 text-center text-sm font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-center space-x-1" @click="$emit('addSubject', subjectGroup.id)">
                <span>Add new subject</span>
                 <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import draggable from 'vuedraggable';
import SubjectCard from './SubjectCard.vue';
import { useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const props = defineProps({
    subjectGroup: {
        type: Object,
        required: true
    },
    groupIndex: {
        type: Number,
        required: true
    }
});

const emit = defineEmits([
    'toggle',
    'addSubject',
    'editSubject',
    'subjectOrderChanged',
    'editGroup'
]);

const isDropdownOpen = ref(false);
const dropdownButton = ref(null);
const dropdownMenu = ref(null);

const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
};

const editGroup = () => {
    isDropdownOpen.value = false;
    emit('editGroup', props.subjectGroup);
};

const deleteGroup = () => {
    isDropdownOpen.value = false;
    
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this group!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = useForm({});
            form.delete(route('tutor.user.subject.group.destroy', props.subjectGroup.id), {
                onSuccess: () => {
                    Swal.fire(
                        'Deleted!',
                        'Group has been deleted.',
                        'success'
                    );
                }
            });
        }
    });
};

const handleClickOutside = (event) => {
    if (dropdownButton.value && !dropdownButton.value.contains(event.target) &&
        dropdownMenu.value && !dropdownMenu.value.contains(event.target)) {
        isDropdownOpen.value = false;
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});
</script>
