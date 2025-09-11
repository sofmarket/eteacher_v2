<template>
    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <div class="col-span-12 space-y-6 xl:col-span-7">
            <stats />
            <monthly-sessions />
        </div>
        <div class="col-span-12 xl:col-span-5">
            <monthly-target :stats="stats" />
        </div>

        <div class="col-span-12">
            <statistics-chart />
        </div>

        <div class="col-span-12 xl:col-span-5">
            <customer-demographic />
        </div>

        <div class="col-span-12 xl:col-span-7">
            <recent-bookings :recentBookings="recentBookings" />
        </div>
    </div>
</template>

<script setup>
import Stats from './Components/Stats.vue';
import MonthlySessions from './Components/MonthlySessions.vue';
import StatisticsChart from './Components/StatisticsChart.vue';
import CustomerDemographic from './Components/CustomerDemographic.vue';
import RecentBookings from './Components/RecentBookings.vue';
import MonthlyTarget from './Components/MonthlyTarget.vue';

const props = defineProps({
    stats: Object,
    recentBookings: Object,
});


</script>
