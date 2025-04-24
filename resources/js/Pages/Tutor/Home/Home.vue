<template>
    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <div class="col-span-12 space-y-6 xl:col-span-7">
            <ecommerce-metrics />
            <monthly-sales />
        </div>
        <div class="col-span-12 xl:col-span-5">
            <monthly-target />
        </div>

        <div class="col-span-12">
            <statistics-chart />
        </div>

        <div class="col-span-12 xl:col-span-5">
            <customer-demographic />
        </div>

        <div class="col-span-12 xl:col-span-7">
            <recent-orders />
        </div>
    </div>
</template>

<script setup>
import EcommerceMetrics from './Components/EcommerceMetrics.vue';
import MonthlySales from './Components/MonthlySales.vue';
import StatisticsChart from './Components/StatisticsChart.vue';
import CustomerDemographic from './Components/CustomerDemographic.vue';
import RecentOrders from './Components/RecentOrders.vue';
import MonthlyTarget from './Components/MonthlyTarget.vue';
</script>
