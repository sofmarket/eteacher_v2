<template>
  <form class="flex flex-col" @submit.prevent="onSave">
    <div class="p-2">
      <div class="mt-7">
        <h5 class="mb-5 text-lg font-medium text-gray-800 dark:text-white/90 lg:mb-6">
          {{ $t('tutor.profile.account_settings.title') }}
        </h5>

        <div class="grid grid-cols-1 gap-x-6 gap-y-5">

          <PasswordInput :label="$t('tutor.profile.account_settings.current_password')" v-model="form.current_password"
            :errors="form.errors.current_password" name="current_password" />

          <PasswordInput :label="$t('tutor.profile.account_settings.password')" v-model="form.password" :errors="form.errors.password" name="password" />

          <PasswordInput :label="$t('tutor.profile.account_settings.confirm_password')" v-model="form.password_confirmation"
            :errors="form.errors.password_confirmation" name="password_confirmation" />

        </div>
      </div>

      <div class="flex items-center gap-3 px-2 mt-6 justify-end">
        <span class="text-sm text-gray-500">{{ $t('tutor.profile.account_settings.save_and_update_description') }}</span>
        <button @click="onSave" type="button"
          class="flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto">
          {{ $t('tutor.profile.account_settings.save_and_update') }}
        </button>
      </div>
    </div>
  </form>
</template>

<script setup>

import { useForm } from '@inertiajs/vue3';
import PasswordInput from '@/Components/forms/FormElements/PasswordInput.vue';
import { useI18n } from 'vue-i18n';

const { t } = useI18n();

const form = useForm({
  current_password: '',
  password: '',
  password_confirmation: '',
});

const onSave = () => {
  form.post(route('tutor.profile.update-password'), {
    onSuccess: () => {
      form.reset();
    }
  });
};

</script>
