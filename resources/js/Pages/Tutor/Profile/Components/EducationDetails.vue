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
            <EducationCard v-for="education in user.educations" :education="education" @edit="handleEdit" @delete="handleDelete" />
        </div>

        <Modal :modalActive="modalActive" @close="modalActive = false" :fullScreenBackdrop="true"
            title="Add New Education">
            <template #body>
                <div class="flex flex-col gap-4">
                    
                    <UniversalInput :inline="false" label="Degree" v-model="form.degree" :errors="form.errors.degree"
                    dir="ltr" />
                    
                    <UniversalInput :inline="false" label="University" v-model="form.university" :errors="form.errors.university" />
                    
                    <UniversalInput :inline="false" label="Country" v-model="form.country" :errors="form.errors.country" />
                    
                    <UniversalInput :inline="false" label="City" v-model="form.city" :errors="form.errors.city" />



                    <DateInput label="Start Date" v-model="form.startDate" :errors="form.errors.startDate" />
                    
                    <DateInput label="End Date" v-model="form.endDate" :errors="form.errors.endDate" />
                    


                </div>
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

import UniversalInput from '@/Components/forms/FormElements/UniversalInput.vue';
import DateInput from '@/Components/forms/FormElements/DateInput.vue';

const modalActive = ref(false);

const page = usePage();
const user = computed(() => page.props.user);

const education = ref({
    degree: 'Bachelor of Computer Science',
    university: 'University of California',
    location: 'Los Angeles',
    startDate: 'September 2015',
    endDate: 'June 2019'
});

const handleEdit = (education) => {
    // Handle edit logic here
    console.log('Edit education:', education);
};

const handleDelete = (education) => {
    // Handle delete logic here
    console.log('Delete education:', education);
};

const handleAddNew = () => {
    console.log('Add new education');
    modalActive.value = true;
};

const form = useForm({
    degree: '',
    university: '',
    country: '',
    city: '',
    startDate: '',
    endDate: ''
});



</script>
