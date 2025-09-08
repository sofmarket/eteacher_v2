<template>
    <div class="space-y-6">
        <Breadcrumbs :items="breadcrumbs" />
        
    </div>
</template>

<script setup>

import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';

const page = usePage();
const dispute = computed(() => page.props.dispute);

const breadcrumbs = computed(() => [
    { label: 'Disputes', href: route('tutor.disputes') },
    { label: `#${dispute.value.uuid.substring(0, 8)}` }
]);

</script>
