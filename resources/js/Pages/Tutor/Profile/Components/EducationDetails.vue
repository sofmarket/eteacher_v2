<template>
    <div>
        <div class="flex justify-between items-center">
            <div class="flex flex-col">
                <h5 class="text-lg font-medium text-gray-800 dark:text-white/90">
                    Education Details
                </h5>
                <span class="text-sm text-gray-500 hidden xl:block">
                    Please provide your educational background to help us assess your qualifications.
                </span>
            </div>
            <div class="">
                <Button variant="primary" size="sm" text="+ Add New" @click="handleAddNew" />
            </div>
        </div>

        <div class="mt-7">
            <EducationCard v-for="education in educations" :education="education" @edit="handleEdit"
                @delete="handleDelete" />
        </div>

        <Modal :modalActive="modalActive" @close="modalActive = false" :fullScreenBackdrop="true"
            title="Add New Education" @reset="modalActive = false" @submit="handleSubmit" :loading="form.processing">
            <template #body>
                <form class="flex flex-col gap-4" @submit.prevent="handleSubmit">

                    <UniversalInput :inline="false" label="Course Title" v-model="form.course_title"
                        :errors="form.errors.course_title" dir="ltr" />

                    <UniversalInput :inline="false" label="Institute Name" v-model="form.institute_name"
                        :errors="form.errors.institute_name" />

                    <UniversalInput :inline="false" label="Country" v-model="form.country"
                        :errors="form.errors.country" />

                    <UniversalInput :inline="false" label="City" v-model="form.city" :errors="form.errors.city" />

                    <DateInput label="Start Date" v-model="form.start_date" :errors="form.errors.start_date" />

                    <DateInput label="End Date" v-model="form.end_date" :errors="form.errors.end_date" />

                </form>
            </template>
        </Modal>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import EducationCard from './EducationCard.vue';
import Button from '@/Components/ui/Button.vue';
import Modal from '@/Components/ui/Modal.vue';
import Swal from 'sweetalert2';

import UniversalInput from '@/Components/forms/FormElements/UniversalInput.vue';
import DateInput from '@/Components/forms/FormElements/DateInput.vue';

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
        title: 'Are you sure?',
        text: 'You will not be able to recover this education!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
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
