<template>
    <div>
        <div class="flex justify-between items-center">
            <div class="flex flex-col">
                <h5 class="text-lg font-medium text-gray-800 dark:text-white/90">
                    Education Details
                </h5>
                <span class="text-sm text-gray-500">
                    Please provide your educational background to help us assess your qualifications.
                </span>
            </div>
            <div class="">
                <button class="bg-brand-500 text-white px-4 py-2 rounded-md flex items-center gap-1">
                    <span class="hidden lg:block">Add New</span> +
                </button>
            </div>
        </div>

        <div class="mt-7">
            <EducationCard 
                :education="education"
                @edit="handleEdit"
                @delete="handleDelete"
            />

            <EducationCard 
                :education="education"
                @edit="handleEdit"
                @delete="handleDelete"
            />

            <EducationCard 
                :education="education"
                @edit="handleEdit"
                @delete="handleDelete"
            />
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import EducationCard from './EducationCard.vue';

const education = ref({
    degree: 'Bachelor of Computer Science',
    university: 'University of California',
    location: 'Los Angeles',
    startDate: 'September 2015',
    endDate: 'June 2019'
});

const handleEdit = (education) => {
    // Handle edit logic here
    console.log('Edit education:', education);
};

const handleDelete = (education) => {
    // Handle delete logic here
    console.log('Delete education:', education);
};
</script>



