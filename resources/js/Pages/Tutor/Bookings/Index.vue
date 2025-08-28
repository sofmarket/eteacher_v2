<template>

    <div>

        <Breadcrumbs title="Bookings" />

        <Tabs :tabs="tabs">

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
import ManageSessions from './Components/ManageSessions.vue';
import UpcomingBookings from './Components/UpcomingBookings.vue';

const tabs = [
    { id: 'teached-subjects', label: 'Subjects I Can Teach' },
    { id: 'manage-sessions', label: 'Manage Sessions' },
    { id: 'upcoming-bookings', label: 'Upcoming Bookings' },
];

</script>