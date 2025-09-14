<template>
    <Breadcrumbs :breadcrumbs="breadcrumbs" title="Dispute Details" />

    <div class="overflow-hidden xl:h-[calc(100vh-180px)]">
        <div class="grid h-full grid-cols-1 gap-5 xl:grid-cols-12">
            <!-- Left -->
            <div class="xl:col-span-8 2xl:col-span-9">
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <!-- Header -->
                    <div
                        class="flex flex-col justify-between gap-5 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center dark:border-gray-800">
                        <div>
                            <h3 class="text-lg font-medium text-gray-800 dark:text-white/90">
                                {{ dispute.ref }} - {{ dispute.dispute_reason }}
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ dispute.created_at }}
                            </p>
                        </div>
                    </div>

                    <div class="relative px-6 py-7">
                        <div
                            class="custom-scrollbar h-[calc(58vh-162px)] space-y-7 divide-y divide-gray-200 overflow-y-auto pr-2 dark:divide-gray-800">
                        <DisputeConversationMessage />
                        </div>

                        <!-- Fixed Input Wrapper -->
                        <div class="pt-5">
                            <!-- Container with max width -->
                            <div
                                class="mx-auto max-h-[162px] w-full rounded-2xl border border-gray-200 shadow-xs dark:border-gray-800 dark:bg-gray-800">
                                <!-- Textarea -->
                                <textarea placeholder="Type your reply here..."
                                    class="h-20 w-full resize-none border-none bg-transparent p-5 font-normal text-gray-800 outline-none placeholder:text-gray-400 focus:ring-0 dark:text-white"></textarea>

                                <!-- Bottom Section -->
                                <div class="flex items-center justify-between p-3">
                                    <button
                                        class="flex h-9 items-center gap-1.5 rounded-lg bg-transparent px-2 py-3 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-gray-300">
                                        <!-- Attach Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none">
                                            <path
                                                d="M14.4194 11.7679L15.4506 10.7367C17.1591 9.02811 17.1591 6.25802 15.4506 4.54947C13.742 2.84093 10.9719 2.84093 9.2634 4.54947L8.2322 5.58067M11.77 14.4172L10.7365 15.4507C9.02799 17.1592 6.2579 17.1592 4.54935 15.4507C2.84081 13.7422 2.84081 10.9721 4.54935 9.26352L5.58285 8.23002M11.7677 8.23232L8.2322 11.7679"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                        Attach
                                    </button>
                                    <!-- Send Button -->
                                    <button
                                        class="bg-brand-500 hover:bg-brand-600 shadow-theme-xs inline-flex h-9 items-center justify-center rounded-lg px-4 py-3 text-sm font-medium text-white">
                                        Reply
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mt-6 flex flex-wrap items-center gap-4">
                            <span class="text-gray-500 dark:text-gray-400">Status:</span>
                            <div x-data="{ selected: 'in-progress' }" class="flex items-center gap-4">
                                <!-- In-Progress -->
                                <label for="radioLabelOne"
                                    class="flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400">
                                    <div class="relative">
                                        <input type="radio" id="radioLabelOne" value="in-progress" class="sr-only"
                                            name="selected">
                                        <div :class="false ? 'border-brand-500 bg-brand-500' : 'bg-transparent border-gray-300 dark:border-gray-700'"
                                            class="hover:border-brand-500 dark:hover:border-brand-500 mr-3 flex h-4 w-4 items-center justify-center rounded-full border-[1.25px] border-brand-500 bg-brand-500">
                                            <span class="h-1.5 w-1.5 rounded-full bg-white"
                                                :class="false ? 'bg-white' : 'bg-white dark:bg-[#171f2e]'"></span>
                                        </div>
                                    </div>
                                    In-Progress
                                </label>

                                <!-- Solved -->
                                <label for="radioLabelTwo"
                                    class="flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400">
                                    <div class="relative">
                                        <input type="radio" id="radioLabelTwo" value="solved" class="sr-only"
                                            name="selected">
                                        <div :class="false ? 'border-brand-500 bg-brand-500' : 'bg-transparent border-gray-300 dark:border-gray-700'"
                                            class="hover:border-brand-500 dark:hover:border-brand-500 mr-3 flex h-4 w-4 items-center justify-center rounded-full border-[1.25px] bg-transparent border-gray-300 dark:border-gray-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-white dark:bg-[#171f2e]"
                                                :class="false ? 'bg-white' : 'bg-white dark:bg-[#171f2e]'"></span>
                                        </div>
                                    </div>
                                    Solved
                                </label>

                                <!-- On-Hold -->
                                <label for="radioLabelThree"
                                    class="flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400">
                                    <div class="relative">
                                        <input type="radio" id="radioLabelThree" value="on-hold" class="sr-only"
                                            name="selected">
                                        <div :class="true ? 'border-brand-500 bg-brand-500' : 'bg-transparent border-gray-300 dark:border-gray-700'"
                                            class="hover:border-brand-500 dark:hover:border-brand-500 mr-3 flex h-4 w-4 items-center justify-center rounded-full border-[1.25px] bg-transparent border-gray-300 dark:border-gray-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-white dark:bg-[#171f2e]"
                                                :class="true ? 'bg-white' : 'bg-white dark:bg-[#171f2e]'"></span>
                                        </div>
                                    </div>
                                    On-Hold
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right -->
            <DisputeDetails />
        </div>
    </div>
</template>

<script setup>

import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';
import DisputeConversationMessage from './DisputeConversationMessage.vue';
import DisputeDetails from './DisputeDetails.vue';
const page = usePage();
const dispute = computed(() => page.props.dispute?.data);

const breadcrumbs = computed(() => [
    { label: 'Disputes', href: route('tutor.disputes') },
    { label: `${dispute.value.ref}` }
]);

</script>
