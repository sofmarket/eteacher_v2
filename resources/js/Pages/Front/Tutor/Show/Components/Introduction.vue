<template>
    <div>
        <!-- About Me Section -->
        <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">About me</h3>
            <div class="prose max-w-none text-gray-600 leading-relaxed">
                <div v-if="tutor.profile?.description" v-html="tutor.profile.description"></div>
                <div v-else class="text-gray-600">
                    <p class="mb-4">Hi! I am {{ tutor.profile?.full_name || 'Cynthia Hunter' }}, a dedicated and experienced tutor with a passion for helping students excel in their academic pursuits. With expertise across a variety of subjects, including mathematics, science, and language arts, I offer a personalized approach to tutoring that addresses each student's unique learning needs.</p>
                    
                    <p class="mb-4">My teaching philosophy is centered on fostering a supportive and engaging learning environment where students feel encouraged to explore, ask questions, and develop a strong understanding of the material.</p>
                    
                    <p class="mb-4">Over the years, I have had the privilege of working with students from diverse backgrounds and educational levels, from elementary school through college. My approach involves using interactive and practical teaching methods that make complex concepts more accessible and relatable. I am committed to not only improving academic performance but also building confidence and instilling a genuine love for learning.</p>
                    
                    <p class="mb-4">By tailoring my sessions to align with each student's individual goals and learning style, I aim to make every lesson both effective and enjoyable.</p>
                    
                    <p class="mb-4">In addition to subject-specific tutoring, I emphasize the development of key academic skills, such as effective study habits, time management, and test-taking strategies. These skills are essential for long-term success and personal growth.</p>
                    
                    <p>My goal is to provide comprehensive support that empowers students to achieve their full potential and excel in their studies. Whether you need help with specific coursework or want to enhance your overall academic performance, I am here to guide you every step of the way.</p>
                </div>
            </div>
        </div>

        <!-- Subjects I Can Teach -->
        <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">I can teach</h3>
            <div class="flex flex-wrap gap-2">
                <span v-for="subject in tutor.subjects || defaultSubjects" :key="subject" 
                      class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                    {{ subject }}
                </span>
                <span v-if="tutor.subjects && tutor.subjects.length > 7" 
                      class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm cursor-pointer hover:bg-gray-200">
                    +{{ tutor.subjects.length - 7 }} more Show less
                </span>
            </div>
        </div>

        <!-- Languages I Can Speak -->
        <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">I can speak</h3>
            <div class="space-y-2">
                <div class="flex items-center flex-wrap gap-2">
                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                        {{ tutor.profile?.native_language || 'French' }}
                    </span>
                    <span class="text-sm text-gray-600">Native</span>
                    <span v-for="language in tutor.languages || defaultLanguages" 
                          :key="language" 
                          class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                        {{ language }}
                    </span>
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
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    tutor: {
        type: Object,
        required: true
    }
});

// Default subjects if none provided
const defaultSubjects = [
    'Software Design',
    'UI/UX',
    'English',
    'Physical Education',
    'Social Studies',
    'General Knowledge',
    'Science',
    'Maths',
    'Computer'
];

// Default languages if none provided
const defaultLanguages = [
    'Armenian',
    'Asturian'
];

</script>