<template>

  <div>

    <Breadcrumbs title="User Profile" />

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

import Tabs from '@/Components/ui/Tabs.vue';
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';
import PersonalDetails from './Components/PersonalDetails.vue';
import ResumeHighlights from './Components/ResumeHighlights.vue';
import IdentityVerification from './Components/IdentityVerification.vue';
import AccountSettings from './Components/AccountSettings.vue';

const tabs = [
  { id: 'personal-information', label: 'Personal Information' },
  { id: 'account-settings', label: 'Account Settings' },
  { id: 'resume-highlights', label: 'Resume Highlights' },
  { id: 'identity-verification', label: 'Identity Verification' }
];
</script>
