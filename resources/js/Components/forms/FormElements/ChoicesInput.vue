<template>
  <div :class="parentClasses">
    <div
      :class="inline ? 'flex flex-col lg:flex-row lg:items-center lg:gap-4 sm:flex-row sm:items-center sm:gap-4' : 'flex flex-col'">
      <label v-if="label" :for="inputId" :class="[labelClasses, 'lg:w-1/4 sm:w-1/3']">{{ label }} <span v-if="required"
          class="text-error-500">*</span></label>
      <div class="flex-1">
        <select :id="inputId || 'my-select'" :multiple="multiple" ref="mySelect" :disabled="disabled">
          <slot />
        </select>
        <p class="text-error-500 mt-2 text-sm" v-if="errors" v-cloak>{{ errors }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import Choices from 'choices.js';
import "choices.js/public/assets/styles/choices.css";

export default {
  name: 'ChoicesInput',
  props: {
    name: String,
    label: {
      type: String,
      default: null
    },
    multiple: {
      type: Boolean,
      default: false
    },
    modelValue: {
      type: [Array, Object, String, Number],
      default: () => []
    },
    placeholder: String,
    inputId: {
      type: String,
    },
    labelClasses: {
      type: String,
      default: 'mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400'
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
  emits: ['update:modelValue'],
  data() {
    return {
      choices: null
    }
  },
  methods: {
    handleChoicesChange() {
      if (this.choices) {
        const values = this.choices.getValue(true);
        if (this.multiple) {
          // For multiple select, emit array of values
          this.$emit('update:modelValue', values);
        } else {
          console.log(values);
          // For single select, emit single value
          this.$emit('update:modelValue', values ?? null);
        }
      }
    },
    updateChoicesValue() {
      this.$nextTick(() => {
        if (this.choices) {
          if (this.multiple) {
            this.choices.setChoiceByValue(
              Array.isArray(this.modelValue) ? this.modelValue.map(v => String(v)) : []
            );
          } else {
            this.choices.setChoiceByValue(this.modelValue ? String(this.modelValue) : '');
          }
        }
      });
    }
  },
  mounted() {
    this.$nextTick(() => {

      this.choices = new Choices(this.$refs.mySelect, {
        removeItems: true,
        removeItemButton: true,
        removeItemButtonAlignLeft: false,
        placeholder: this.placeholder,
        placeholderValue: this.placeholder,
        searchEnabled: true,
        itemSelectText: '',
      });

      // Set initial value
      this.updateChoicesValue();

      // Listen for changes
      this.choices.passedElement.element.addEventListener('change', this.handleChoicesChange);
    });
  },
  beforeUnmount() {
    if (this.choices) {
      this.choices.destroy();
    }
  },
  watch: {
    modelValue: {
      handler() {
        this.updateChoicesValue();
      },
      deep: true
    },
    disabled(newVal) {
      if (this.choices) {
        if (newVal) {
          this.choices.disable();
        } else {
          this.choices.enable();
        }
      }
    }
  }
}
</script>