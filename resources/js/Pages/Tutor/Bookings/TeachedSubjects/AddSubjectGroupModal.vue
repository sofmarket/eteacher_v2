<template>

    <Modal :modalActive="modalActive" @close="closeModal" :fullScreenBackdrop="true" title="Add New Education"
        @reset="closeModal" @submit="handleSubmit" :loading="form.processing">
        <template #body>
            <form class="flex flex-col gap-4" @submit.prevent="handleSubmit">

                <UniversalInput :inline="false" label="Subject Groups" v-model="form.subject_groups"
                    :errors="form.errors.subject_groups" />

            </form>
        </template>
    </Modal>

</template>

<script setup>

import { ref, computed } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import Modal from '@/Components/ui/Modal.vue';

import UniversalInput from '@/Components/forms/FormElements/UniversalInput.vue';


const emit = defineEmits(['update:modalActive'])

const props = defineProps({
    modalActive: {
        type: Boolean,
        required: true
    }
});

const page = usePage();
const subjectGroups = computed(() => page.props.subjectGroups.data);

const closeModal = () => emit('update:modalActive', false);

const handleSubmit = () => {
    form.post(route('tutor.profile.education.store'), {
        onSuccess: () => {
            closeModal();
            form.reset();
        }
    });
};

const form = useForm({
    subject_groups: null,
});

</script>