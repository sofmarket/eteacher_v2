<template>
    <div class="min-h-screen w-full bg-stone-50 p-15 border-t">
        <div class="max-w-7xl mx-auto">
            <!-- Navigation Tabs -->
            <div class="mb-8">
                <div class="flex space-x-4">
                    <button @click="activeTab = 'education'" :class="[
                        'px-6 py-3 rounded-lg font-semibold transition-colors',
                        activeTab === 'education'
                            ? 'bg-stone-200 text-stone-800'
                            : 'text-stone-700 hover:text-stone-900'
                    ]">
                        Education
                    </button>
                    <button @click="activeTab = 'experience'" :class="[
                        'px-6 py-3 rounded-lg font-semibold transition-colors',
                        activeTab === 'experience'
                            ? 'bg-stone-200 text-stone-800'
                            : 'text-stone-700 hover:text-stone-900'
                    ]">
                        Experience
                    </button>
                    <button @click="activeTab = 'certification'" :class="[
                        'px-6 py-3 rounded-lg font-semibold transition-colors',
                        activeTab === 'certification'
                            ? 'bg-stone-200 text-stone-800'
                            : 'text-stone-700 hover:text-stone-900'
                    ]">
                        Certification & Awards
                    </button>
                </div>
            </div>

            <!-- Main Heading -->
            <h1 class="text-4xl font-bold text-stone-800 mb-8">Education</h1>

            <!-- Education Entries Grid -->
            <div class="grid grid-cols-2 gap-8">
                <!-- Entry 1 -->
                <div class="flex">
                    <div class="w-32 flex-shrink-0">
                        <p class="text-stone-700 font-medium">2015 - 2019</p>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-stone-800 mb-2">Bachelor of Computer Science</h3>
                        <div class="flex items-center mb-1">
                            <svg class="w-4 h-4 text-stone-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                            </svg>
                            <span class="text-stone-700">ABC University</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-4 h-4 text-stone-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-stone-700">Cacuaco, Angola</span>
                        </div>
                        <p class="text-stone-500 text-sm mb-2">
                            Focused on software development and cybersecurity, I build innovative software solutions
                            and...
                        </p>
                        <a href="#" class="text-stone-700 underline text-sm hover:text-stone-900">Show more</a>
                    </div>
                </div>

                <!-- Entry 2 -->
                <div class="flex">
                    <div class="w-32 flex-shrink-0">
                        <p class="text-stone-700 font-medium">2020 - 2022</p>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-stone-800 mb-2">Master of Information Technology</h3>
                        <div class="flex items-center mb-1">
                            <svg class="w-4 h-4 text-stone-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                            </svg>
                            <span class="text-stone-700">XYZ Institute</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-4 h-4 text-stone-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-stone-700">West End, Anguilla</span>
                        </div>
                        <p class="text-stone-500 text-sm mb-2">
                            Advanced studies in information technology with focus on emerging technologies and...
                        </p>
                        <a href="#" class="text-stone-700 underline text-sm hover:text-stone-900">Show more</a>
                    </div>
                </div>

                <!-- Entry 3 -->
                <div class="flex">
                    <div class="w-32 flex-shrink-0">
                        <p class="text-stone-700 font-medium">2017 - 2018</p>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-stone-800 mb-2">Diploma in Data Analytics</h3>
                        <div class="flex items-center mb-1">
                            <svg class="w-4 h-4 text-stone-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                            </svg>
                            <span class="text-stone-700">Data Academy</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-4 h-4 text-stone-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-stone-700">Montreal, Antarctica</span>
                        </div>
                        <p class="text-stone-500 text-sm mb-2">
                            Comprehensive training in data analysis, statistical modeling, and business intelligence...
                        </p>
                        <a href="#" class="text-stone-700 underline text-sm hover:text-stone-900">Show more</a>
                    </div>
                </div>

                <!-- Entry 4 -->
                <div class="flex">
                    <div class="w-32 flex-shrink-0">
                        <p class="text-stone-700 font-medium">2022 - 2023</p>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-stone-800 mb-2">Certification in Cloud Computing</h3>
                        <div class="flex items-center mb-1">
                            <svg class="w-4 h-4 text-stone-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                            </svg>
                            <span class="text-stone-700">Cloud Tech Institute</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-4 h-4 text-stone-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-stone-700">Sydney, Antigua and Barbuda</span>
                        </div>
                        <p class="text-stone-500 text-sm mb-2">
                            Specialized certification covering AWS, Azure, and Google Cloud platforms with hands-on...
                        </p>
                        <a href="#" class="text-stone-700 underline text-sm hover:text-stone-900">Show more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
const activeTab = ref('education')
</script>