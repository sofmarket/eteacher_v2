<template>

  <div class="h-[calc(100vh-186px)] overflow-hidden sm:h-[calc(100vh-174px)]">
    <div class="flex flex-col h-full gap-6 md:flex-row md:gap-5">

      <!-- Left sidebar -->
      <Sidebar :selectedConversation="selectedConversation" @openConversation="openConversation" />

      <!-- Main chat area -->
      <ChatArea :conversation="selectedConversation" @closeConversation="closeConversation"
        @deleteConversation="handleDeleteConversation" />

    </div>
  </div>

</template>

<script setup>

import { ref, onMounted, computed } from 'vue';
import Sidebar from './Sidebar.vue';
import ChatArea from './ChatArea.vue';
import Swal from 'sweetalert2';
import { useForm } from '@inertiajs/vue3';

const selectedConversation = ref(null);

const openConversation = (conversation) => {
  selectedConversation.value = conversation;
};

const closeConversation = () => {
  selectedConversation.value = null;
};

const handleDeleteConversation = (conversationId) => {

  Swal.fire({
    title: 'Are you sure?',
    text: 'You will not be able to recover this conversation!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      const form = useForm({});
      form.delete(route('conversations.destroy', conversationId), {
        onSuccess: () => {
          selectedConversation.value = null;
          Swal.fire(
            'Deleted!',
            'Conversation has been deleted.',
            'success'
          );
        }
      });
    }
  });

};

</script>