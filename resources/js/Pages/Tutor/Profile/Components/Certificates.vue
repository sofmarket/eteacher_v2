<template>
    <div>
        <div class="flex justify-between items-center">
            <div class="flex flex-col">
                <h5 class="text-lg font-medium text-gray-800 dark:text-white/90">
                    {{ $t('tutor.profile.resume_highlights.certificates.title') }}
                </h5>
                <span class="text-sm text-gray-500 hidden xl:block">
                    {{ $t('tutor.profile.resume_highlights.certificates.description') }}
                </span>
            </div>
            <div class="">
                <Button variant="primary" size="sm" :text="$t('tutor.profile.actions.add_new')" @click="handleAddNew" />
            </div>
        </div>

        <div class="mt-7">
            <CertificateCard v-for="certificate in certificates" :certificate="certificate" @edit="handleEdit"
                @delete="handleDelete" />
        </div>

        <Modal :modalActive="modalActive" @close="modalActive = false" :fullScreenBackdrop="true"
            :title="$t('tutor.profile.resume_highlights.certificates.add_new')" @reset="modalActive = false" @submit="handleSubmit" :loading="form.processing">
            <template #body>
                <form class="flex flex-col gap-4" @submit.prevent="handleSubmit">

                    <FileInput :label="$t('tutor.profile.resume_highlights.certificates.upload_photo')" :errors="form.errors.photo"
                        @file-selected="onFileSelected" :inline="false" />

                    <UniversalInput :inline="false" :label="$t('tutor.profile.resume_highlights.certificates.certificate_title')" v-model="form.title"
                        :errors="form.errors.title" dir="ltr" />

                    <UniversalInput :inline="false" :label="$t('tutor.profile.resume_highlights.certificates.university_institute')" v-model="form.institute_name"
                        :errors="form.errors.institute_name" />

                    <div class="flex-1 flex gap-4 grid grid-cols-2">
                        <DateInput :label="$t('tutor.profile.resume_highlights.certificates.issue_date')" v-model="form.issue_date" :errors="form.errors.issue_date" />
                        <DateInput :label="$t('tutor.profile.resume_highlights.certificates.expiry_date')" v-model="form.expiry_date" :errors="form.errors.expiry_date" />
                    </div>

                    <TextArea :label="$t('tutor.profile.resume_highlights.certificates.description')" v-model="form.description" :errors="form.errors.description" />

                </form>
            </template>
        </Modal>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';
import CertificateCard from './CertificateCard.vue';
import Button from '@/Components/ui/Button.vue';
import Modal from '@/Components/ui/Modal.vue';
import Swal from 'sweetalert2';

import UniversalInput from '@/Components/forms/FormElements/UniversalInput.vue';
import DateInput from '@/Components/forms/FormElements/DateInput.vue';
import FileInput from '@/Components/forms/FormElements/FileInput.vue';
import TextArea from '@/Components/forms/FormElements/TextArea.vue';

const { t } = useI18n();
const modalActive = ref(false);

const page = usePage();
const user = computed(() => page.props.user);
const certificates = computed(() => user.value.certificates);

const handleEdit = (certificate) => {
    // Handle edit logic here
    form.title = certificate.title;
    form.institute_name = certificate.institute_name;
    form.issue_date = certificate.issue_date;
    form.expiry_date = certificate.expiry_date;
    form.description = certificate.description;
    form.id = certificate.id;
    modalActive.value = true;
};

const handleDelete = (certificate) => {
    Swal.fire({
        title: t('tutor.profile.modals.delete_confirmation.title'),
        text: t('tutor.profile.modals.delete_confirmation.certificate_text'),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: t('tutor.profile.modals.delete_confirmation.confirm_button')
    }).then((result) => {
        if (result.isConfirmed) {
            // console.log('Delete certificate:', certificate);
            form.delete(route('tutor.profile.certificate.destroy', certificate.id), {
                onSuccess: () => {
                    console.log('Success');
                }
            });
        }
    });
};

const handleAddNew = () => {
    console.log('Add new certificate');
    form.reset();
    modalActive.value = true;
};

const handleSubmit = () => {
    if (form.id) {
        form.put(route('tutor.profile.certificate.update', form.id), {
            forceFormData: true,
            onSuccess: () => {
                modalActive.value = false;
                form.reset();
            }
        });
    } else {
        form.post(route('tutor.profile.certificate.store'), {
            forceFormData: true,
            onSuccess: () => {
                modalActive.value = false;
                form.reset();
            }
        });
    }
};

const onFileSelected = (file) => {
    form.photo = file;
}

const form = useForm({
    id: null,
    title: '',
    institute_name: '',
    description: '',
    issue_date: '',
    expiry_date: '',
    photo: null,
});

onMounted(() => {
    //
});

</script>
