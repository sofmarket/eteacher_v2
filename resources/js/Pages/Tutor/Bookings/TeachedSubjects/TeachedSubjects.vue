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
            <button class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2 px-4 rounded-lg flex items-center space-x-1" @click="addSubjectGroup">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                <span>Add New</span>
            </button>
        </div>

        <!-- Subject Groups List (Draggable) -->
        <draggable
            v-model="userSubjectGroups"
            tag="div"
            item-key="id"
            handle=".group-handle"
            class="space-y-4"
            animation="150"
            @end="onGroupOrderChanged"
        >
            <template #item="{ element: subjectGroup, index: groupIndex }">
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg">
                    <!-- Group Header -->
                    <div class="flex items-center justify-between p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-t-lg" :class="{'rounded-b-lg': !subjectGroup.isOpen }">
                        <div class="flex items-center space-x-3">
                             <svg class="w-5 h-5 text-gray-400 cursor-grab group-handle" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg> <!-- Drag Handle -->
                            <span class="font-medium text-gray-800 dark:text-gray-200">{{ subjectGroup.name }}</span>
                        </div>
                        <div class="flex items-center space-x-2 relative">
                             <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-1">
                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg> <!-- Options -->
                             </button>
                             <!-- Chevron Button controls collapse/expand -->
                              <button @click="toggleGroup(groupIndex)" class="p-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-600">
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
                             @end="(event) => onSubjectOrderChanged(event, subjectGroup)"
                         >
                             <template #item="{ element: subject }">
                                <SubjectCard :subject="subject" @edit="handleEditSubject" />
                            </template>
                        </draggable>
                        <!-- Add New Subject Button -->
                        <button class="w-full border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-3 text-center text-sm font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-center space-x-1" @click="addSubject(subjectGroup.id)">
                            <span>Add new subject</span>
                             <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </button>
                    </div>
                </div>
            </template>
        </draggable>
    
        <AddSubjectGroupModal v-model:modalActive="addSubjectGroupModalActive" />
        <SubjectModal 
            v-model:modalActive="addSubjectModalActive" 
            :selectedGroupId="selectedGroupId" 
            :subjectToEdit="subjectToEdit"
        />
    
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { useForm, usePage, router } from '@inertiajs/vue3';
import draggable from 'vuedraggable';

import SubjectCard from './SubjectCard.vue';
import AddSubjectGroupModal from './AddSubjectGroupModal.vue';
import SubjectModal from './SubjectModal.vue';

// use page inertia
const page = usePage();

const userSubjectGroups = computed(() => page.props.userSubjectGroups.data);

const addSubjectGroupModalActive = ref(false);
const addSubjectModalActive = ref(false);
const selectedGroupId = ref(null);
const subjectToEdit = ref(null);

const addSubjectGroup = () => {
    addSubjectGroupModalActive.value = true;
}

const addSubject = (groupId = null) => {
    selectedGroupId.value = groupId;
    subjectToEdit.value = null; // Reset edit mode
    addSubjectModalActive.value = true;
}

const handleEditSubject = (subject) => {
    subjectToEdit.value = subject;
    selectedGroupId.value = subject.user_subject_group_id;
    addSubjectModalActive.value = true;
}

onMounted(() => {
    // console.log(subjectGroups);
    
    // Set the first group as open by default
    if (userSubjectGroups.value.length > 0) {
        userSubjectGroups.value[0].isOpen = true;
    }
});

const toggleGroup = (selectedIndex) => {
    const wasOpen = userSubjectGroups.value[selectedIndex].isOpen;

    // Close all groups first
    userSubjectGroups.value.forEach((group, index) => {
        group.isOpen = false;
    });

    // Open the selected one only if it was previously closed
    if (!wasOpen) {
        userSubjectGroups.value[selectedIndex].isOpen = true;
    }
    // If it was open, clicking again will just keep it closed (because all were closed above)
};

const onGroupOrderChanged = (event) => {
    console.log('Subject Groups order changed:', event);

    // Prepare the sort order data
    const sortOrderData = userSubjectGroups.value.map((group, index) => ({
        id: group.id,
        sort_order: index + 1
    }));

    // Send request to backend to update sort order
    router.post(route('tutor.user.subject.group.update_sort_order'), {
        groups: sortOrderData
    }, {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
            console.log('Group sort order updated successfully');
        },
        onError: (errors) => {
            console.error('Failed to update group sort order:', errors);
        }
    });
};

const onSubjectOrderChanged = (event, subjectGroup) => {
    console.log('Subjects order changed:', {
        event: event,
        groupId: subjectGroup.id,
        groupName: subjectGroup.name,
        subjects: subjectGroup.subjects.map(subject => ({ id: subject.id, name: subject.name }))
    });

    // Prepare the sort order data
    const sortOrderData = subjectGroup.subjects.map((subject, index) => ({
        id: subject.id,
        sort_order: index + 1
    }));

    // Send request to backend to update sort order
    router.post(route('tutor.user.subject.update_sort_order'), {
        group_id: subjectGroup.id,
        subjects: sortOrderData
    }, {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
            console.log('Sort order updated successfully');
        },
        onError: (errors) => {
            console.error('Failed to update sort order:', errors);
        }
    });
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
