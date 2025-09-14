<template>
    <Modal :modalActive="modalActive" @close="closeModal" :fullScreenBackdrop="true" :title="$t('tutor.bookings.subject_group_modal.title')"
        @reset="closeModal" @submit="handleSubmit" :loading="form.processing">
        <template #body>
            <form class="flex flex-col gap-4" @submit.prevent="handleSubmit">
                <ChoicesInput :label="$t('tutor.bookings.subject_group_modal.choose_subject_category')" multiple v-model="form.subject_groups">
                    <option v-for="group in subjectGroups" :value="group.id" :key="group.id">{{ group.name }}
                    </option>
                </ChoicesInput>
            </form>
        </template>
    </Modal>
</template>

<script setup>

import { computed, onMounted } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import Modal from '@/Components/ui/Modal.vue';
import ChoicesInput from '@/Components/forms/FormElements/ChoicesInput.vue';

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
    form.post(route('tutor.user.subject.group.store'), {
        onSuccess: () => {
            closeModal();
        }
    });
};

const form = useForm({
    subject_groups: page.props.userSubjectGroups.data.map(group => group.subject_group_id),
});

</script>