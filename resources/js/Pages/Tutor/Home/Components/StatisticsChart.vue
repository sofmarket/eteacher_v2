<template>
  <div
    class="rounded-2xl border border-gray-200 bg-white px-5 pb-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6"
  >
    <div class="flex flex-col gap-5 mb-6 sm:flex-row sm:justify-between">
      <div class="w-full">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">{{ $t('tutor.home.statistics.title') }}</h3>
        <p class="mt-1 text-gray-500 text-theme-sm dark:text-gray-400">
          {{ $t('tutor.dashboard.target_for_each_month') }}
        </p>
      </div>

      <div class="relative">
        <!-- <div class="inline-flex items-center gap-0.5 rounded-lg bg-gray-100 p-0.5 dark:bg-gray-900">
          <button
            v-for="option in options"
            :key="option.value"
            @click="selected = option.value"
            :class="[
              selected === option.value
                ? 'shadow-theme-xs text-gray-900 dark:text-white bg-white dark:bg-gray-800'
                : 'text-gray-500 dark:text-gray-400',
              'px-3 py-2 font-medium rounded-md text-theme-sm hover:text-gray-900 hover:shadow-theme-xs dark:hover:bg-gray-800 dark:hover:text-white',
            ]"
          >
            {{ option.label }}
          </button>
        </div> -->
      </div>
    </div>
    <div class="max-w-full overflow-x-auto custom-scrollbar">
      <div id="chartThree" class="-ml-4 min-w-[1000px] xl:min-w-full pl-2">
        <VueApexCharts type="area" height="310" :options="chartOptions" :series="series" />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';

const page = usePage();
const { t } = useI18n();
const monthlyRevenue = computed(() => page.props.monthlyRevenue);

const options = [
  { value: 'optionOne', label: t('tutor.home.statistics.monthly') },
  { value: 'optionTwo', label: t('tutor.home.statistics.quarterly') },
  { value: 'optionThree', label: t('tutor.home.statistics.annually') },
];

const selected = ref('optionOne');
import VueApexCharts from 'vue3-apexcharts';


const getMonthName = (monthNumber) => {
  const months = [
    t('tutor.home.statistics.months.january'), t('tutor.home.statistics.months.february'), t('tutor.home.statistics.months.march'), t('tutor.home.statistics.months.april'), t('tutor.home.statistics.months.may'), t('tutor.home.statistics.months.june'),
    t('tutor.home.statistics.months.july'), t('tutor.home.statistics.months.august'), t('tutor.home.statistics.months.september'), t('tutor.home.statistics.months.october'), t('tutor.home.statistics.months.november'), t('tutor.home.statistics.months.december')
  ];
  return months[parseInt(monthNumber) - 1] || monthNumber;
};

const series = ref([
  {
    name: t('tutor.home.statistics.bookings'),
    data: monthlyRevenue.value.map(revenue => revenue.bookings_count),
  },
  {
    name: t('tutor.home.statistics.revenue'),
    data: monthlyRevenue.value.map(revenue => revenue.revenue),
  },
]);

const chartOptions = ref({
  legend: {
    show: false,
    position: 'top',
    horizontalAlign: 'left',
  },
  colors: ['#465FFF', '#9CB9FF'],
  chart: {
    fontFamily: 'Outfit, sans-serif',
    type: 'area',
    toolbar: {
      show: false,
    },
  },
  fill: {
    gradient: {
      enabled: true,
      opacityFrom: 0.55,
      opacityTo: 0,
    },
  },
  stroke: {
    curve: 'straight',
    width: [2, 2],
  },
  markers: {
    size: 0,
  },
  labels: {
    show: false,
    position: 'top',
  },
  grid: {
    xaxis: {
      lines: {
        show: false,
      },
    },
    yaxis: {
      lines: {
        show: true,
      },
    },
  },
  dataLabels: {
    enabled: false,
  },
  tooltip: {
    x: {
      format: 'dd MMM yyyy',
    },
  },
  xaxis: {
    type: 'category',
    categories: monthlyRevenue.value.map(revenue => revenue.month),
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
    tooltip: {
      enabled: false,
    },
  },
  yaxis: {
    title: {
      style: {
        fontSize: '0px',
      },
    },
  },
})
</script>

<style scoped>
.area-chart {
  width: 100%;
}
</style>
