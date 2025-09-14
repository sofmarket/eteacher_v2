<template>
    <div>
        <div class="flex justify-between items-center">
            <div class="flex flex-col">
                <h5 class="text-lg font-medium text-gray-800 dark:text-white/90">
                    {{ $t('tutor.profile.resume_highlights.experience.title') }}
                </h5>
                <span class="text-sm text-gray-500 hidden xl:block">
                    {{ $t('tutor.profile.resume_highlights.experience.description') }}
                </span>
            </div>
            <div class="">
                <Button variant="primary" size="sm" :text="$t('tutor.profile.actions.add_new')" @click="handleAddNew" />
            </div>
        </div>

        <div class="mt-7">
            <ExperienceCard v-for="experience in experiences" :experience="experience" @edit="handleEdit"
                @delete="handleDelete" />
        </div>

        <Modal :modalActive="modalActive" @close="modalActive = false" :fullScreenBackdrop="true"
            :title="$t('tutor.profile.resume_highlights.experience.add_new')" @reset="modalActive = false" @submit="handleSubmit" :loading="form.processing">
            <template #body>
                <form class="flex flex-col gap-4" @submit.prevent="handleSubmit">

                    <UniversalInput :inline="false" :label="$t('tutor.profile.resume_highlights.experience.job_title')" v-model="form.title"
                        :errors="form.errors.title" dir="ltr" />

                    <UniversalInput :inline="false" :label="$t('tutor.profile.resume_highlights.experience.company_name')" v-model="form.company"
                        :errors="form.errors.company" />

                    <UniversalInput :inline="false" :label="$t('tutor.profile.resume_highlights.education.country')" v-model="form.country"
                        :errors="form.errors.country" />

                    <UniversalInput :inline="false" :label="$t('tutor.profile.resume_highlights.education.city')" v-model="form.city" :errors="form.errors.city" />

                    <SelectInput v-model="form.employment_type" :label="$t('tutor.profile.resume_highlights.experience.employment_type')" :errors="form.errors.employment_type">
                        <option v-for="employmentType,employmentValue  in employmentTypes" :value="employmentValue"
                            :key="employmentValue">{{ employmentType }}</option>
                    </SelectInput>

                    <SelectInput v-model="form.location" :label="$t('tutor.profile.resume_highlights.experience.employment_location')" :errors="form.errors.location">
                        <option v-for="location,value  in employmentLocations" :value="value"
                            :key="value">{{ location }}</option>
                    </SelectInput>

                    <DateInput :label="$t('tutor.profile.resume_highlights.experience.start_date')" v-model="form.start_date" :errors="form.errors.start_date" />

                    <DateInput :label="$t('tutor.profile.resume_highlights.experience.end_date')" v-model="form.end_date" :errors="form.errors.end_date" />

                </form>
            </template>
        </Modal>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';
import ExperienceCard from './ExperienceCard.vue';
import Button from '@/Components/ui/Button.vue';
import Modal from '@/Components/ui/Modal.vue';
import Swal from 'sweetalert2';

import UniversalInput from '@/Components/forms/FormElements/UniversalInput.vue';
import DateInput from '@/Components/forms/FormElements/DateInput.vue';
import SelectInput from '@/Components/forms/FormElements/SelectInput.vue';

const { t } = useI18n();
const modalActive = ref(false);

const page = usePage();
const user = computed(() => page.props.user);
const experiences = computed(() => user.value.experiences);
const employmentTypes = computed(() => page.props.employmentTypes);
const employmentLocations = computed(() => page.props.employmentLocations);

const handleEdit = (experience) => {
    // Handle edit logic here
    form.title = experience.title;
    form.company = experience.company;
    form.city = experience.city;
    form.start_date = experience.start_date;
    form.end_date = experience.end_date;
    form.ongoing = experience.ongoing;
    form.description = experience.description;
    form.id = experience.id;
    form.employment_type = experience.employment_type;
    form.location = experience.location;
    modalActive.value = true;
};

const handleDelete = (experience) => {
    Swal.fire({
        title: t('tutor.profile.modals.delete_confirmation.title'),
        text: t('tutor.profile.modals.delete_confirmation.experience_text'),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: t('tutor.profile.modals.delete_confirmation.confirm_button')
    }).then((result) => {
        if (result.isConfirmed) {
            // console.log('Delete experience:', experience);
            form.delete(route('tutor.profile.experience.destroy', experience.id), {
                onSuccess: () => {
                    console.log('Success');
                }
            });
        }
    });
};

const handleAddNew = () => {
    form.reset();
    console.log('Add new experience');
    modalActive.value = true;
};

const handleSubmit = () => {
    if (form.id) {
        form.put(route('tutor.profile.experience.update', form.id), {
            onSuccess: () => {
                modalActive.value = false;
                form.reset();
            }
        });
    } else {
        form.post(route('tutor.profile.experience.store'), {
            onSuccess: () => {
                modalActive.value = false;
                form.reset();
            }
        });
    }
};

const form = useForm({
    id: null,
    title: '',
    company: '',
    city: '',
    start_date: '',
    end_date: '',
    ongoing: false,
    employment_type: '',
    location: '',
    description: '',
});

onMounted(() => {
    console.log(employmentTypes.value);
});

</script>
