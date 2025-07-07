<template>
    <div :class="parentClasses">
      <div :class="inline ? 'flex flex-col lg:flex-row lg:items-center lg:gap-4 sm:flex-row sm:items-center sm:gap-4' : 'flex flex-col'">
        <label v-if="label" :for="inputId" :class="[labelClasses, 'lg:w-1/4 sm:w-1/3']">{{ label }} <span v-if="required" class="text-error-500">*</span></label>
        <div class="flex-1">
          <input :type="type"
                 :id="inputId || name"
                 :name="name"
                 :value="modelValue"
                 @input="$emit('update:modelValue', $event.target.value)"
                 @blur="trimInput"
                 :placeholder="placeholder || label"
                 :class="[inputClasses, errors ? 'border-red-500 focus:border-red-500 focus:ring-red-500/10' : '']"
                 :required="required"
                 :autofocus="autofocus"
                 :disabled="disabled"
                 :autocomplete="autocomplete"
                 :dir="dir">
          <p class="text-error-500 mt-2 text-sm" v-if="errors" v-cloak>{{ errors }}</p>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'UniversalInput',
    props: {
      name: String,
      type: {
        type: String,
        default: 'text'
      },
      label: {
        type: String,
        default: null
      },
      modelValue: "",
      placeholder: String,
      inputId: {
        type: String,
      },
      autocomplete: {
        type: String,
        default: 'on'
      },
      labelClasses: {
        type: String,
        default: 'mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400'
      },
      parentClasses: {
        type: String,
        default: ''
      },
      inputClasses: {
        type: String,
        default: 'dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800'
      },
      required: {
        type: Boolean,
        default: false
      },
      inline: {
        type: Boolean,
        default: true
      },
      autofocus: {
        type: Boolean,
        default: false
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
    methods: {
      trimInput(event) {
        if(this.type !== "email") return;
        event.target.value = event.target.value.trim();
      }
    }
  }
  </script>