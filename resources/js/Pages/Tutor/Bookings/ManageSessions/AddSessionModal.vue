<template>
  <Modal 
    :modalActive="modalActive" 
    @close="closeModal" 
    :fullScreenBackdrop="true" 
    :title="$t('tutor.bookings.add_session_modal.title')"
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
              :label="$t('tutor.bookings.add_session_modal.select_subject')" 
              v-model="form.user_subject_group_subject_id"
              :errors="form.errors.user_subject_group_subject_id"
              :required="true"
            >
              <option value="">{{ $t('tutor.bookings.add_session_modal.select_a_subject') }}</option>
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
              :label="$t('tutor.bookings.add_session_modal.start_time')" 
              v-model="form.start_time"
              :errors="form.errors.start_time"
              :required="true"
              type="time"
              :placeholder="$t('tutor.bookings.add_session_modal.select_start_time')"
            />

            <!-- Session Fee -->
            <UniversalInput 
              :inline="false" 
              :label="$t('tutor.bookings.add_session_modal.session_fee')" 
              v-model="form.session_fee"
              :errors="form.errors.session_fee"
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
              :label="$t('tutor.bookings.add_session_modal.session_date')" 
              v-model="form.start_date"
              :errors="form.errors.start_date"
              :required="true"
              :placeholder="$t('tutor.bookings.add_session_modal.choose_session_date')"
            />

            <!-- End date -->
            <!--<DateInput 
              :inline="false" 
              label="End date" 
              v-model="form.end_date"
              :errors="form.errors.end_date"
              :required="true"
              placeholder="Choose end date"
            />-->

            <!-- Session duration -->
            <SelectInput 
              :inline="false" 
              :label="$t('tutor.bookings.add_session_modal.session_duration')" 
              v-model="form.duration"
              :errors="form.errors.duration"
              :required="true"
            >
              <option value="">{{ $t('tutor.bookings.add_session_modal.select_session_duration') }}</option>
              <option value="30">{{ $t('tutor.bookings.add_session_modal.duration_options.30_minutes') }}</option>
              <option value="60">{{ $t('tutor.bookings.add_session_modal.duration_options.1_hour') }}</option>
              <option value="90">{{ $t('tutor.bookings.add_session_modal.duration_options.1_5_hours') }}</option>
              <option value="120">{{ $t('tutor.bookings.add_session_modal.duration_options.2_hours') }}</option>
            </SelectInput>

             <!-- Session Fee -->
             <UniversalInput 
              :inline="false" 
              :label="$t('tutor.bookings.add_session_modal.session_seats')" 
              v-model="form.spaces"
              :errors="form.errors.spaces"
              :required="true"
              type="number"
              placeholder="0"
              min="0"
              step="1"
            />

            <!-- Recurring booking for -->
            <!--<SelectInput 
              :inline="false" 
              label="Recurring booking for" 
              v-model="form.recurring_booking"
            >
              <option value="">Select From list</option>
              <option value="weekly">Weekly</option>
              <option value="biweekly">Bi-weekly</option>
              <option value="monthly">Monthly</option>
            </SelectInput>-->
          </div>
        </div>

        <!-- Text Area -->
        <TextArea 
            :label="$t('tutor.bookings.add_session_modal.what_will_be_covered')"
            v-model="form.description"
            :errors="form.errors.description"
            :placeholder="$t('tutor.bookings.add_session_modal.enter_session_description')"
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
  recurring_booking: 0,
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
