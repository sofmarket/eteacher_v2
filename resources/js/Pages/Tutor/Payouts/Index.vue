<template>
    <div>
        <Breadcrumbs :title="$t('tutor.payouts.title')" />
        <TableContent :title="$t('tutor.payouts.title')" :description="$t('tutor.payouts.description')"
            :pager="payouts.meta">
            <template #thead>
                <tr>
                    <TableContentCol type="head">{{ $t('tutor.payouts.table.ref') }}</TableContentCol>
                    <TableContentCol type="head">{{ $t('tutor.payouts.table.method') }}</TableContentCol>
                    <TableContentCol type="head">{{ $t('tutor.payouts.table.date') }}</TableContentCol>
                    <TableContentCol type="head">{{ $t('tutor.payouts.table.amount') }}</TableContentCol>
                    <TableContentCol type="head">{{ $t('tutor.payouts.table.status') }}</TableContentCol>
                </tr>
            </template>
            <template #actions>
                <StatusFilter :url="route('tutor.payouts')"
                    :options="[{ value: 'all', label: $t('tutor.payouts.filters.all_payouts') }, ...statuses]"
                    v-model="filterStatus" />
            </template>
            <template #tbody>
                <TableContentRow v-for="payout in payouts.data" :key="payout.id">
                    <TableContentCol>{{ payout.id }}</TableContentCol>
                    <TableContentCol>{{ payout.payout_method }}</TableContentCol>
                    <TableContentCol>{{ payout.created_at }}</TableContentCol>
                    <TableContentCol>{{ payout.amount }}</TableContentCol>
                    <TableContentCol>
                        <span class="text-theme-xs rounded-full px-2 py-0.5 font-medium" :class="{
                            'text-green-500 dark:text-green-500 bg-green-50 dark:bg-green-900/10': payout.status === 'paid',
                            'text-red-500 dark:text-red-500 bg-red-50 dark:bg-red-900/10': payout.status === 'declined',
                            'text-yellow-500 dark:text-yellow-500 bg-yellow-50 dark:bg-yellow-900/10': payout.status === 'pending',
                        }">
                            {{ payout.status }}
                        </span>
                    </TableContentCol>
                </TableContentRow>
            </template>
        </TableContent>
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';
import TableContent from '@/Components/tables/TableContent.vue';
import TableContentCol from '@/Components/tables/TableContentCol.vue';
import TableContentRow from '@/Components/tables/TableContentRow.vue';
import StatusFilter from '@/Components/tables/StatusFilter.vue';

const page = usePage();
const payouts = computed(() => page.props.payouts);
const filterStatus = computed(() => page.props.status);
const statuses = computed(() => page.props.statuses);
</script>