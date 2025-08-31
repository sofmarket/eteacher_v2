<template>
  <div class="space-y-6">
    <div>
      <label v-if="label" :class="labelClasses">{{ label }} <span v-if="required"
          class="text-error-500">*</span></label>
      <textarea v-model="value" :placeholder="placeholder" :rows="rows" :name="name" :disabled="disabled" :dir="dir"
        class="dark:bg-dark-900 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"></textarea>
      <p class="text-error-500 mt-2 text-sm _error" v-if="errors" v-cloak>{{ errors }}</p>

    </div>
  </div>
</template>

<script>
export default {
  name: 'Textarea',
  props: {
    name: String,
    label: {
      type: String,
      default: null
    },
    modelValue: "",
    placeholder: String,
    inputClasses: {
      type: String,
      default: 'dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800'
    },
    labelClasses: {
      type: String,
      default: 'mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400'
    },
    required: {
      type: Boolean,
      default: false
    },
    rows: {
      type: Number,
      default: 6
    },
    dir: {
      type: String,
      default: ""
    },
    disabled: {
      default: false
    },
    errors: {
      type: String,
    }
  },
  emits: ['update:modelValue'],
  computed: {
    value: {
      get() {
        return this.modelValue
      },
      set(value) {
        this.$emit('update:modelValue', value)
      }
    }
  },
}
</script>