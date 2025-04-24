<template>
  <div class="h-[calc(100vh-186px)] overflow-hidden sm:h-[calc(100vh-174px)]">
    <div class="flex flex-col h-full gap-6 xl:flex-row xl:gap-5">
      <!-- Left sidebar -->
      <div class="xl:w-1/4 flex-col w-full rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] xl:flex">
        <div class="sticky px-4 pt-4 pb-4 sm:px-5 sm:pt-5 xl:pb-0">
          <div class="flex items-start justify-between">
            <div>
              <h3 class="font-semibold text-gray-800 text-theme-xl dark:text-white/90 sm:text-2xl">Chats</h3>
            </div>
            <div class="relative">
              <div class="relative">
                <button class="text-gray-500 dark:text-gray-400">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z" fill="currentColor"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <div class="flex items-center gap-3 mt-4">
            <button class="flex items-center justify-center w-full text-gray-700 border border-gray-300 rounded-lg h-11 max-w-11 dark:border-gray-700 dark:text-gray-400 xl:hidden">
              <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.25 6C3.25 5.58579 3.58579 5.25 4 5.25H20C20.4142 5.25 20.75 5.58579 20.75 6C20.75 6.41421 20.4142 6.75 20 6.75L4 6.75C3.58579 6.75 3.25 6.41422 3.25 6ZM3.25 18C3.25 17.5858 3.58579 17.25 4 17.25L20 17.25C20.4142 17.25 20.75 17.5858 20.75 18C20.75 18.4142 20.4142 18.75 20 18.75L4 18.75C3.58579 18.75 3.25 18.4142 3.25 18ZM4 11.25C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75L20 12.75C20.4142 12.75 20.75 12.4142 20.75 12C20.75 11.5858 20.4142 11.25 20 11.25L4 11.25Z" fill=""/>
              </svg>
            </button>
            <div class="relative w-full my-2">
              <form>
                <button class="absolute -translate-y-1/2 left-4 top-1/2">
                  <svg class="fill-gray-500 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04199 9.37381C3.04199 5.87712 5.87735 3.04218 9.37533 3.04218C12.8733 3.04218 15.7087 5.87712 15.7087 9.37381C15.7087 12.8705 12.8733 15.7055 9.37533 15.7055C5.87735 15.7055 3.04199 12.8705 3.04199 9.37381ZM9.37533 1.54218C5.04926 1.54218 1.54199 5.04835 1.54199 9.37381C1.54199 13.6993 5.04926 17.2055 9.37533 17.2055C11.2676 17.2055 13.0032 16.5346 14.3572 15.4178L17.1773 18.2381C17.4702 18.531 17.945 18.5311 18.2379 18.2382C18.5308 17.9453 18.5309 17.4704 18.238 17.1775L15.4182 14.3575C16.5367 13.0035 17.2087 11.2671 17.2087 9.37381C17.2087 5.04835 13.7014 1.54218 9.37533 1.54218Z" fill=""/>
                  </svg>
                </button>
                <input type="text" placeholder="Search..." class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pl-[42px] pr-3.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"/>
              </form>
            </div>
          </div>
        </div>
        <div class="flex-1 overflow-y-auto px-4 pb-4 sm:px-5">
          <div class="space-y-4">
            <button
              v-for="chat in chats"
              :key="chat.id"
              @click="selectedChat = chat"
              class="flex w-full items-center gap-3 rounded-xl p-3 transition-colors duration-200 hover:bg-gray-100 dark:hover:bg-white/[0.04]"
              :class="{ 'bg-gray-100 dark:bg-white/[0.04]': selectedChat.id === chat.id }"
            >
              <div class="relative h-12 w-full max-w-[48px] rounded-full">
                <img :src="chat.avatar" :alt="chat.name" class="object-cover object-center w-full h-full overflow-hidden rounded-full"/>
                <span v-if="chat.online" class="absolute bottom-0 right-0 block h-3 w-3 rounded-full border-[1.5px] border-white bg-success-500 dark:border-gray-900"></span>
              </div>
              <div class="flex-1 text-left">
                <h5 class="text-sm font-medium text-gray-800 dark:text-white/90">{{ chat.name }}</h5>
                <p class="text-xs text-gray-500 dark:text-gray-400">{{ chat.lastMessage }}</p>
              </div>
              <div class="text-xs text-gray-500 dark:text-gray-400">{{ chat.time }}</div>
            </button>
          </div>
        </div>
      </div>

      <!-- Main chat area -->
      <div class="flex h-full flex-col overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] xl:w-3/4">
        <div class="sticky flex items-center justify-between px-5 py-4 border-b border-gray-200 dark:border-gray-800 xl:px-6">
          <div class="flex items-center gap-3">
            <div class="relative h-12 w-full max-w-[48px] rounded-full">
              <img :src="selectedChat.avatar" :alt="selectedChat.name" class="object-cover object-center w-full h-full overflow-hidden rounded-full"/>
              <span v-if="selectedChat.online" class="absolute bottom-0 right-0 block h-3 w-3 rounded-full border-[1.5px] border-white bg-success-500 dark:border-gray-900"></span>
            </div>
            <h5 class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ selectedChat.name }}</h5>
          </div>
          <div class="flex items-center gap-3">
            <button class="text-gray-700 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white/90">
              <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.54488 11.7254L8.80112 10.056C8.94007 9.98476 9.071 9.89524 9.16639 9.77162C9.57731 9.23912 9.66722 8.51628 9.38366 7.89244L7.76239 4.32564C7.23243 3.15974 5.7011 2.88206 4.79552 3.78764L3.72733 4.85577C3.36125 5.22182 3.18191 5.73847 3.27376 6.24794C3.9012 9.72846 5.56003 13.0595 8.25026 15.7497C10.9405 18.44 14.2716 20.0988 17.7521 20.7262C18.2615 20.8181 18.7782 20.6388 19.1442 20.2727L20.2124 19.2045C21.118 18.2989 20.8403 16.7676 19.6744 16.2377L16.1076 14.6164C15.4838 14.3328 14.7609 14.4227 14.2284 14.8336C14.1048 14.929 14.0153 15.06 13.944 15.1989L12.2747 18.4552" stroke="" stroke-width="1.5"/>
              </svg>
            </button>
            <button class="text-gray-700 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white/90">
              <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 5.25C3.00736 5.25 2 6.25736 2 7.5V16.5C2 17.7426 3.00736 18.75 4.25 18.75H15.25C16.4926 18.75 17.5 17.7426 17.5 16.5V15.3957L20.1118 16.9465C20.9451 17.4412 22 16.8407 22 15.8716V8.12838C22 7.15933 20.9451 6.55882 20.1118 7.05356L17.5 8.60433V7.5C17.5 6.25736 16.4926 5.25 15.25 5.25H4.25ZM17.5 10.3488V13.6512L20.5 15.4325V8.56756L17.5 10.3488ZM3.5 7.5C3.5 7.08579 3.83579 6.75 4.25 6.75H15.25C15.6642 6.75 16 7.08579 16 7.5V16.5C16 16.9142 15.6642 17.25 15.25 17.25H4.25C3.83579 17.25 3.5 16.9142 3.5 16.5V7.5Z" fill=""/>
              </svg>
            </button>
            <div class="relative -mb-1.5">
              <div class="relative">
                <button class="text-gray-500 dark:text-gray-400">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z" fill="currentColor"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Chat messages -->
        <div class="flex-1 overflow-y-auto p-4 sm:p-5">
          <div class="space-y-4">
            <div v-for="message in selectedChat.messages" :key="message.id" 
              class="flex" 
              :class="{ 'justify-end': message.sent }"
            >
              <div class="max-w-[70%] rounded-2xl p-4"
                :class="message.sent ? 'bg-primary-500 text-white' : 'bg-gray-100 dark:bg-white/[0.04] text-gray-800 dark:text-white/90'"
              >
                <p class="text-sm">{{ message.text }}</p>
                <span class="mt-1 block text-xs opacity-70">{{ message.time }}</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Message input -->
        <div class="sticky bottom-0 border-t border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/[0.03] sm:p-5">
          <div class="flex items-center gap-3">
            <input
              type="text"
              v-model="newMessage"
              placeholder="Type a message..."
              class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:border-primary-500 focus:ring-0 dark:border-gray-800 dark:bg-white/[0.02] dark:text-white/90"
              @keyup.enter="sendMessage"
            />
            <button
              @click="sendMessage"
              class="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-500 text-white hover:bg-primary-600"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="22" y1="2" x2="11" y2="13"></line>
                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';
import { ref } from 'vue';

// Sample data - replace with actual data from your backend
const chats = ref([
    { 
      id: 1, 
      name: 'Sarah Chapman', 
      avatar: 'https://placehold.co/400x400', 
      online: true, 
      lastMessage: 'test', 
      time: '01:21 PM',
      messages: [
        { id: 1, text: 'Hello! How can I help you today?', sent: false, time: '01:20 PM' },
        { id: 2, text: 'I need help with my math homework', sent: true, time: '01:21 PM' }
      ]
    },
    { id: 2, name: 'Ann Coleman', avatar: 'https://placehold.co/400x400', online: true, lastMessage: 'hello', time: '02:32 PM' },
    { id: 3, name: 'Amento Tech', avatar: 'https://placehold.co/400x400', online: false, lastMessage: 'hi', time: '10:27 AM' },
    { id: 4, name: 'amentotech 02', avatar: 'https://placehold.co/400x400', online: false, lastMessage: 'Sent you a voice note', time: '10:48 PM' },
    { id: 5, name: 'test test', avatar: 'https://placehold.co/400x400', online: false, lastMessage: 'hi', time: '08:49 AM' },
    { id: 6, name: 'Evelyn Harper', avatar: 'https://placehold.co/400x400', online: false, lastMessage: 'hi', time: '10:58 AM' },
    { id: 7, name: 'Arianne Kearns', avatar: 'https://placehold.co/400x400', online: false, lastMessage: 'hi', time: '04:06 AM' },
]);

const selectedChat = ref(chats.value[0]);
const newMessage = ref('');

const sendMessage = () => {
  if (!newMessage.value.trim()) return;
  
  const message = {
    id: Date.now(),
    text: newMessage.value,
    sent: true,
    time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
  };
  
  selectedChat.value.messages.push(message);
  newMessage.value = '';
};
</script>