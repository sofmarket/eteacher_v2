<template>
    <div class="w-full bg-stone-50 border-t p-15 select-none">
        <div class="max-w-7xl mx-auto">
            <!-- Student Reviews Heading -->
            <h2 class="text-3xl font-bold text-stone-800 mb-8">Student Reviews</h2>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Rating Summary Card (Left Column) -->
                <div class="bg-stone-100 rounded-lg p-6">
                    <!-- Overall Rating -->
                    <div class="text-center mb-6 flex items-center justify-start gap-3 border-b border-stone-200 pb-4">
                        <div class="text-6xl text-stone-800 mb-2">5.0</div>
                        <div class="flex flex-col items-start justify-center mb-2">
                            <div class="flex">
                                <svg v-for="i in 5" :key="i" class="w-4 h-4 text-yellow-400 fill-current"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <span class="text-stone-600 text-md">Based on 1 rating</span>
                        </div>
                    </div>

                    <!-- Rating Distribution -->
                    <div class="space-y-3">
                        <div v-for="rating in [5, 4, 3, 2, 1]" :key="rating" class="w-full mb-5">
                            <div class="flex items-center justify-between w-full mb-3">
                                <span class="text-stone-700 font-medium w-8 text-sm">{{ rating }}.0</span>
                                <span class="text-stone-700 text-sm w-4 text-right">
                                    {{ rating === 5 ? '1' : '0' }}
                                </span>
                            </div>
                            <div class="w-full">
                                <div class="h-1 bg-stone-200 rounded-full overflow-hidden">
                                    <div :class="[
                                        'h-full rounded-full transition-all duration-300',
                                        rating === 5 ? 'bg-green-500' : 'bg-stone-200'
                                    ]" :style="{ width: rating === 5 ? '100%' : '0%' }"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Individual Review Section (Right Column) -->
                <div class="space-y-6 lg:col-span-2">
                    <!-- Review Card -->
                    <div class="bg-white rounded-lg p-6 shadow-sm border border-stone-200">
                        <!-- Reviewer Profile -->
                        <div class="flex items-start mb-4">
                            <div
                                class="w-12 h-12 rounded-full bg-stone-300 flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-8 h-8 text-stone-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center mb-1">
                                    <h4 class="font-bold text-stone-800 mr-2">Louis J</h4>
                                    <div class="w-4 h-4 bg-blue-500 rounded flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-stone-500 text-sm">Aug 29, 2024</p>
                            </div>
                        </div>

                        <!-- Review Rating -->
                        <div class="flex items-center mb-4">
                            <div class="flex mr-2">
                                <svg v-for="i in 5" :key="i" class="w-5 h-5 text-yellow-400 fill-current"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <span class="text-stone-800 font-medium">5.0/5.0</span>
                        </div>

                        <!-- Review Text -->
                        <div class="text-stone-600 leading-relaxed">
                            <p v-if="!showFullReview">
                                Cynthia Hunter is a fantastic English tutor who brings clarity and passion to her
                                teaching. Her lessons are engaging and tailored to each student's needs, making complex
                                concepts...
                            </p>
                            <p v-else>
                                Cynthia Hunter is a fantastic English tutor who brings clarity and passion to her
                                teaching. Her lessons are engaging and tailored to each student's needs, making complex
                                concepts easy to understand. She has a wonderful ability to connect with students and
                                create a supportive learning environment. I highly recommend her services to anyone
                                looking to improve their English skills.
                            </p>
                            <button @click="showFullReview = !showFullReview"
                                class="text-stone-800 underline hover:text-stone-900 mt-2 text-sm">
                                {{ showFullReview ? 'Show less' : 'Show more' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const showFullReview = ref(false)
</script>