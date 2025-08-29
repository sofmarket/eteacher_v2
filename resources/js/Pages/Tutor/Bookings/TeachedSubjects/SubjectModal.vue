<template>
    <Modal :modalActive="modalActive" @close="closeModal" :fullScreenBackdrop="true" :title="modalTitle"
        @reset="closeModal" @submit="handleSubmit" :loading="form.processing">
        <template #body>
            <form class="flex flex-col gap-4" @submit.prevent="handleSubmit">

                <!-- Subject Selection (only for create mode) -->
                <SelectInput v-if="!isEditMode" :inline="false" label="Subject" v-model="form.subject_id"
                    :errors="form.errors.subject_id">
                    <option value="">Select a subject</option>
                    <option v-for="option in subjectOptions" :key="option.value" :value="option.value">
                        {{ option.label }}
                    </option>
                </SelectInput>

                <!-- Hourly Rate -->
                <UniversalInput :inline="false" label="Hourly Rate ($)" v-model="form.hour_rate"
                    :errors="form.errors.hour_rate" type="number" placeholder="Enter hourly rate" min="0" step="0.01" />

                <!-- Description -->
                <Textarea label="Description" v-model="form.description" :errors="form.errors.description"
                    placeholder="Describe your expertise in this subject" :rows="3" />

                <!-- Image Upload -->
                <FileInput :inline="false" label="Subject Image" :errors="form.errors.image"
                    @file-selected="onFileSelected" />

            </form>
        </template>
    </Modal>
</template>

<script setup>
import { ref, computed, watch } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import Modal from '@/Components/ui/Modal.vue';
import UniversalInput from '@/Components/forms/FormElements/UniversalInput.vue';
import FileInput from '@/Components/forms/FormElements/FileInput.vue';
import SelectInput from '@/Components/forms/FormElements/SelectInput.vue';
import Textarea from '@/Components/forms/FormElements/TextArea.vue';

const emit = defineEmits(['update:modalActive'])

const props = defineProps({
    modalActive: {
        type: Boolean,
        required: true
    },
    selectedGroupId: {
        type: Number,
        default: null
    },
    subjectToEdit: {
        type: Object,
        default: null
    }
});

const page = usePage();

const subjects = computed(() => page.props.subjects.data);

// Create options for subjects
const subjectOptions = computed(() => {
    return subjects.value.map(subject => ({
        value: subject.id,
        label: subject.name
    }));
});

// Computed properties for edit mode
const isEditMode = computed(() => !!props.subjectToEdit);

const modalTitle = computed(() => {
    return isEditMode.value ? 'Edit Subject' : 'Add New Subject';
});

const closeModal = () => emit('update:modalActive', false);

const handleSubmit = () => {
    if (isEditMode.value) {
        form._method = 'PUT';
        form.post(route('tutor.user.subject.update', props.subjectToEdit.id), {
            forceFormData: true,
            onSuccess: () => {
                closeModal();
                form.reset();
            }
        });
    } else {
        form._method = 'POST';
        form.post(route('tutor.user.subject.store'), {
            forceFormData: true,
            onSuccess: () => {
                closeModal();
                form.reset();
            }
        });
    }
};

const form = useForm({
    _method: 'PUT',
    user_subject_group_id: props.selectedGroupId || null,
    subject_id: null,
    hour_rate: null,
    description: '',
    image: null,
});

const onFileSelected = (file) => {
    form.image = file;
};

// Watch for changes in selectedGroupId
watch(() => props.selectedGroupId, (newGroupId) => {
    console.log('selectedGroupId changed:', newGroupId);
    form.user_subject_group_id = newGroupId;
});

// Watch for changes in subjectToEdit to populate form for editing
watch(() => props.subjectToEdit, (subject) => {
    if (subject) {
        console.log('subject', subject);

        form.subject_id = subject.subject_id;
        form.hour_rate = subject.hour_rate;
        form.description = subject.description || '';
        form.image = null; // Reset image for new upload
    } else {
        // Reset form when not editing
        form.reset();
        form.user_subject_group_id = props.selectedGroupId || null;
    }
}, { immediate: true });



</script>