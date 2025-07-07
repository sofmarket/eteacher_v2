<template>
  <div :class="parentClasses">
    <div
      :class="inline ? 'flex flex-col lg:flex-row lg:items-center lg:gap-4 sm:flex-row sm:items-center sm:gap-4' : 'flex flex-col'">
      <label v-if="label" :for="inputId" :class="[labelClasses, 'lg:w-1/4 sm:w-1/3']">{{ label }} <span v-if="required"
          class="text-error-500">*</span></label>
      <div class="flex-1">
        <select :class="[inputClasses, errors ? 'border-red-500 focus:border-red-500 focus:ring-red-500/10' : '']"
          :id="inputId || 'my-select'" v-bind="$attrs" :value="modelValue"
          @change="$emit('update:modelValue', $event.target.value)">
          <slot />
        </select>
        <p class="text-error-500 mt-2 text-sm" v-if="errors" v-cloak>{{ errors }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SelectInput',
  props: {
    name: String,
    modelValue: [String, Number],
    label: {
      type: String,
      default: null
    },
    placeholder: String,
    inputId: {
      type: String,
    },
    labelClasses: {
      type: String,
      default: 'mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400'
    },
    inputClasses: {
      type: String,
      default: 'dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800'
    },
    parentClasses: {
      type: String,
      default: ''
    },
    required: {
      type: Boolean,
      default: false
    },
    inline: {
      type: Boolean,
      default: false
    },
    disabled: {
      type: Boolean,
      default: false
    },
    errors: {
      type: String,
    }
  },
}
</script>