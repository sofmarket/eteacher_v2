<template>

  <div class="h-[calc(100vh-186px)] overflow-hidden sm:h-[calc(100vh-174px)]">
    <div class="flex flex-col h-full gap-6 md:flex-row md:gap-5">

      <!-- Left sidebar -->
      <Sidebar :selectedConversation="selectedConversation" @openConversation="openConversation" />

      <!-- Main chat area -->
      <ChatArea :conversation="selectedConversation" @closeConversation="closeConversation" />

    </div>
  </div>

</template>

<script setup>

import { ref, onMounted, computed } from 'vue';
import Sidebar from './Sidebar.vue';
import ChatArea from './ChatArea.vue';

const selectedConversation = ref(null);

const openConversation = (conversation) => {
  selectedConversation.value = conversation;
};

const closeConversation = () => {
  selectedConversation.value = null;
};

</script>