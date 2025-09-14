<template>
    <div class="p-2">
        <div class="mt-7">
            <h5 class="mb-5 text-lg font-medium text-gray-800 dark:text-white/90 lg:mb-6">
            {{ $t('tutor.profile.resume_highlights.title') }}
            </h5>
            <VerticalTabs :tabs="tabs" class="mt-5">
                <template #education>
                    <EducationDetails />
                </template>
                <template #experience>
                    <Experience />
                </template>
                <template #certifications>
                    <Certificates />
                </template> 
            </VerticalTabs>
        </div>
    </div>
</template>

<script setup>
import { useI18n } from 'vue-i18n';

import VerticalTabs from '@/Components/ui/VerticalTabs.vue';
import EducationDetails from './EducationDetails.vue';
import Experience from './Experience.vue';
import Certificates from './Certificates.vue';

const { t } = useI18n();

const tabs = [
  { id: 'education', label: t('tutor.profile.resume_highlights.tabs.education') },
  { id: 'experience', label: t('tutor.profile.resume_highlights.tabs.experience') },
  { id: 'certifications', label: t('tutor.profile.resume_highlights.tabs.certifications') }
];

</script>
