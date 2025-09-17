<template>
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
        <div class="p-6">
            <div class="flex items-center mb-4">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                    <span class="text-2xl font-bold text-blue-600">JS</span>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900">{{ tutor.name }}</h3>
                    <p class="text-sm text-gray-600">Mathematics Tutor</p>
                    <div class="flex items-center mt-1">
                        <div class="flex text-yellow-400">
                            <span>★★★★★</span>
                        </div>
                        <span class="ml-2 text-sm text-gray-600">(4.9)</span>
                    </div>
                </div>
            </div>
            <p class="text-gray-600 text-sm mb-4">
                Experienced math tutor with 5+ years helping students excel in algebra, calculus, and geometry.
            </p>
            <div class="flex items-center justify-between mb-4">
                <span class="text-lg font-bold text-green-600">$25/hour</span>
                <span class="text-sm text-gray-500">Online</span>
            </div>
            <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                Send Message
            </button>
        </div>
    </div>
</template>

<script setup>  
import { onMounted } from 'vue';

const props = defineProps({
    tutor: {
        type: Object,
        required: true
    }
});

onMounted(() => {
    console.log(props.tutor);
});

</script>