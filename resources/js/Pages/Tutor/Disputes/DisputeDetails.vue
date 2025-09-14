<template>
    <div class="xl:col-span-4 2xl:col-span-3">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-800">
                <h3 class="text-lg font-medium text-gray-800 dark:text-white/90">
                    Dispute Details
                </h3>
            </div>
            <ul class="divide-y divide-gray-100 px-6 py-3 dark:divide-gray-800">
                <li class="grid grid-cols-2 gap-5 py-2.5">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Student</span>
                    <span class="text-gray-700 dark:text-gray-400">{{ dispute.creatorBy?.name }}</span>
                </li>
                <li class="grid grid-cols-2 gap-5 py-2.5">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Email</span>
                    <span class="text-sm break-words text-gray-700 dark:text-gray-400">{{
                        dispute.creatorBy?.email }}</span>
                </li>
                <li class="grid grid-cols-2 gap-5 py-2.5">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Dispute ID
                    </span>
                    <span class="text-sm text-gray-700 dark:text-gray-400">{{ dispute.ref }}</span>
                </li>
                <li class="grid grid-cols-2 gap-5 py-2.5">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Dispute Reason</span>
                    <span class="text-sm text-gray-700 dark:text-gray-400">{{ dispute.dispute_reason }}</span>
                </li>
                <li class="grid grid-cols-2 gap-5 py-2.5">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Created</span>
                    <span class="text-sm text-gray-700 dark:text-gray-400">{{ dispute.created_at }}</span>
                </li>
                <li class="grid grid-cols-2 gap-5 py-2.5">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Status</span>
                    <div>
                        <span
                            class="bg-blue-light-50 dark:bg-blue-light-500/15 dark:text-blue-light-500 text-theme-xs text-blue-light-500 inline-block rounded-full px-2 py-0.5 font-medium">
                            {{ dispute.status }}
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const dispute = computed(() => page.props.dispute.data);
</script>