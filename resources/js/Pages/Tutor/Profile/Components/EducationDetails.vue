<template>
    <div>
        <div class="flex justify-between items-center">
            <div class="flex flex-col">
                <h5 class="text-lg font-medium text-gray-800 dark:text-white/90">
                    {{ $t('tutor.profile.resume_highlights.education.title') }}
                </h5>
                <span class="text-sm text-gray-500 hidden xl:block">
                    {{ $t('tutor.profile.resume_highlights.education.description') }}
                </span>
            </div>
            <div class="">
                <Button variant="primary" size="sm" :text="$t('tutor.profile.actions.add_new')" @click="handleAddNew" />
            </div>
        </div>

        <div class="mt-7">
            <EducationCard v-for="education in educations" :education="education" @edit="handleEdit"
                @delete="handleDelete" />
        </div>

        <Modal :modalActive="modalActive" @close="modalActive = false" :fullScreenBackdrop="true"
            :title="$t('tutor.profile.resume_highlights.education.add_new')" @reset="modalActive = false" @submit="handleSubmit" :loading="form.processing">
            <template #body>
                <form class="flex flex-col gap-4" @submit.prevent="handleSubmit">

                    <UniversalInput :inline="false" :label="$t('tutor.profile.resume_highlights.education.course_title')" v-model="form.course_title"
                        :errors="form.errors.course_title" dir="ltr" />

                    <UniversalInput :inline="false" :label="$t('tutor.profile.resume_highlights.education.institute_name')" v-model="form.institute_name"
                        :errors="form.errors.institute_name" />

                    <UniversalInput :inline="false" :label="$t('tutor.profile.resume_highlights.education.country')" v-model="form.country"
                        :errors="form.errors.country" />

                    <UniversalInput :inline="false" :label="$t('tutor.profile.resume_highlights.education.city')" v-model="form.city" :errors="form.errors.city" />

                    <DateInput :label="$t('tutor.profile.resume_highlights.education.start_date')" v-model="form.start_date" :errors="form.errors.start_date" />

                    <DateInput :label="$t('tutor.profile.resume_highlights.education.end_date')" v-model="form.end_date" :errors="form.errors.end_date" />

                </form>
            </template>
        </Modal>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';
import EducationCard from './EducationCard.vue';
import Button from '@/Components/ui/Button.vue';
import Modal from '@/Components/ui/Modal.vue';
import Swal from 'sweetalert2';

import UniversalInput from '@/Components/forms/FormElements/UniversalInput.vue';
import DateInput from '@/Components/forms/FormElements/DateInput.vue';

const { t } = useI18n();
const modalActive = ref(false);

const page = usePage();
const user = computed(() => page.props.user);
const educations = computed(() => user.value.educations);

const handleEdit = (education) => {
    // Handle edit logic here
    form.course_title = education.course_title;
    form.institute_name = education.institute_name;
    form.city = education.city;
    form.start_date = education.start_date;
    form.end_date = education.end_date;
    form.ongoing = education.ongoing;
    form.description = education.description;
    form.id = education.id;
    modalActive.value = true;
};

const handleDelete = (education) => {
    Swal.fire({
        title: t('tutor.profile.modals.delete_confirmation.title'),
        text: t('tutor.profile.modals.delete_confirmation.education_text'),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: t('tutor.profile.modals.delete_confirmation.confirm_button')
    }).then((result) => {
        if (result.isConfirmed) {
            // console.log('Delete education:', education);
            form.delete(route('tutor.profile.education.destroy', education.id), {
                onSuccess: () => {
                    console.log('Success');
                }
            });
        }
    });
};

const handleAddNew = () => {
    console.log('Add new education');
    form.reset();
    modalActive.value = true;
};

const handleSubmit = () => {
    if (form.id) {
        form.put(route('tutor.profile.education.update', form.id), {
            onSuccess: () => {
                modalActive.value = false;
                form.reset();
            }
        });
    } else {
        form.post(route('tutor.profile.education.store'), {
            onSuccess: () => {
                modalActive.value = false;
                form.reset();
            }
        });
    }
};

const form = useForm({
    id: null,
    course_title: '',
    institute_name: '',
    city: '',
    start_date: '',
    end_date: '',
    ongoing: false,
    description: '',
});

</script>
