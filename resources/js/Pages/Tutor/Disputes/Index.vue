<template>
    <div class="space-y-6">
        <Breadcrumbs :title="$t('tutor.disputes.title')" />

        <Statistics />

        <TableContent :title="$t('tutor.disputes.page_title')" :description="$t('tutor.disputes.description')"
            :pager="disputes.meta">
            <template #thead>
                <tr>
                    <TableContentCol type="head">{{ $t('tutor.disputes.table.dispute_id') }}</TableContentCol>
                    <TableContentCol type="head">{{ $t('tutor.disputes.table.requested_by') }}</TableContentCol>
                    <TableContentCol type="head">{{ $t('tutor.disputes.table.subject') }}</TableContentCol>
                    <TableContentCol type="head">{{ $t('tutor.disputes.table.create_date') }}</TableContentCol>
                    <TableContentCol type="head">{{ $t('tutor.disputes.table.status') }}</TableContentCol>
                    <TableContentCol type="head"></TableContentCol>
                </tr>
            </template>
            <template #actions>
                <SearchInput />
                <StatusFilter :url="route('tutor.disputes')"
                    :options="[{ value: 'all', label: $t('common.all') }, ...statuses]"
                    v-model="status" />
            </template>
            <template #tbody>
                <TableContentRow v-for="dispute in disputes.data" :key="dispute.id">
                    <TableContentCol>{{ dispute.id }}</TableContentCol>
                    <TableContentCol>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-8 w-8">
                                <div
                                    class="h-8 w-8 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                                    <span class="text-xs font-medium text-gray-600 dark:text-gray-300">
                                        {{ dispute.creatorBy?.name?.charAt(0) || 'U' }}
                                    </span>
                                </div>
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ dispute.creatorBy?.name || 'Unknown User' }}
                                </div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ dispute.creatorBy?.email || '' }}
                                </div>
                            </div>
                        </div>
                    </TableContentCol>
                    <TableContentCol>
                        <div class="text-sm text-gray-900 dark:text-white max-w-xs truncate">
                            {{ dispute.dispute_reason }}
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400 max-w-xs truncate">
                            {{ dispute.dispute_detail }}
                        </div>
                    </TableContentCol>
                    <TableContentCol>{{ formatDate(dispute.created_at) }}</TableContentCol>
                    <TableContentCol>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                            :class="getStatusClasses(dispute.status)">
                            <svg class="-ml-0.5 mr-1.5 h-2 w-2" :class="getStatusDotClasses(dispute.status)"
                                fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3" />
                            </svg>
                            {{ dispute.status }}
                        </span>
                    </TableContentCol>
                    <TableContentCol>
                        <div class="flex items-center  space-x-2">
                            <Link :href="route('tutor.disputes.show', dispute.id)"
                                class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 transition-colors duration-200">
                            {{ $t('tutor.disputes.actions.view_more') }}
                            </Link>
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
import { usePage, Link } from '@inertiajs/vue3';
import Statistics from './Statistics.vue';

const page = usePage();
const disputes = computed(() => page.props.disputes);
const statuses = computed(() => page.props.statuses);
const status = computed(() => page.props.status);

const formatDate = (date) => {
    return new Date(date).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    });
}

const getStatusClasses = (status) => {
    const classes = {
        'closed': 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400',
        'under_review': 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400',
        'in_discussion': 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400',
        'pending': 'bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-300'
    };
    return classes[status] || classes['pending'];
}

const getStatusDotClasses = (status) => {
    const classes = {
        'closed': 'text-green-400',
        'under_review': 'text-yellow-400',
        'in_discussion': 'text-blue-400',
        'pending': 'text-gray-400'
    };
    return classes[status] || classes['pending'];
}
</script>