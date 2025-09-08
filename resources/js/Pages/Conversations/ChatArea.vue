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
                            <button @click="closeChat"
                                class="flex items-center w-full px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-150">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Close Chat
                            </button>
                            <button @click="deleteChat"
                                class="flex items-center w-full px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors duration-150">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                Delete Chat
                            </button>
                        </div>
                    </Transition>
                </div>
            </div>
        </div>

        <!-- Chat messages -->
        <div class="flex-1 overflow-y-auto p-4 sm:p-5 messages-container">
            <!-- Loading state -->
            <div v-if="isLoadingMessages" class="flex justify-center items-center h-full">
                <div class="flex items-center space-x-2">
                    <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-primary-500"></div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Loading messages...</span>
                </div>
            </div>

            <!-- Messages -->
            <div v-else-if="messages.length > 0" class="space-y-4 messages-container flex flex-col-reverse">
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
                <input type="text" v-model="message" placeholder="Type a message..."
                    class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:border-primary-500 focus:ring-0 dark:border-gray-800 dark:bg-white/[0.02] dark:text-white/90"
                    @keyup.enter="sendMessage()" />
                <button @click="sendMessage()" :disabled="isSending || !message.trim()"
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-500 text-white hover:bg-primary-600 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">
                    <!-- Loading spinner -->
                    <svg v-if="isSending" class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <!-- Send icon -->
                    <svg v-else width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.39999 6.32L15.89 3.49C19.7 2.22 21.77 4.3 20.51 8.11L17.68 16.6C15.78 22.31 12.66 22.31 10.76 16.6L9.91999 14.08L7.39999 13.24C1.68999 11.34 1.68999 8.23 7.39999 6.32Z"
                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10.11 13.65L13.69 10.06" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
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

import { ref, computed, onMounted, watch, nextTick } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { onClickOutside } from '@vueuse/core';
import axios from 'axios';

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
const closeChat = () => {
    emit('closeConversation');
    closeDropdown();
};

const deleteChat = () => {
    if (confirm('Are you sure you want to delete this chat? This action cannot be undone.')) {
        emit('deleteChat', props.conversation?.id);
        closeDropdown();
    }
};

const message = ref('');
const isSending = ref(false);
const messages = ref([]);
const isLoadingMessages = ref(false);
const messagesEndRef = ref(null);

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

        // Add the new message to the messages array
        messages.value.unshift(response.data.data);

        // Emit event to parent to update conversation
        emit('messageSent', response.data.data);

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
const loadMessages = async () => {
    if (!props.conversation?.id) return;

    isLoadingMessages.value = true;

    try {
        const response = await axios.get(`/conversations/${props.conversation.id}/messages`);
        messages.value = response.data.data || [];

        nextTick(() => {
            // Scroll to bottom after loading messages
            scrollToBottom();
        });
    } catch (error) {
        console.error('Failed to load messages:', error);
        messages.value = [];
    } finally {
        isLoadingMessages.value = false;
    }
};

// Scroll to bottom of messages
const scrollToBottom = () => {
    nextTick(() => {
        const scrollElement = document.querySelector('.messages-container');
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