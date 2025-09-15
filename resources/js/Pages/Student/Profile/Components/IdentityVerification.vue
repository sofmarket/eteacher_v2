<template>
    <form class="flex flex-col" @submit.prevent="onSave">
        <div class="p-2">
            <div class="mt-7">
                <h5 class="mb-5 text-lg font-medium text-gray-800 dark:text-white/90 lg:mb-6">
                    {{ $t('tutor.profile.identity_verification.title') }}
                </h5>

                <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">

                    <div class="col-span-2">
                        <UniversalInput :label="$t('tutor.profile.identity_verification.fullname')" v-model="form.fullname" :errors="form.errors.fullname"
                            dir="ltr" :inline="false" />
                    </div>

                    <hr class="col-span-2">

                    <div class="col-span-2">
                        <DateInput :label="$t('tutor.profile.identity_verification.date_of_birth')" v-model="form.dob" :errors="form.errors.dob" :inline="false" />
                    </div>

                    <hr class="col-span-2">

                    <div
                        class="col-span-2 flex flex-col lg:flex-row lg:items-center lg:gap-4 sm:flex-row sm:items-center sm:gap-4">
                        <label for="" class="lg:w-1/4 sm:w-1/3">{{ $t('tutor.profile.identity_verification.address') }}</label>
                        <div class="flex-1 gap-4 grid grid-cols-2">
                            <SelectInput v-model="form.city" :label="$t('tutor.profile.identity_verification.city')" :errors="form.errors.city">                                    
                                <option v-for="city in cities" :value="city.name" :key="city.name">{{ city.name }}
                                </option>
                            </SelectInput>
                            <UniversalInput :label="$t('tutor.profile.identity_verification.zip_code')" v-model="form.zipcode" :errors="form.errors.zipcode"
                                :inline="false" />
                        </div>

                    </div>

                    <hr class="col-span-2">

                    <div class="col-span-2">
                        <FileInput :label="$t('tutor.profile.identity_verification.personal_photo')" v-model="form.photo" :errors="form.errors.photo" />
                    </div>

                    <hr class="col-span-2">

                    <div class="col-span-2">
                        <FileInput :label="$t('tutor.profile.identity_verification.government_id')" v-model="form.cin" :errors="form.errors.cin" />
                    </div>

                    <hr class="col-span-2">

                </div>
            </div>
            <div class="flex items-center gap-3 px-2 mt-6 justify-end">
                <span class="text-sm text-gray-500">{{ $t('tutor.profile.identity_verification.save_and_update_description') }}</span>
                <button @click="onSave" type="button"
                    class="flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto">
                    {{ $t('tutor.profile.identity_verification.save_and_update') }}
                </button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { computed } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';
import UniversalInput from '@/Components/forms/FormElements/UniversalInput.vue';
import FileInput from '@/Components/forms/FormElements/FileInput.vue';
import DateInput from '@/Components/forms/FormElements/DateInput.vue';
import SelectInput from '@/Components/forms/FormElements/SelectInput.vue';

const { t } = useI18n();

// use page inertia
const page = usePage();
const cities = computed(() => page.props.cities);

const form = useForm({
    fullname: '',
    dob: '',
    city: '',
    zipcode: '',
    photo: null,
    cin: null,
});

const onSave = () => {
    form.post(route('tutor.profile.identity_verification'), {
        forceFormData: true,
        onSuccess: () => {
            form.reset();
        },
    });
}

</script>