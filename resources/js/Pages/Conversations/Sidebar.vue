<template>

    <div
        class="md:w-2/5 flex-col w-full rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] md:flex">
        <div class="sticky px-4 pt-4 pb-4 sm:px-5 sm:pt-5 xl:pb-0">
            <div class="flex items-start justify-between">
                <div>
                    <h3 class="font-semibold text-gray-800 text-theme-xl dark:text-white/90 sm:text-2xl">Chats</h3>
                </div>
                <div class="relative">
                    <!-- <div class="relative">
                        <button class="text-gray-500 dark:text-gray-400">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z"
                                    fill="currentColor" />
                            </svg>
                        </button>
                    </div> -->
                </div>
            </div>
            <div class="flex items-center gap-3 mt-4">
                <button
                    class="flex items-center justify-center w-full text-gray-700 border border-gray-300 rounded-lg h-11 max-w-11 dark:border-gray-700 dark:text-gray-400 xl:hidden">
                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.25 6C3.25 5.58579 3.58579 5.25 4 5.25H20C20.4142 5.25 20.75 5.58579 20.75 6C20.75 6.41421 20.4142 6.75 20 6.75L4 6.75C3.58579 6.75 3.25 6.41422 3.25 6ZM3.25 18C3.25 17.5858 3.58579 17.25 4 17.25L20 17.25C20.4142 17.25 20.75 17.5858 20.75 18C20.75 18.4142 20.4142 18.75 20 18.75L4 18.75C3.58579 18.75 3.25 18.4142 3.25 18ZM4 11.25C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75L20 12.75C20.4142 12.75 20.75 12.4142 20.75 12C20.75 11.5858 20.4142 11.25 20 11.25L4 11.25Z"
                            fill="" />
                    </svg>
                </button>
                <div class="relative w-full my-2">
                    <form>
                        <button class="absolute -translate-y-1/2 left-4 top-1/2 hidden sm:block">
                            <svg class="fill-gray-500 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.04199 9.37381C3.04199 5.87712 5.87735 3.04218 9.37533 3.04218C12.8733 3.04218 15.7087 5.87712 15.7087 9.37381C15.7087 12.8705 12.8733 15.7055 9.37533 15.7055C5.87735 15.7055 3.04199 12.8705 3.04199 9.37381ZM9.37533 1.54218C5.04926 1.54218 1.54199 5.04835 1.54199 9.37381C1.54199 13.6993 5.04926 17.2055 9.37533 17.2055C11.2676 17.2055 13.0032 16.5346 14.3572 15.4178L17.1773 18.2381C17.4702 18.531 17.945 18.5311 18.2379 18.2382C18.5308 17.9453 18.5309 17.4704 18.238 17.1775L15.4182 14.3575C16.5367 13.0035 17.2087 11.2671 17.2087 9.37381C17.2087 5.04835 13.7014 1.54218 9.37533 1.54218Z"
                                    fill="" />
                            </svg>
                        </button>
                        <div class="relative">
                            <input type="text" placeholder="Search..." v-model="search"
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pl-[42px] pr-3.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                            <button v-if="search.length > 0 && !searching"
                                class="absolute right-2.5 top-1/2 inline-flex -translate-y-1/2 items-center gap-0.5 px-[7px] py-[4.5px] text-xs -tracking-[0.2px] text-gray-500 dark:text-gray-100"
                                @click="search = ''">
                                <svg width="18" height="18" viewBox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>

                            <span v-if="searching" class="absolute right-2.5 top-1/2 inline-flex -translate-y-1/2 items-center gap-0.5 px-[7px] py-[4.5px] text-xs -tracking-[0.2px] text-gray-500 dark:text-gray-100">
                                <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
                                    <path class="opacity-25" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex-1 overflow-y-auto px-4 pb-4 sm:px-5 hidden md:block coversation-list" ref="conversationList" @scroll="handleScroll">
            <div class="space-y-4">
                <button v-if="conversations.length > 0" v-for="conversation in conversations" :key="conversation.id"
                    @click="openConversation(conversation)"
                    class="flex w-full items-center gap-3 rounded-xl p-3 transition-colors duration-200 hover:bg-gray-100 dark:hover:bg-white/[0.04]"
                    :class="{ 'bg-gray-100 dark:bg-white/[0.04]': selectedConversation?.id === conversation.id }">
                    <div class="relative h-12 w-full max-w-[48px] rounded-full">
                        <img :src="conversation.receiver.avatar" :alt="conversation.receiver.name"
                            class="object-cover object-center w-full h-full overflow-hidden rounded-full" />
                        <span v-if="conversation.receiver.online"
                            class="absolute bottom-0 right-0 block h-3 w-3 rounded-full border-[1.5px] border-white bg-success-500 dark:border-gray-900"></span>
                    </div>
                    <div class="flex-1 text-left min-w-0">
                        <h5 class="text-sm font-medium text-gray-800 dark:text-white/90 truncate">{{
                            conversation.receiver.name
                            }}</h5>
                        <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                            {{ conversation.latest_message?.body }}</p>
                    </div>
                    <div class="flex flex-col items-end gap-1">
                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            {{ formatTimeAgo(new Date(conversation.last_time_message)) }}
                        </div>
                        <div v-if="conversation.unread_count > 0"
                            class="flex items-center justify-center min-w-[20px] h-5 px-2 text-xs font-medium text-white bg-red-500 rounded-full">
                            {{ conversation.unread_count > 99 ? '99+' : conversation.unread_count }}
                        </div>
                    </div>
                </button>
                <div v-else class="flex items-center justify-center py-5 h-full">
                    <div class="text-gray-500 dark:text-gray-400">No conversations found</div>
                </div>
            </div>
            
            <!-- Loading indicator for pagination -->
            <div v-if="loadingMore" class="flex items-center justify-center py-4">
                <svg class="animate-spin h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
                    <path class="opacity-25" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        </div>
    </div>


</template>

<script setup>
import { ref, computed, onMounted, nextTick, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { formatTimeAgo, useDebounceFn } from '@vueuse/core'
import axios from 'axios';

defineProps({
    selectedConversation: {
        type: Object,
        required: false,
        default: null,
    },
});

const page = usePage();
const sharedUser = computed(() => page.props.sharedUser?.data ?? null)
const conversations = ref(page.props.conversations?.data || []);
const searching = ref(false);
const search = ref('');
const conversationList = ref(null);
const loadingMore = ref(false);
const currentPage = ref(1);
const hasMorePages = ref(true);
const paginationMeta = ref(page.props.conversations?.meta || null);

// Initialize pagination meta from initial data
if (paginationMeta.value) {
    hasMorePages.value = paginationMeta.value.current_page < paginationMeta.value.last_page;
}

const searchConversations = useDebounceFn(() => {
    searching.value = true;
    currentPage.value = 1;
    hasMorePages.value = true;
    
    if (search.value.trim()) {
        axios.get(route('conversations.index'), {
            params: {
                search: search.value,
            },
        }).then(response => {
            conversations.value = response.data.data;
            paginationMeta.value = response.data.meta;
            hasMorePages.value = response.data.meta.current_page < response.data.meta.last_page;
        }).finally(() => {
            searching.value = false;
        });
    } else {
        axios.get(route('conversations.index')).then(response => {
            conversations.value = response.data.data;
            paginationMeta.value = response.data.meta;
            hasMorePages.value = response.data.meta.current_page < response.data.meta.last_page;
        }).finally(() => {
            searching.value = false;
        });
    }
}, 500);

const loadMoreConversations = async () => {
    if (loadingMore.value || !hasMorePages.value || searching.value) return;
    
    loadingMore.value = true;
    currentPage.value += 1;
    
    try {
        const params = {
            page: currentPage.value,
        };
        
        if (search.value.trim()) {
            params.search = search.value;
        }
        
        const response = await axios.get(route('conversations.index'), { params });
        
        // Append new conversations to existing ones
        conversations.value = [...conversations.value, ...response.data.data];
        paginationMeta.value = response.data.meta;
        hasMorePages.value = response.data.meta.current_page < response.data.meta.last_page;
        
    } catch (error) {
        console.error('Error loading more conversations:', error);
        currentPage.value -= 1; // Revert page increment on error
    } finally {
        loadingMore.value = false;
    }
};

const handleScroll = (event) => {
    const { scrollTop, scrollHeight, clientHeight } = event.target;
    const threshold = 100; // Load more when 100px from bottom
    
    if (scrollHeight - scrollTop - clientHeight < threshold) {
        loadMoreConversations();
    }
};

const emit = defineEmits(['openConversation']);

const openConversation = (conversation) => {
    emit('openConversation', conversation);
};

watch(search, () => {
    searchConversations();
});

onMounted(() => {
    window.Echo.private('user.' + sharedUser.value.id)
        .listen('.message.received', (e) => {
            conversations.value.find(conversation => conversation.id === e.conversation_id).latest_message = e.message;
            conversations.value.find(conversation => conversation.id === e.conversation_id).last_time_message = e.message.created_at;
        });
});

</script>