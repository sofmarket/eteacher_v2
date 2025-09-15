<template>
    <div>
        <Breadcrumbs :title="$t('tutor.invoices.title')" />
        <TableContent :title="$t('tutor.invoices.title')" :pager="invoices.meta">
            <template #thead>
                <tr>
                    <TableContentCol type="head">{{ $t('tutor.invoices.table.invoice_id') }}</TableContentCol>
                    <TableContentCol type="head">{{ $t('tutor.invoices.table.date') }}</TableContentCol>
                    <TableContentCol type="head">{{ $t('tutor.invoices.table.student_name') }}</TableContentCol>
                    <TableContentCol type="head">{{ $t('tutor.invoices.table.amount') }}</TableContentCol>
                    <TableContentCol type="head">{{ $t('tutor.invoices.table.tutor_payout') }}</TableContentCol>
                    <TableContentCol type="head">{{ $t('tutor.invoices.table.status') }}</TableContentCol>
                    <TableContentCol type="head"></TableContentCol>
                </tr>
            </template>
            <template #actions>
                <SearchInput />
                <StatusFilter :url="route('tutor.invoices.index')"
                    :options="[{ value: 'all', label: $t('tutor.invoices.filters.all_invoices') }, ...statuses]"
                    v-model="filterStatus" />
            </template>
            <template #tbody>
                <TableContentRow v-for="invoice in invoices.data" :key="invoice.id">
                    <TableContentCol>{{ invoice.id }}</TableContentCol>
                    <TableContentCol>{{ invoice.issued_at }}</TableContentCol>
                    <TableContentCol>
                        <div class="flex items-center">
                            <!-- <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full object-cover"
                                    :src="invoice.student.avatar" alt="Student">
                            </div> -->
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">{{
                                    invoice.student.name }}</div>
                            </div>
                        </div>
                    </TableContentCol>
                    <TableContentCol>{{ invoice.amount }}</TableContentCol>
                    <TableContentCol>{{ invoice.tutor_payout }}</TableContentCol>
                    <TableContentCol>
                        <span class="text-theme-xs rounded-full px-2 py-0.5 font-medium" :class="{
                            'text-green-500 dark:text-green-500 bg-green-50 dark:bg-green-900/10': invoice.status === 'paid',
                            'text-red-500 dark:text-red-500 bg-red-50 dark:bg-red-900/10': invoice.status === 'failed',
                            'text-yellow-500 dark:text-yellow-500 bg-yellow-50 dark:bg-yellow-900/10': invoice.status === 'pending',
                            'text-gray-500 dark:text-gray-500 bg-gray-50 dark:bg-gray-900/10': invoice.status === 'refunded',
                        }">
                            {{ invoice.status }}
                        </span>
                    </TableContentCol>
                    <TableContentCol>
                        <div class="relative flex justify-center">
                            <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-1">
                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.99902 10.245C6.96552 10.245 7.74902 11.0285 7.74902 11.995V12.005C7.74902 12.9715 6.96552 13.755 5.99902 13.755C5.03253 13.755 4.24902 12.9715 4.24902 12.005V11.995C4.24902 11.0285 5.03253 10.245 5.99902 10.245ZM17.999 10.245C18.9655 10.245 19.749 11.0285 19.749 11.995V12.005C19.749 12.9715 18.9655 13.755 17.999 13.755C17.0325 13.755 16.249 12.9715 16.249 12.005V11.995C16.249 11.0285 17.0325 10.245 17.999 10.245ZM13.749 11.995C13.749 11.0285 12.9655 10.245 11.999 10.245C11.0325 10.245 10.249 11.0285 10.249 11.995V12.005C10.249 12.9715 11.0325 13.755 11.999 13.755C12.9655 13.755 13.749 12.9715 13.749 12.005V11.995Z"
                                        fill=""></path>
                                </svg>
                            </button>
                        </div>
                    </TableContentCol>
                </TableContentRow>
            </template>
        </TableContent>

    </div>
</template>

<script setup>
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';
import TableContent from '@/Components/tables/TableContent.vue';
import TableContentCol from '@/Components/tables/TableContentCol.vue';
import TableContentRow from '@/Components/tables/TableContentRow.vue';
import StatusFilter from '@/Components/tables/StatusFilter.vue';
import SearchInput from '@/Components/tables/SearchInput.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const invoices = computed(() => page.props.invoices);
const filterStatus = computed(() => page.props.status);
const statuses = computed(() => page.props.statuses);
</script>