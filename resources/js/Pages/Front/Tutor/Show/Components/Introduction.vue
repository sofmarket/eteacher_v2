<template>
    <div class="w-full" id="introduction-tab">
        <!-- Tab Content -->
        <div class="max-w-7xl mx-auto p-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Section - Profile -->
                <div class="lg:col-span-2">
                    <div class="space-y-6">
                        <!-- Profile Header -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div
                                    class="w-18 h-18 rounded-xl bg-purple-200 flex items-center justify-center mr-4 flex-shrink-0 relative">
                                    <svg class="w-12 h-12 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span
                                        class="absolute bottom-[-2px] right-[calc(50%-2px)] bg-green-400 w-2 h-2 rounded-full"></span>
                                </div>
                                <div class="">
                                    <div class="flex items-center mb-1">
                                        <h1 class="text-2xl font-bold text-stone-800">Cynthia Hunter</h1>
                                        <div class="flex items-center mx-2">
                                            <svg class="w-6 h-6 text-green-500" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-green-600 font-medium mx-1">Verified</span>
                                        </div>
                                    </div>
                                    <p class="text-sm text-stone-600">Empowering Students with Customized Learning
                                        Support.</p>
                                </div>
                            </div>
                            <!-- Pricing -->
                            <div class="text-right">
                                <div class="text-2xl text-stone-800">$40.00<span
                                        class="text-stone-600">/session</span>
                                </div>
                                <p class="text-stone-600 text-sm">Starting from</p>
                            </div>
                        </div>
                        <!-- Tutor Statistics -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-stone-600 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    <span class="text-stone-700">5.0 /5.0 (1 review)</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-stone-600 mr-2" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-stone-700">74 Booked sessions</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-stone-600 mr-2" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-stone-700">0 Sessions</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-stone-600 mr-2" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-stone-700">4 Hours Response time</span>
                                </div>

                                <!-- Social Profiles -->
                                <div>
                                    <div class="flex items-center mb-3">
                                        <svg class="w-5 h-5 text-stone-600 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <h3 class="font-semibold text-stone-800">Social Profiles</h3>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a v-for="socialProfile in tutor?.social_profiles || []"
                                            :href="socialProfile.url" target="_blank"
                                            class="w-5 h-5 text-stone-600 mr-2 rounded-full flex items-center justify-center text-white p-5"
                                            :class="getSocialProfileColor(socialProfile.type)">
                                            <b v-html="getSocialProfileShape(socialProfile.type)"></b>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <div class="space-y-4">
                                <!-- Teaching Subjects -->
                                <div>
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 text-stone-600 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <h3 class="font-semibold text-stone-800">I can teach</h3>
                                    </div>
                                    <p class="text-stone-700">
                                        Software Design, UI/UX,
                                        <span class="underline cursor-pointer">+7 more</span>
                                    </p>
                                </div>

                                <!-- Languages Spoken -->
                                <div>
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 text-stone-600 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <h3 class="font-semibold text-stone-800">I can speak</h3>
                                    </div>
                                    <div class="flex flex-wrap gap-2">
                                        <span
                                            class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">French</span>
                                        <span
                                            class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Native</span>
                                        <span
                                            class="px-3 py-1 bg-stone-100 text-stone-700 rounded-full text-sm">Armenian</span>
                                        <span
                                            class="px-3 py-1 bg-stone-100 text-stone-700 rounded-full text-sm">Asturian</span>
                                    </div>
                                </div>

                                <!-- Achievements -->
                                <div>
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 text-stone-600 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <h3 class="font-semibold text-stone-800">Achievements</h3>
                                    </div>
                                    <div class="flex space-x-2">
                                        <div
                                            class="w-8 h-8 bg-gradient-to-br from-pink-400 to-red-500 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div
                                            class="w-8 h-8 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Action Buttons - Bottom of entire layout -->
                    <div class="mt-8 flex items-center gap-3">
                        <div class="flex space-x-3">
                            <button
                                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg flex items-center space-x-2 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Book a session</span>
                            </button>
                            <button
                                class="bg-stone-100 hover:bg-stone-200 text-stone-800 px-6 py-3 rounded-lg flex items-center space-x-2 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Send message</span>
                            </button>
                        </div>
                        <button
                            class="w-12 h-12 bg-stone-100 hover:bg-stone-200 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 text-stone-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <VideoPlayer />
                </div>
            </div>
        </div>
        <!-- Tab Navigation -->
        <div class="w-full border-b-2 border-gray-200 mt-5">
            <div class="max-w-7xl mx-auto px-8 py-0">
                <nav class="flex space-x-4">
                    <button v-for="tab in tabs" :key="tab.id" @click="activeTab = tab.id; scrollToTab(tab.target)"
                        class="relative py-4 px-1 text-md font-medium transition-colors duration-200 w-full text-center" :class="activeTab === tab.id
                            ? 'text-stone-800'
                            : 'text-stone-600 hover:text-stone-800'">
                        <span class="flex items-center justify-center">
                            {{ tab.name }}
                            <span v-if="tab.badge"
                                class="ml-2 inline-flex items-center justify-center w-5 h-5 text-xs font-medium text-stone-700 bg-stone-200 rounded-full">
                                {{ tab.badge }}
                            </span>
                        </span>
                        <!-- Active tab indicator -->
                        <div v-if="activeTab === tab.id"
                            class="absolute bottom-0 left-0 right-0 h-1 bg-green-600 rounded-t-sm z-999"></div>
                    </button>
                </nav>
            </div>
        </div>
        <div class="max-w-7xl mx-auto p-8">
            <!-- About Me Section -->
            <div class="mt-5">
                <h2 class="text-2xl font-bold text-stone-800 mb-4">About me</h2>
                <div class="text-stone-700 leading-relaxed space-y-4">
                    <p v-if="!showFullAbout">
                        Hi! I am Cynthia Hunter, a dedicated and experienced tutor with a passion for helping
                        students
                        excel in their academic pursuits. With expertise across subjects including mathematics,
                        science,
                        and language arts, I bring a personalized approach to tutoring that addresses each student's
                        unique learning needs. My teaching philosophy is centered on fostering a supportive and
                        engaging
                        learning environment where students feel encouraged to explore, ask questions, and develop a
                        strong understanding of the material.
                    </p>
                    <div v-else>
                        <p>
                            Hi! I am Cynthia Hunter, a dedicated and experienced tutor with a passion for helping
                            students excel in their academic pursuits. With expertise across subjects including
                            mathematics, science, and language arts, I bring a personalized approach to tutoring
                            that
                            addresses each student's unique learning needs. My teaching philosophy is centered on
                            fostering a supportive and engaging learning environment where students feel encouraged
                            to
                            explore, ask questions, and develop a strong understanding of the material.
                        </p>
                        <p>
                            Over the years, I have had the privilege of working with students from diverse
                            backgrounds
                            and educational levels, from elementary school through college. My approach involves
                            using
                            interactive and practical teaching methods that make complex concepts more accessible
                            and
                            relatable. I am committed to not only improving academic performance but also building
                            confidence and instilling a genuine love for learning. By tailoring my sessions to align
                            with each student's individual goals and learning style, I aim to make every lesson both
                            effective and enjoyable.
                        </p>
                        <p>
                            In addition to subject-specific tutoring, I emphasize the development of key academic
                            skills, such as effective study habits, time management, and test-taking strategies.
                            These
                            skills are essential for long-term success and personal growth. My goal is to provide
                            comprehensive support that empowers students to achieve their full potential and excel
                            in
                            their studies. Whether you need help with specific coursework or want to enhance your
                            overall academic performance, I am here to guide you every step of the way.
                        </p>
                    </div>
                    <button @click="showFullAbout = !showFullAbout"
                        class="text-stone-800 underline hover:text-stone-900 text-sm">
                        {{ showFullAbout ? 'Show less' : 'Show more' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import VideoPlayer from '@/Components/ui/VideoPlayer.vue';

const showFullAbout = ref(false);
const activeTab = ref('introduction');

const tabs = ref([
    { id: 'introduction', name: 'Introduction', target: 'introduction-tab' },
    { id: 'availability', name: 'Availability', target: 'availability-tab' },
    { id: 'resume', name: 'Resume Highlights', target: 'resume-tab' },
    { id: 'reviews', name: 'Reviews', badge: '1', target: 'reviews-tab' }
]);

const scrollToTab = (target) => {
    const tab = document.getElementById(target);
    if (tab) {
        const navbar = document.getElementById('navbar');
        window.scrollTo({ 
            behavior: 'smooth',
            top: tab.offsetTop - navbar.offsetHeight
        });
    }
}

const props = defineProps({
    tutor: {
        type: Object,
        required: true
    }
});

const getSocialProfileColor = (type) => {
    switch (type) {
        case 'facebook':
            return 'bg-blue-600 hover:bg-blue-700';
        case 'twitter':
            return 'bg-blue-800 hover:bg-blue-900';
        case 'linkedin':
            return 'bg-blue-500 hover:bg-blue-600';
        case 'instagram':
            return 'bg-pink-600 hover:bg-pink-700';
        case 'pinterest':
            return 'bg-pink-600 hover:bg-pink-700';
        case 'youtube':
            return 'bg-red-600 hover:bg-red-700';
        case 'tiktok':
            return 'bg-black hover:bg-black/80';
        default:
            return 'bg-gray-600 hover:bg-gray-700';
    }
}

const getSocialProfileShape = (type) => {
    switch (type) {
        case 'facebook':
            return `<svg fill="#ffffff" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
    <path d="M1168.737 487.897c44.672-41.401 113.824-36.889 118.9-36.663l289.354-.113 6.317-417.504L1539.65 22.9C1511.675 16.02 1426.053 0 1237.324 0 901.268 0 675.425 235.206 675.425 585.137v93.97H337v451.234h338.425V1920h451.234v-789.66h356.7l62.045-451.233H1126.66v-69.152c0-54.937 14.214-96.112 42.078-122.058" fill-rule="evenodd"/>
</svg>`;
        case 'twitter':
            return `<svg width="20px" height="20px" viewBox="0 -2 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>twitter [#154]</title>
                <desc>Created with Sketch.</desc>
                <defs>
            </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Dribbble-Light-Preview" transform="translate(-60.000000, -7521.000000)" fill="#ffffff">
                        <g id="icons" transform="translate(56.000000, 160.000000)">
                            <path d="M10.29,7377 C17.837,7377 21.965,7370.84365 21.965,7365.50546 C21.965,7365.33021 21.965,7365.15595 21.953,7364.98267 C22.756,7364.41163 23.449,7363.70276 24,7362.8915 C23.252,7363.21837 22.457,7363.433 21.644,7363.52751 C22.5,7363.02244 23.141,7362.2289 23.448,7361.2926 C22.642,7361.76321 21.761,7362.095 20.842,7362.27321 C19.288,7360.64674 16.689,7360.56798 15.036,7362.09796 C13.971,7363.08447 13.518,7364.55538 13.849,7365.95835 C10.55,7365.79492 7.476,7364.261 5.392,7361.73762 C4.303,7363.58363 4.86,7365.94457 6.663,7367.12996 C6.01,7367.11125 5.371,7366.93797 4.8,7366.62489 L4.8,7366.67608 C4.801,7368.5989 6.178,7370.2549 8.092,7370.63591 C7.488,7370.79836 6.854,7370.82199 6.24,7370.70483 C6.777,7372.35099 8.318,7373.47829 10.073,7373.51078 C8.62,7374.63513 6.825,7375.24554 4.977,7375.24358 C4.651,7375.24259 4.325,7375.22388 4,7375.18549 C5.877,7376.37088 8.06,7377 10.29,7376.99705" id="twitter-[#154]">
            </path>
                        </g>
                    </g>
                </g>
            </svg>`;
        case 'linkedin':
            return `<svg fill="#ffffff" width="15px" height="15px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
    <path d="M478.234 600.75V1920H.036V600.75h478.198Zm720.853-2.438v77.737c69.807-45.056 150.308-71.249 272.38-71.249 397.577 0 448.521 308.666 448.521 577.562v737.602h-480.6v-700.836c0-117.867-42.173-140.215-120.15-140.215-74.134 0-120.151 23.55-120.151 140.215v700.836h-480.6V598.312h480.6ZM239.099 0c131.925 0 239.099 107.294 239.099 239.099s-107.174 239.099-239.1 239.099C107.295 478.198 0 370.904 0 239.098 0 107.295 107.294 0 239.099 0Z" fill-rule="evenodd"/>
</svg>`;
        case 'instagram':
            return `<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3 11C3 7.22876 3 5.34315 4.17157 4.17157C5.34315 3 7.22876 3 11 3H13C16.7712 3 18.6569 3 19.8284 4.17157C21 5.34315 21 7.22876 21 11V13C21 16.7712 21 18.6569 19.8284 19.8284C18.6569 21 16.7712 21 13 21H11C7.22876 21 5.34315 21 4.17157 19.8284C3 18.6569 3 16.7712 3 13V11Z" stroke="#ffffff" stroke-width="2"/>
<circle cx="16.5" cy="7.5" r="1.5" fill="#ffffff"/>
<circle cx="12" cy="12" r="3" stroke="#ffffff" stroke-width="2"/>
</svg>`;
        case 'pinterest':
            return `<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z" />
            </svg>`;
        case 'youtube':
            return `<svg width="20px" height="20px" viewBox="0 -3 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    
    <title>youtube [#168]</title>
    <desc>Created with Sketch.</desc>
    <defs>

</defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -7442.000000)" fill="#ffffff">
            <g id="icons" transform="translate(56.000000, 160.000000)">
                <path d="M251.988432,7291.58588 L251.988432,7285.97425 C253.980638,7286.91168 255.523602,7287.8172 257.348463,7288.79353 C255.843351,7289.62824 253.980638,7290.56468 251.988432,7291.58588 M263.090998,7283.18289 C262.747343,7282.73013 262.161634,7282.37809 261.538073,7282.26141 C259.705243,7281.91336 248.270974,7281.91237 246.439141,7282.26141 C245.939097,7282.35515 245.493839,7282.58153 245.111335,7282.93357 C243.49964,7284.42947 244.004664,7292.45151 244.393145,7293.75096 C244.556505,7294.31342 244.767679,7294.71931 245.033639,7294.98558 C245.376298,7295.33761 245.845463,7295.57995 246.384355,7295.68865 C247.893451,7296.0008 255.668037,7296.17532 261.506198,7295.73552 C262.044094,7295.64178 262.520231,7295.39147 262.895762,7295.02447 C264.385932,7293.53455 264.28433,7285.06174 263.090998,7283.18289" id="youtube-[#168]">

</path>
            </g>
        </g>
    </g>
</svg>`;
        case 'tiktok':
            return `<svg fill="#ffffff" width="20px" height="20px" viewBox="0 0 24 24" id="tiktok" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><path id="primary" d="M21,7V9a1,1,0,0,1-1,1,8,8,0,0,1-4-1.08V15.5A6.5,6.5,0,1,1,6.53,9.72a1,1,0,0,1,1.47.9v2.52a.92.92,0,0,1-.28.62,2.49,2.49,0,0,0,2,4.23A2.61,2.61,0,0,0,12,15.35V3a1,1,0,0,1,1-1h2.11a1,1,0,0,1,1,.83A4,4,0,0,0,20,6,1,1,0,0,1,21,7Z" style="fill: rgb(255, 255, 255);"></path></svg>`;
        default:
            return `<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z" />
            </svg>`;
    }
}

</script>