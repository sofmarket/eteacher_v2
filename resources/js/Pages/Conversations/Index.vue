<template>

  <Breadcrumbs title="Conversations" />

  <div class="h-[calc(100vh-186px)] overflow-hidden sm:h-[calc(100vh-174px)]">
    <div class="flex flex-col h-full gap-6 xl:flex-row xl:gap-5">

      <!-- Left sidebar -->
      <Sidebar :selectedConversation="selectedConversation" />

      <!-- Main chat area -->
      <ChatArea v-if="selectedConversation" :conversation="selectedConversation" />

    </div>
  </div>

</template>

<script setup>

import Breadcrumbs from '@/Components/common/Breadcrumbs.vue';
import { ref } from 'vue';
import Sidebar from './Sidebar.vue';
import ChatArea from './ChatArea.vue';

const selectedConversation = ref(null);

</script>