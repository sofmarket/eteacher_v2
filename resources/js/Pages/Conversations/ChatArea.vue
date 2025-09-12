<template>

    <div v-if="conversation"
        class="flex h-full flex-col overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] md:w-3/5">
        <div
            class="sticky flex items-center justify-between px-5 py-4 border-b border-gray-200 dark:border-gray-800 md:px-6">
            <div class="flex items-center gap-3">
                <div class="relative h-12 w-full max-w-[48px] rounded-full">
                    <img :src="conversation.receiver.avatar" :alt="conversation.receiver.name"
                        class="object-cover object-center w-full h-full overflow-hidden rounded-full" />
                    <span v-if="conversation.receiver.online"
                        class="absolute bottom-0 right-0 block h-3 w-3 rounded-full border-[1.5px] border-white bg-success-500 dark:border-gray-900"></span>
                </div>
                <h5 class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ conversation.receiver.name }}</h5>
            </div>
            <div class="flex items-center gap-3">
                <!-- Dropdown Menu -->
                <div class="relative" ref="dropdownRef">
                    <button @click="toggleDropdown"
                        class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors duration-200"
                        :class="{ 'text-gray-700 dark:text-gray-200': isDropdownOpen }">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z"
                                fill="currentColor" />
                        </svg>
                    </button>

                    <!-- Dropdown Content -->
                    <Transition enter-active-class="transition duration-200 ease-out"
                        enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
                        leave-active-class="transition duration-75 ease-in"
                        leave-from-class="transform scale-100 opacity-100"
                        leave-to-class="transform scale-95 opacity-0">
                        <div v-if="isDropdownOpen"
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 py-1 z-50">
                            <button @click="closeConversation"
                                class="flex items-center w-full px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-150">
                                <CloseIcon class="w-4 h-4 mr-3" />
                                Close Chat
                            </button>
                            <button @click="deleteConversation"
                                class="flex items-center w-full px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors duration-150">
                                <DeleteIcon class="w-4 h-4 mr-3" />
                                Delete Chat
                            </button>
                        </div>
                    </Transition>
                </div>
            </div>
        </div>

        <!-- Chat messages -->
        <div class="flex-1 overflow-y-auto p-4 sm:p-5 messages-container" ref="messagesContainer" @scroll="handleScroll">
            <!-- Loading more messages indicator -->
            <div v-if="loadingMoreMessages" class="flex justify-center items-center py-4">
                <div class="flex items-center space-x-2">
                    <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-primary-500"></div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Loading more messages...</span>
                </div>
            </div>

            <!-- Loading state -->
            <div v-if="isLoadingMessages" class="flex justify-center items-center h-full">
                <div class="flex items-center space-x-2">
                    <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-primary-500"></div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Loading messages...</span>
                </div>
            </div>

            <!-- Messages -->
            <div v-else-if="messages.length > 0" class="space-y-4 messages-container">
                <div v-for="message in messages" :key="message.id" class="flex"
                    :class="{ 'justify-end': message.sender.id == sharedUser.id }">
                    <div
                        class="rounded-2xl p-4 max-w-[70%] bg-gray-100 dark:bg-white/[0.04] text-gray-800 dark:text-white/90">
                        <p class="text-sm break-words whitespace-pre-wrap">{{ message.body }}</p>
                        <span class="mt-1 block text-xs opacity-70">{{ message.time }}</span>
                    </div>
                </div>
                <!-- Scroll anchor -->
                <div ref="messagesEndRef"></div>
            </div>

            <!-- Empty state -->
            <div v-else class="flex flex-col items-center justify-center h-full text-center">
                <svg class="w-12 h-12 text-gray-400 dark:text-gray-500 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                    </path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No messages yet</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Start the conversation by sending a message below.
                </p>
            </div>
        </div>

        <!-- Message input -->
        <div
            class="sticky bottom-0 border-t border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/[0.03] sm:p-5">
            <div class="flex items-center gap-3">

                <div class="relative w-full">
                    <button
                        class="absolute left-1 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white/90 sm:left-3">
                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM3.5 12C3.5 7.30558 7.30558 3.5 12 3.5C16.6944 3.5 20.5 7.30558 20.5 12C20.5 16.6944 16.6944 20.5 12 20.5C7.30558 20.5 3.5 16.6944 3.5 12ZM10.0001 9.23256C10.0001 8.5422 9.44042 7.98256 8.75007 7.98256C8.05971 7.98256 7.50007 8.5422 7.50007 9.23256V9.23266C7.50007 9.92301 8.05971 10.4827 8.75007 10.4827C9.44042 10.4827 10.0001 9.92301 10.0001 9.23266V9.23256ZM15.2499 7.98256C15.9403 7.98256 16.4999 8.5422 16.4999 9.23256V9.23266C16.4999 9.92301 15.9403 10.4827 15.2499 10.4827C14.5596 10.4827 13.9999 9.92301 13.9999 9.23266V9.23256C13.9999 8.5422 14.5596 7.98256 15.2499 7.98256ZM9.23014 13.7116C8.97215 13.3876 8.5003 13.334 8.17625 13.592C7.8522 13.85 7.79865 14.3219 8.05665 14.6459C8.97846 15.8037 10.4026 16.5481 12 16.5481C13.5975 16.5481 15.0216 15.8037 15.9434 14.6459C16.2014 14.3219 16.1479 13.85 15.8238 13.592C15.4998 13.334 15.0279 13.3876 14.7699 13.7116C14.1205 14.5274 13.1213 15.0481 12 15.0481C10.8788 15.0481 9.87961 14.5274 9.23014 13.7116Z"
                                fill=""></path>
                        </svg>
                    </button>

                    <input type="text" v-model="message" placeholder="Type a message..." @keyup.enter="sendMessage()"
                        class="h-9 w-full border-none bg-transparent pl-12 pr-5 text-sm text-gray-800 outline-hidden placeholder:text-gray-400 focus:border-0 focus:ring-0 dark:text-white/90">
                </div>

                <div class="flex items-center">


                    <!-- <button class="mr-2 text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white/90">
                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.9522 14.4422C12.9522 14.452 12.9524 14.4618 12.9527 14.4714V16.1442C12.9527 16.6699 12.5265 17.0961 12.0008 17.0961C11.475 17.0961 11.0488 16.6699 11.0488 16.1442V6.15388C11.0488 5.73966 10.7131 5.40388 10.2988 5.40388C9.88463 5.40388 9.54885 5.73966 9.54885 6.15388V16.1442C9.54885 17.4984 10.6466 18.5961 12.0008 18.5961C13.355 18.5961 14.4527 17.4983 14.4527 16.1442V6.15388C14.4527 6.14308 14.4525 6.13235 14.452 6.12166C14.4347 3.84237 12.5817 2 10.2983 2C8.00416 2 6.14441 3.85976 6.14441 6.15388V14.4422C6.14441 14.4492 6.1445 14.4561 6.14469 14.463V16.1442C6.14469 19.3783 8.76643 22 12.0005 22C15.2346 22 17.8563 19.3783 17.8563 16.1442V9.55775C17.8563 9.14354 17.5205 8.80775 17.1063 8.80775C16.6921 8.80775 16.3563 9.14354 16.3563 9.55775V16.1442C16.3563 18.5498 14.4062 20.5 12.0005 20.5C9.59485 20.5 7.64469 18.5498 7.64469 16.1442V9.55775C7.64469 9.55083 7.6446 9.54393 7.64441 9.53706L7.64441 6.15388C7.64441 4.68818 8.83259 3.5 10.2983 3.5C11.764 3.5 12.9522 4.68818 12.9522 6.15388L12.9522 14.4422Z"
                                fill=""></path>
                        </svg>
                    </button>

                    <button class="text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white/90">
                        <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="7" y="2.75" width="10" height="12.5" rx="5" stroke="" stroke-width="1.5"></rect>
                            <path d="M20 10.25C20 14.6683 16.4183 18.25 12 18.25C7.58172 18.25 4 14.6683 4 10.25"
                                stroke="" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M10 21.25H14" stroke="" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M12 18.25L12 21.25" stroke="" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M12 7.5L12 10.5" stroke="" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M14.5 8.25L14.5 9.75" stroke="" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M9.5 8.25L9.5 9.75" stroke="" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </button> -->

                    <button @click="sendMessage()" :disabled="isSending || !message.trim()"
                        class="ml-3 flex h-9 w-9 items-center justify-center rounded-lg bg-brand-500 text-white hover:bg-brand-600 xl:ml-5">
                        <!-- Loading spinner -->
                        <svg v-if="isSending" class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <svg v-else width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.98481 2.44399C3.11333 1.57147 1.15325 3.46979 1.96543 5.36824L3.82086 9.70527C3.90146 9.89367 3.90146 10.1069 3.82086 10.2953L1.96543 14.6323C1.15326 16.5307 3.11332 18.4291 4.98481 17.5565L16.8184 12.0395C18.5508 11.2319 18.5508 8.76865 16.8184 7.961L4.98481 2.44399ZM3.34453 4.77824C3.0738 4.14543 3.72716 3.51266 4.35099 3.80349L16.1846 9.32051C16.762 9.58973 16.762 10.4108 16.1846 10.68L4.35098 16.197C3.72716 16.4879 3.0738 15.8551 3.34453 15.2223L5.19996 10.8853C5.21944 10.8397 5.23735 10.7937 5.2537 10.7473L9.11784 10.7473C9.53206 10.7473 9.86784 10.4115 9.86784 9.99726C9.86784 9.58304 9.53206 9.24726 9.11784 9.24726L5.25157 9.24726C5.2358 9.20287 5.2186 9.15885 5.19996 9.11528L3.34453 4.77824Z"
                                fill="white"></path>
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div v-else
        class="flex h-full flex-col overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] md:w-3/5">
        <div class="w-full h-full flex flex-col items-center justify-center">
            <img :src="sharedUser?.avatar" alt="Empty State" class="w-20 h-20 rounded-full">
            <h1 class="text-2xl mt-7">Welcome, {{ sharedUser?.name }} </h1>
            <div class="text-gray-500 dark:text-gray-400 mt-5 text-center max-w-sm">
                Start a conversation and connect with others, Share ideas, ask questions, or simply say hello.
            </div>
        </div>
    </div>

</template>

<script setup>

import { ref, computed, onMounted, nextTick, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { onClickOutside } from '@vueuse/core';
import axios from 'axios';
import { CloseIcon, DeleteIcon, SendIcon } from '@/icons';

// reactive reference to props
const page = usePage();

// safely access with optional chaining
const sharedUser = computed(() => page.props.sharedUser?.data ?? null)

const props = defineProps({
    conversation: {
        type: Object,
        required: false,
        default: null
    }
})

const emit = defineEmits(['closeConversation', 'deleteConversation', 'messageSent']);

// Dropdown functionality
const dropdownRef = ref(null);
const isDropdownOpen = ref(false);

const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
};

const closeDropdown = () => {
    isDropdownOpen.value = false;
};

// Close dropdown when clicking outside
onClickOutside(dropdownRef, closeDropdown);

// Chat actions
const closeConversation = () => {
    emit('closeConversation');
    closeDropdown();
};

const deleteConversation = () => {
    emit('deleteConversation', props.conversation?.id);
    closeDropdown();
};

const message = ref('');
const isSending = ref(false);
const messages = ref([]);
const isLoadingMessages = ref(false);
const loadingMoreMessages = ref(false);
const messagesEndRef = ref(null);
const messagesContainer = ref(null);
const currentPage = ref(1);
const hasMoreMessages = ref(true);
const messagesMeta = ref(null);

const sendMessage = async () => {
    if (!message.value.trim() || isSending.value) return;

    const messageText = message.value.trim();
    message.value = ''; // Clear input immediately for better UX
    isSending.value = true;

    try {
        // Send message to server
        const response = await axios.post(`/conversations/${props.conversation.id}/messages`, {
            body: messageText,
            receiver_id: props.conversation.receiver.id
        });

        const newMessage = response.data.data;
        // Add the new message to the messages array
        messages.value.unshift(newMessage);

        // Emit event to parent to update conversation
        emit('messageSent', newMessage);

        // Scroll to bottom after sending message
        scrollToBottom();
    } catch (error) {
        console.error('Failed to send message:', error);
        // Restore message on error
        message.value = messageText;

        // Show error notification (you can implement a toast notification here)
        // alert('Failed to send message. Please try again.');
    } finally {
        isSending.value = false;
    }
}

// Load conversation messages
const loadMessages = async (page = 1, append = false) => {
    if (!props.conversation?.id) return;

    if (page === 1) {
        isLoadingMessages.value = true;
    } else {
        loadingMoreMessages.value = true;
    }

    try {
        const response = await axios.get(`/conversations/${props.conversation.id}/messages`, {
            params: { page }
        });
        
        const newMessages = response.data.data || [];
        messagesMeta.value = response.data.meta;
        
        if (append) {
            // Append older messages to the beginning
            messages.value = [...newMessages, ...messages.value];
        } else {
            // Replace messages (initial load)
            messages.value = newMessages;
        }
        
        hasMoreMessages.value = messagesMeta.value?.current_page < messagesMeta.value?.last_page;

        if (!append) {
            nextTick(() => {
                // Scroll to bottom after loading messages
                scrollToBottom();
            });
        }
    } catch (error) {
        console.error('Failed to load messages:', error);
        if (!append) {
            messages.value = [];
        }
    } finally {
        isLoadingMessages.value = false;
        loadingMoreMessages.value = false;
    }
};

// Load more messages (for pagination)
const loadMoreMessages = async () => {
    if (loadingMoreMessages.value || !hasMoreMessages.value || !props.conversation?.id) return;
    
    const nextPage = currentPage.value + 1;
    currentPage.value = nextPage;
    
    // Store current scroll position
    const scrollElement = messagesContainer.value;
    const previousScrollHeight = scrollElement.scrollHeight;
    
    await loadMessages(nextPage, true);
    
    // Maintain scroll position after loading more messages
    nextTick(() => {
        const newScrollHeight = scrollElement.scrollHeight;
        const scrollDiff = newScrollHeight - previousScrollHeight;
        scrollElement.scrollTop = scrollDiff;
    });
};

// Handle scroll events
const handleScroll = (event) => {
    const { scrollTop } = event.target;
    const threshold = 100; // Load more when 100px from top
    
    if (scrollTop < threshold && hasMoreMessages.value && !loadingMoreMessages.value) {
        loadMoreMessages();
    }
};

// Scroll to bottom of messages
const scrollToBottom = () => {
    nextTick(() => {
        const scrollElement = messagesContainer.value;
        if (scrollElement) {
            scrollElement.scrollTo({
                top: scrollElement.scrollHeight,
                behavior: 'smooth'
            });
        }
    });
};

// Mark conversation as read
const markConversationAsRead = async (conversationId) => {
    if (!conversationId) return;

    try {
        await axios.patch(`/conversations/${conversationId}/read`);
    } catch (error) {
        console.error('Failed to mark conversation as read:', error);
    }
};

// Watch for conversation changes
watch(() => props.conversation, (newConversation, oldConversation) => {
    message.value = '';
    currentPage.value = 1;
    hasMoreMessages.value = true;

    if (newConversation?.id !== oldConversation?.id) {
        loadMessages();
        // Mark conversation as read when opening
        markConversationAsRead(newConversation?.id);
    } else {
        scrollToBottom();
    }
}, { immediate: true });

onMounted(() => {

    if (props.conversation?.id) {
        loadMessages();
        // Mark conversation as read when component mounts with a conversation
        markConversationAsRead(props.conversation.id);
    }

    window.Echo.private('user.' + sharedUser.value.id)
        .listen('.message.received', (e) => {
            if (e.conversation_id == props.conversation?.id) {
                messages.value.unshift(e.message);
                nextTick(() => {
                    scrollToBottom();
                });
            }
        });

});

</script>