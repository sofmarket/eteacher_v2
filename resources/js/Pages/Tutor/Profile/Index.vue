<template>

  <div>

    <Breadcrumbs :title="$t('tutor.profile.title')" />

    <Tabs :tabs="tabs">

      <template #personal-information>
        <PersonalDetails />
      </template>

      <template #account-settings>
        <AccountSettings />
      </template>

      <template #resume-highlights>
        <ResumeHighlights />
      </template>

      <template #identity-verification>
        <IdentityVerification />
      </template>
    
    </Tabs>
  </div>

</template>

<script setup>
import { useI18n } from 'vue-i18n';

import Tabs from '@/Components/ui/Tabs.vue';
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';
import PersonalDetails from './Components/PersonalDetails.vue';
import ResumeHighlights from './Components/ResumeHighlights.vue';
import IdentityVerification from './Components/IdentityVerification.vue';
import AccountSettings from './Components/AccountSettings.vue';

const { t } = useI18n();

const tabs = [
  { id: 'personal-information', label: t('tutor.profile.tabs.personal_information') },
  { id: 'account-settings', label: t('tutor.profile.tabs.account_settings') },
  { id: 'resume-highlights', label: t('tutor.profile.tabs.resume_highlights') },
  { id: 'identity-verification', label: t('tutor.profile.tabs.identity_verification') }
];
</script>
