<template>
  <div :class="inline ? 'flex flex-col lg:flex-row lg:items-start lg:gap-4 sm:flex-row sm:items-start sm:gap-4' : 'flex flex-col'">
    <label v-if="label" :for="inputId" class="mt-2 lg:w-1/4 sm:w-1/3">{{ label }} <span
        v-if="required" class="text-error-500">*</span></label>
    <div class="flex-1">
      <div class="border border-gray-200 bg-gray-50 rounded-lg py-2 px-4 cursor-pointer"
        @dragover.prevent="handleDragOver" @dragleave.prevent="dragOver = false" @drop.prevent="handleDrop"
        @click="$refs.fileInput.click()" :class="{ 'bg-gray-100 border-gray-300': dragOver }">
        <div class="flex items-center justify-start space-y-2 gap-2">
          <div class="h-12 w-12 text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
            </svg>
          </div>
          <div>
            <h5 class="text-md text-gray-600 dark:text-white/90">
              Drop a file here or click here to upload
            </h5>
            <p class="text-sm text-gray-500">
              jpg, jpeg, gif or png (max. 5 MB)
            </p>
          </div>
        </div>
      </div>
      <input ref="fileInput" type="file" class="hidden" accept=".jpg,.jpeg,.gif,.png" @change="handleFileChange" />
      <div v-if="fileError" class="mt-2 text-sm text-red-500">
        {{ fileError }}
      </div>
      <div v-if="selectedFile" class="mt-2 text-sm text-gray-600">
        Selected file: {{ selectedFile.name }} ({{ formatFileSize(selectedFile.size) }})
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'FileUploader',
  props: {
    modelValue: {
      type: [File, null],
      default: null
    },
    label: {
      type: String,
      default: null
    },
    maxSize: {
      type: Number,
      default: 5 * 1024 * 1024 // 5MB in bytes
    },
    accept: {
      type: String,
      default: '.jpg,.jpeg,.gif,.png'
    },
    inline: {
      type: Boolean,
      default: true
    },
    required: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      dragOver: false,
      selectedFile: this.modelValue,
      fileError: null,
      inputId: Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15),
    };
  },
  methods: {
    handleDragOver(event) {
      this.dragOver = true;
    },
    handleDrop(event) {
      this.dragOver = false;
      const files = event.dataTransfer.files;
      if (files.length) {
        this.validateAndSetFile(files[0]);
      }
    },
    handleFileChange(event) {
      const files = event.target.files;
      if (files.length) {
        this.validateAndSetFile(files[0]);
      }
    },
    validateAndSetFile(file) {
      this.fileError = null;

      // Check file type
      const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
      if (!validTypes.includes(file.type)) {
        this.fileError = 'Invalid file type. Please upload jpg, jpeg, gif or png files only.';
        this.selectedFile = null;
        return;
      }

      // Check file size
      if (file.size > this.maxSize) {
        this.fileError = 'File size exceeds 5MB limit.';
        this.selectedFile = null;
        return;
      }

      this.selectedFile = file;
      this.$emit('file-selected', file);
      this.$emit('update:modelValue', file);
    },
    formatFileSize(bytes) {
      if (bytes < 1024) return bytes + ' bytes';
      else if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(2) + ' KB';
      else return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
    }
  }
};
</script>