<template>

  <div class="h-[calc(100vh-186px)] overflow-hidden sm:h-[calc(100vh-174px)]">
    <div class="flex flex-col h-full gap-6 md:flex-row md:gap-5">

      <!-- Left sidebar -->
      <Sidebar 
        :selectedConversation="selectedConversation" 
        :newMessage="newMessage"
        @openConversation="openConversation" 
      />

      <!-- Main chat area -->
      <ChatArea 
        :conversation="selectedConversation" 
        @closeConversation="closeConversation"
        @deleteConversation="handleDeleteConversation" 
        @messageSent="handleMessageSent" 
      />
    </div>
  </div>

</template>

<script setup>

import { ref, onMounted, computed } from 'vue';
import Sidebar from './Sidebar.vue';
import ChatArea from './ChatArea.vue';
import Swal from 'sweetalert2';
import { useForm } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';

const { t } = useI18n();

const selectedConversation = ref(null);
const newMessage = ref(null);

const openConversation = (conversation) => {
  selectedConversation.value = conversation;
};

const closeConversation = () => {
  selectedConversation.value = null;
};

const handleDeleteConversation = (conversationId) => {

  Swal.fire({
    title: t('tutor.conversations.modals.delete_confirmation.title'),
    text: t('tutor.conversations.modals.delete_confirmation.text'),
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: t('tutor.conversations.modals.delete_confirmation.confirm_button')
  }).then((result) => {
    if (result.isConfirmed) {
      const form = useForm({});
      form.delete(route('conversations.destroy', conversationId), {
        onSuccess: () => {
          selectedConversation.value = null;
          Swal.fire(
            t('tutor.conversations.modals.delete_confirmation.deleted_title'),
            t('tutor.conversations.modals.delete_confirmation.deleted_text'),
            'success'
          );
        }
      });
    }
  });

};

const handleMessageSent = (message) => {
  // Update the newMessage ref to trigger sidebar update
  newMessage.value = {
    ...message,
    conversation_id: selectedConversation.value?.id
  };
  
  // Reset after a short delay to allow sidebar to process
  setTimeout(() => {
    newMessage.value = null;
  }, 100);
};

</script>