<template>
    <!-- Sidebar Filters -->
    <div class="lg:w-1/4">
        <div class="bg-white rounded-lg shadow-md p-6 sticky top-25">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Filters</h2>
                <button class="text-sm text-blue-600 hover:text-blue-800">Clear all filters</button>
            </div>

            <!-- Session Type Filter -->
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Session Type</h3>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">All Sessions</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Private Sessions</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Group Sessions</span>
                    </label>
                </div>
            </div>

            <!-- Subject Group Filter -->
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Subject Group</h3>
                <select
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Primary school (Grade 1 to 5)</option>
                    <option>Middle School (Grades 6-8)</option>
                    <option>High School (Grades 9-10)</option>
                    <option>Intermediate (Grades 11-12)</option>
                    <option>Undergraduate (Bachelor's Degree)</option>
                    <option>Graduate (Masters degree)</option>
                    <option>Post graduate (Doctoral Degree)</option>
                </select>
            </div>

            <!-- Subject Filter -->
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Choose Subject</h3>
                <select
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Web Development</option>
                    <option>Web Designing</option>
                    <option>Software Development</option>
                    <option>Software Design</option>
                    <option>UI/UX</option>
                    <option>English</option>
                    <option>Maths</option>
                    <option>Social Studies</option>
                    <option>General Knowledge</option>
                    <option>Science</option>
                    <option>Physical Education</option>
                    <option>Physics</option>
                    <option>Computer</option>
                    <option>Chemistry</option>
                </select>
            </div>

            <!-- Fee Range -->
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Fee per session</h3>
                <div class="space-y-2">
                    <input type="range" min="0" max="100" class="w-full">
                    <div class="flex justify-between text-xs text-gray-500">
                        <span>$0</span>
                        <span>$100+</span>
                    </div>
                </div>
            </div>

            <!-- Location Filter -->
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Tutor location</h3>
                <select
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>United States</option>
                    <option>United Kingdom</option>
                    <option>Canada</option>
                    <option>Australia</option>
                    <option>Germany</option>
                    <option>France</option>
                    <option>India</option>
                    <option>Other</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>