<template>
  <div>
    <label :for="value" class="flex cursor-pointer select-none items-center text-sm font-medium text-gray-700 dark:text-gray-400">
      <div class="relative">
        <input 
          :type="type" 
          :id="value" 
          class="sr-only" 
          :name="name" 
          :value="value"
          :checked="modelValue === value"
          @change="$emit('update:modelValue', value)"
        >
        <div 
          class="mr-3 flex h-5 w-5 items-center justify-center rounded-full border-[1.25px]"
          :class="[
            modelValue === value
              ? 'border-brand-500 bg-brand-500' 
              : 'border-gray-300 dark:border-gray-600',
            'hover:border-brand-500 dark:hover:border-brand-500'
          ]"
        >
          <span 
            class="h-2 w-2 rounded-full bg-white"
            :class="{ 'opacity-0': modelValue !== value }"
          ></span>
        </div>
      </div> 
      {{ label }} 
    </label>
  </div> 
</template>

<script>
export default {
  name: 'CheckboxInput',
  props: {
    label: {
      type: String,
      required: true
    },
    type: {
      type: String,
      default: 'checkbox'
    },
    name: {
      type: String,
      required: true
    },
    value: {
      type: String,
      required: true
    },
    modelValue: {
      type: String,
      default: false
    }
  },
  emits: ['update:modelValue']
}
</script>
