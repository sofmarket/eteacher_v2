<template>
    <div class="flex items-start space-x-4 p-3 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700/50">
        <svg class="w-5 h-5 text-gray-400 cursor-grab subject-handle mt-1 flex-shrink-0" fill="none"
            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg> <!-- Drag Handle -->
        <img :src="subject.image" alt="Subject Image" class="w-10 h-10 rounded object-cover flex-shrink-0">
        <div class="flex-grow relative">
            <div class="flex justify-between items-start">
                <div>
                    <h4 class="font-semibold text-gray-800 dark:text-gray-200">{{ subject.name }}</h4>
                    <p class="text-sm text-blue-600 dark:text-blue-400 font-medium">{{ $t('tutor.bookings.teached_subjects.hourly_rate', { rate: subject.hour_rate }) }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ subject.description }}</p>
                </div>
                <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-1 ml-2 flex-shrink-0" @click="isDropdownOpen = !isDropdownOpen">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                        </path>
                    </svg> <!-- Options -->
                </button>
                <!-- Dropdown Menu -->
                <div v-if="isDropdownOpen" class="absolute right-0 top-8 mt-2 w-48 rounded-md bg-white z-10">
                    <div class="py-1" role="menu" aria-orientation="vertical">
                        <button
                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center gap-2"
                            role="menuitem" @click="handleEdit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            {{ $t('tutor.bookings.teached_subjects.edit') }}
                        </button>
                        <button
                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 flex items-center gap-2"
                            role="menuitem" @click="handleDelete">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18"></path>
                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                            </svg>
                            {{ $t('tutor.bookings.teached_subjects.delete') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const props = defineProps({
    subject: {
        type: Object,
        required: true
    }
});

const emit = defineEmits(['edit']);

const isDropdownOpen = ref(false);

// Close dropdown when clicking outside
const handleClickOutside = (event) => {
    if (!event.target.closest('.relative')) {
        isDropdownOpen.value = false;
    }
};

const handleEdit = () => {
    isDropdownOpen.value = false;
    emit('edit', props.subject);
};

const handleDelete = () => {
    isDropdownOpen.value = false;
    
    Swal.fire({
        title: $t('tutor.bookings.teached_subjects.are_you_sure'),
        text: $t('tutor.bookings.teached_subjects.delete_subject_warning'),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: $t('tutor.bookings.teached_subjects.yes_delete_it')
    }).then((result) => {
        if (result.isConfirmed) {
            const form = useForm({});
            form.delete(route('tutor.user.subject.destroy', props.subject.id), {
                onSuccess: () => {
                    Swal.fire(
                        $t('tutor.bookings.teached_subjects.deleted'),
                        $t('tutor.bookings.teached_subjects.subject_deleted'),
                        'success'
                    );
                }
            });
        }
    });
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});

</script>