<template>
    <div>
        <!-- Tab Content -->
        <div class="p-6">
            <!-- About Me Section -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">About me</h2>
                <div class="prose max-w-none text-gray-600">
                    <div v-html="tutor.profile?.description"></div>
                </div>
            </div>

            <!-- Subjects I Can Teach -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">I can teach</h3>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Software Design</span>
                </div>
            </div>

            <!-- Languages I Can Speak -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">I can speak</h3>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm mr-3">French</span>
                        <span class="text-sm text-gray-600">Native</span>
                    </div>
                    <div class="flex items-center">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm mr-3">Armenian</span>
                        <span class="text-sm text-gray-600">Fluent</span>
                    </div>
                    <div class="flex items-center">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm mr-3">Asturian</span>
                        <span class="text-sm text-gray-600">Intermediate</span>
                    </div>
                </div>
            </div>

            <!-- Achievements -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Achievements</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-center p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <svg class="w-8 h-8 text-yellow-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-900">Profile Complete</h4>
                            <p class="text-sm text-gray-600">All profile sections completed</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-red-50 border border-red-200 rounded-lg">
                        <svg class="w-8 h-8 text-red-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-900">Student Favorite</h4>
                            <p class="text-sm text-gray-600">Highly rated by students</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

defineProps({
    tutor: {
        type: Object,
        required: true
    }
});

</script>