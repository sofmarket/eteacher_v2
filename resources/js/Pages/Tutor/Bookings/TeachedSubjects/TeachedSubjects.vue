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
            <button class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2 px-4 rounded-lg flex items-center space-x-1" @click="updateSubjectGroups">
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
                <SubjectGroupCard 
                    :subjectGroup="subjectGroup" 
                    :groupIndex="groupIndex"
                    @toggle="toggleGroup"
                    @addSubject="addSubject"
                    @editSubject="handleEditSubject"
                    @subjectOrderChanged="onSubjectOrderChanged"
                    @editGroup="updateSubjectGroups"
                />
            </template>
        </draggable>
    
        <SubjectGroupModal v-model:modalActive="subjectGroupModalActive" />

        <SubjectModal 
            v-model:modalActive="subjectModalActive" 
            :selectedGroupId="selectedGroupId" 
            :subjectToEdit="subjectToEdit"
        />
    
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import { usePage, router } from '@inertiajs/vue3';
import draggable from 'vuedraggable';

import SubjectGroupCard from './SubjectGroupCard.vue';
import SubjectGroupModal from './SubjectGroupModal.vue';
import SubjectModal from './SubjectModal.vue';

// use page inertia
const page = usePage();

// Create a reactive copy of the data
const userSubjectGroups = ref([...page.props.userSubjectGroups.data]);

// Watch for changes in page props and update our local copy
watch(() => page.props.userSubjectGroups.data, (newData) => {
    userSubjectGroups.value = [...newData];
}, { deep: true });

const subjectGroupModalActive = ref(false);
const subjectModalActive = ref(false);
const selectedGroupId = ref(null);
const subjectToEdit = ref(null);

const updateSubjectGroups = () => {
    subjectGroupModalActive.value = true;
}

const addSubject = (groupId = null) => {
    selectedGroupId.value = groupId;
    subjectToEdit.value = null; // Reset edit mode
    subjectModalActive.value = true;
}

const handleEditSubject = (subject) => {
    subjectToEdit.value = subject;
    selectedGroupId.value = subject.user_subject_group_id;
    subjectModalActive.value = true;
}

onMounted(() => {
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
