<template>
  <form class="flex flex-col" @submit.prevent="onSave">
    <div class="p-2">
      <div class="mt-7">
        <h5 class="mb-5 text-lg font-medium text-gray-800 dark:text-white/90 lg:mb-6">
          Personal Information
        </h5>

        <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">


          <div
            class="col-span-2 flex flex-col lg:flex-row lg:items-center lg:gap-4 sm:flex-row sm:items-center sm:gap-4">
            <label for="" class="lg:w-1/4 sm:w-1/3">Fullname</label>
            <div class="flex-1 flex gap-4 grid grid-cols-2">
              <UniversalInput v-model="form.first_name" :errors="form.errors.first_name" :inline="false" />
              <UniversalInput v-model="form.last_name" :errors="form.errors.last_name" :inline="false" />
            </div>
          </div>

          <hr class="col-span-2">

          <div class="col-span-2">
            <UniversalInput label="Email Address" v-model="form.email" :errors="form.errors.email" dir="ltr" />
          </div>

          <hr class="col-span-2">

          <div class="col-span-2">
            <UniversalInput label="Phone" v-model="form.phone_number" :errors="form.errors.phone_number" />
          </div>

          <hr class="col-span-2">

          <div
            class="col-span-2 flex flex-col lg:flex-row lg:items-center lg:gap-4 sm:flex-row sm:items-center sm:gap-4">
            <label for="" class="lg:w-1/4 sm:w-1/3">Gender</label>
            <div class="flex-1 flex gap-4">

              <CheckboxInput label="Male" type="radio" name="gender" v-model="form.gender" value="male"
                :errors="form.errors.gender" />

              <CheckboxInput label="Female" type="radio" name="gender" v-model="form.gender" value="female"
                :errors="form.errors.gender" />

            </div>
          </div>

          <hr class="col-span-2">

          <div class="col-span-2">
            <UniversalInput label="Tag line" v-model="form.tagline" :errors="form.errors.tagline" />
          </div>

          <hr class="col-span-2">

          <div class="col-span-2">
            <UniversalInput label="Meta Keywords" v-model="form.keywords" :errors="form.errors.keywords" />
          </div>

          <hr class="col-span-2">

          <div class="col-span-2">
            <UniversalInput label="Address" v-model="form.address" :errors="form.errors.address" :inline="false" />
          </div>

          <div class="col-span-2 lg:col-span-1">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              City
            </label>
            <select name="" id="city" v-model="form.city"
              class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
              <option value="">Select City</option>
              <option v-for="city in cities" :value="city.name" :key="city.name"
                :selected="user.address?.city == city.name">{{ city.name }}</option>
            </select>
          </div>

          <div class="col-span-2 lg:col-span-1">
            <UniversalInput label="Zip Code" v-model="form.zipcode" :errors="form.errors.zipcode" :inline="false" />
          </div>

          <hr class="col-span-2">

          <div class="col-span-2">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              Native Language
            </label>
            <select name="" id="" v-model="form.native_language"
              class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
              <option value="">Select Native Language</option>
              <option v-for="language in languages" :value="language.name" :key="language.name">{{ language.name }}
              </option>
            </select>
          </div>

          <hr class="col-span-2">

          <div class="col-span-2">
            <SelectInput label="Languages I know" multiple v-model="form.languages">
              <option v-for="language in languages" :value="language.name" :key="language.name">{{ language.name }}
              </option>
            </SelectInput>
          </div>

          <hr class="col-span-2">

          <div class="col-span-2">
            <UniversalInput label="A brief introduction" v-model="form.description" :errors="form.errors.description" />
          </div>

          <hr class="col-span-2">

          <div class="col-span-2">
            <FileInput label="Profile Image" :errors="form.errors.image" @file-selected="onFileSelected" />
          </div>

          <hr class="col-span-2">

          <div class="col-span-2">
            <UniversalInput label="Introduction Video" v-model="form.intro_video" :errors="form.errors.intro_video" />
          </div>

          <hr class="col-span-2">

        </div>
      </div>
      <div class="mt-7">
        <h5 class="mb-5 text-lg font-medium text-gray-800 dark:text-white/90 lg:mb-6">
          Social Links
        </h5>

        <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
          <div v-for="platform in socialPlatforms" :key="platform">
            <UniversalInput :label="platform" v-model="form.social_profiles[platform]"
              @input="onChangeSocialProfile(platform)" :inline="false" />
          </div>
        </div>
      </div>

      <hr class="col-span-2 mt-7">

    </div>
    <div class="flex items-center gap-3 px-2 mt-6 justify-end">
      <span class="text-sm text-gray-500">Save & update the latest changes to the live</span>
      <button @click="onSave" type="button"
        class="flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto">
        Save & Update
      </button>
    </div>
  </form>
</template>

<script setup>
import { computed, onMounted, nextTick } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import UniversalInput from '@/Components/forms/FormElements/UniversalInput.vue';
import CheckboxInput from '@/Components/forms/FormElements/CheckboxInput.vue';
import FileInput from '@/Components/forms/FormElements/FileInput.vue';
import SelectInput from '@/Components/forms/FormElements/SelectInput.vue';
// use page inertia
const page = usePage();
const user = computed(() => page.props.user);
const cities = computed(() => page.props.cities);
const languages = computed(() => page.props.languages);

const socialPlatforms = computed(() => page.props.socialPlatforms);

const form = useForm({
  email: user.value.email,
  first_name: user.value.profile.first_name,
  last_name: user.value.profile.last_name,
  phone_number: user.value.profile.phone_number,
  description: user.value.profile.description,
  tagline: user.value.profile.tagline,
  keywords: user.value.profile.keywords,
  address: user.value.address?.address,
  zipcode: user.value.address?.zipcode,
  city: user.value.address?.city,
  native_language: user.value.profile.native_language,
  languages: user.value.profile.languages,
  intro_video: user.value.profile.intro_video,
  // image: user.value.profile.image,
  gender: user.value.profile.gender,
  social_profiles: {},
});

const onSave = () => {
  form.post(route('tutor.profile.update'), {
    onSuccess: () => {
      console.log('success');
    },
  });
}

const onChangeSocialProfile = (platform) => {
  console.log('onChangeSocialProfile', platform);
}

const getSocialProfile = (platform) => {
  const socialProfile = user.value?.social_profiles.find(profile => profile.type === platform);
  return socialProfile?.url;
}

const onChangeLanguages = (e) => {
  console.log('onChangeLanguages', e);
}

const onFileSelected = (file) => {
  form.image = file;
}

onMounted(() => {
  socialPlatforms.value.forEach(platform => {
    form.social_profiles[platform] = getSocialProfile(platform);
  });

  nextTick(() => {
    //todo:  apply select2 to the city select
  });

})

</script>
