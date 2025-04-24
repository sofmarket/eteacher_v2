<template>
    <form class="flex flex-col" @submit.prevent="onSave">
        <div class="p-2">
            <div class="mt-7">
                <h5 class="mb-5 text-lg font-medium text-gray-800 dark:text-white/90 lg:mb-6">
                    Identity Verification
                </h5>

                <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">

                    <div class="col-span-2">
                        <UniversalInput label="Fullname" v-model="form.fullname" :errors="form.errors.fullname"
                            dir="ltr" />
                    </div>

                    <hr class="col-span-2">

                    <div class="col-span-2">
                        <UniversalInput label="Date of birth" v-model="form.birthdate"
                            :errors="form.errors.birthdate" />
                    </div>

                    <hr class="col-span-2">

                    <div
                        class="col-span-2 flex flex-col lg:flex-row lg:items-center lg:gap-4 sm:flex-row sm:items-center sm:gap-4">
                        <label for="" class="lg:w-1/4 sm:w-1/3">Address</label>
                        <div class="flex-1 gap-4 grid grid-cols-2">
                            <div class="">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    City
                                </label>
                                <select name="" id="city" v-model="form.city"
                                    class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                    <option value="">Select City</option>
                                    <option v-for="city in cities" :value="city.name" :key="city.name">{{ city.name }}
                                    </option>
                                </select>
                            </div>
                            <UniversalInput label="Zip Code" v-model="form.zipcode" :errors="form.errors.zipcode"
                                :inline="false" />
                        </div>

                    </div>

                    <hr class="col-span-2">

                    <div class="col-span-2">
                        <FileInput label="Personal Photo" v-model="form.personal_photo"
                            :errors="form.errors.personal_photo" />
                    </div>

                    <hr class="col-span-2">

                    <div class="col-span-2">
                        <FileInput label="Government-Issued ID" v-model="form.government_issued_id"
                            :errors="form.errors.government_issued_id" />
                    </div>

                    <hr class="col-span-2">

                </div>
            </div>
            <div class="flex items-center gap-3 px-2 mt-6 justify-end">
                <span class="text-sm text-gray-500">Save & update the latest changes to the live</span>
                <button @click="onSave" type="button"
                    class="flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto">
                    Save & Update
                </button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { computed } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import UniversalInput from '@/Components/forms/FormElements/UniversalInput.vue';
import FileInput from '@/Components/forms/FormElements/FileInput.vue';
// use page inertia
const page = usePage();
const user = computed(() => page.props.user);
const cities = computed(() => page.props.cities);

const form = useForm({
    fullname: '',
    birthdate: '',
    city: '',
    zipcode: '',
    personal_photo: '',
    government_issued_id: '',
});

const onSave = () => {
    form.post(route('tutor.profile.update'), {
        onSuccess: () => {
            console.log('success');
        },
    });
}

</script>