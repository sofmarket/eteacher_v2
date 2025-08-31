<template>

    <div>

        <Breadcrumbs title="Bookings" />

        <Tabs :tabs="tabs" defaultTab="manage-sessions">

            <template #teached-subjects>
                <TeachedSubjects />
            </template>

            <template #manage-sessions>
                <ManageSessions />
            </template>

            <template #upcoming-bookings>
                <UpcomingBookings />
            </template>

        </Tabs>
    </div>


</template>

<script setup>

import Tabs from '@/Components/ui/Tabs.vue';
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';
import TeachedSubjects from './TeachedSubjects/TeachedSubjects.vue';
import ManageSessions from './ManageSessions/ManageSessions.vue';
import UpcomingBookings from './UpcomingBookings/UpcomingBookings.vue';

const tabs = [
    { id: 'teached-subjects', label: 'Subjects I Can Teach' },
    { id: 'manage-sessions', label: 'Manage Sessions' },
    { id: 'upcoming-bookings', label: 'Upcoming Bookings' },
];

</script>