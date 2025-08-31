<template>
  <Modal 
    :modalActive="modalActive" 
    @close="closeModal" 
    :fullScreenBackdrop="true" 
    title="Add Session Details"
    @reset="closeModal" 
    @submit="submitForm" 
    :loading="form.processing"
  >
    <template #body>
      <form class="flex flex-col gap-6" @submit.prevent="submitForm">
        <!-- Form fields -->
        <div class="grid grid-cols-2 gap-6">
          <!-- Left Column -->
          <div class="space-y-4">
            <!-- Select subject -->
            <SelectInput 
              :inline="false" 
              label="Select subject" 
              v-model="form.user_subject_group_subject_id"
              :errors="form.errors.user_subject_group_subject_id"
              :required="true"
            >
              <option value="">Select a subject</option>
              <template v-for="group in userSubjectGroups" :key="group.id">
                <optgroup v-if="group.subjects.length > 0" :label="group.name">
                  <option v-for="subject in group.subjects" :key="subject.id" :value="subject.id">
                    {{ subject.name }}
                  </option>
                </optgroup>
              </template>
            </SelectInput>

            <!-- Start time -->
            <UniversalInput 
              :inline="false" 
              label="Start time" 
              v-model="form.start_time"
              :errors="form.errors.start_time"
              :required="true"
              type="time"
              placeholder="Select start time"
            />

            <!-- Session Fee -->
            <UniversalInput 
              :inline="false" 
              label="Session Fee" 
              v-model="form.session_fee"
              :errors="form.errors.session_fee"
              :required="true"
              type="number"
              placeholder="0"
              min="0"
              step="1"
            />

            <!-- Session Fee -->
            <UniversalInput 
              :inline="false" 
              label="Session Seats" 
              v-model="form.spaces"
              :errors="form.errors.spaces"
              :required="true"
              type="number"
              placeholder="0"
              min="0"
              step="1"
            />

          </div>

          <!-- Right Column -->
          <div class="space-y-4">
            <!-- Start date -->
            <DateInput 
              :inline="false" 
              label="Start date" 
              v-model="form.start_date"
              :errors="form.errors.start_date"
              :required="true"
              placeholder="Choose start date"
            />

            <!-- End date -->
            <DateInput 
              :inline="false" 
              label="End date" 
              v-model="form.end_date"
              :errors="form.errors.end_date"
              :required="true"
              placeholder="Choose end date"
            />

            <!-- Session duration -->
            <SelectInput 
              :inline="false" 
              label="Session duration" 
              v-model="form.duration"
              :errors="form.errors.duration"
              :required="true"
            >
              <option value="">Select session duration</option>
              <option value="30">30 minutes</option>
              <option value="60">1 hour</option>
              <option value="90">1.5 hours</option>
              <option value="120">2 hours</option>
            </SelectInput>

            <!-- Recurring booking for -->
            <SelectInput 
              :inline="false" 
              label="Recurring booking for" 
              v-model="form.recurring_booking"
            >
              <option value="">Select From list</option>
              <option value="weekly">Weekly</option>
              <option value="biweekly">Bi-weekly</option>
              <option value="monthly">Monthly</option>
            </SelectInput>
          </div>
        </div>

        <!-- Text Area -->
        <TextArea 
            label="What will be covered in this session"
            v-model="form.description"
            :errors="form.errors.description"
            placeholder="Enter session description..."
            :rows="6"
          />

      </form>
    </template>
  </Modal>
</template>

<script setup>
import { computed } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import Modal from '@/Components/ui/Modal.vue';
import UniversalInput from '@/Components/forms/FormElements/UniversalInput.vue';
import SelectInput from '@/Components/forms/FormElements/SelectInput.vue';
import TextArea from '@/Components/forms/FormElements/TextArea.vue';
import DateInput from '@/Components/forms/FormElements/DateInput.vue';

const props = defineProps({
  modalActive: {
    type: Boolean,
    default: false
  }
});

const emit = defineEmits(['update:modalActive']);

const form = useForm({
  user_subject_group_subject_id: '',
  start_date: '',
  end_date: '',
  start_time: '',
  duration: '',
  session_fee: 0,
  spaces: 1,
  description: '',
  recurring_booking: '',
});

// use page inertia
const page = usePage();

// Create a reactive copy of the data
const userSubjectGroups = computed(() => page.props.userSubjectGroups.data);

const closeModal = () => {
  emit('update:modalActive', false);
  form.reset();
  form.clearErrors();
};

const submitForm = () => {
  form.post(route('tutor.user.subject.slots.store'), {
    onSuccess: () => {
      closeModal();
    }
  });
};

// Remove the increment/decrement functions since we're using UniversalInput for session_seats
</script>
