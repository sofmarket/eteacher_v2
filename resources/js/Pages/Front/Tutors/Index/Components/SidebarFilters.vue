<template>
    <!-- Sidebar Filters -->
    <div class="lg:w-1/4">
        <div class="bg-white rounded-lg shadow-md p-6 sticky top-25">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Filters</h2>
                <button class="text-sm text-blue-600 hover:text-blue-800" @click="onClearFilters">Clear all filters</button>
            </div>

            <!-- Session Type Filter -->
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Session Type</h3>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="radio" name="session_type" v-model="filters.session_type" value="all"
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">All Sessions</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="session_type" v-model="filters.session_type" value="private"
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Private Sessions</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="session_type" v-model="filters.session_type" value="group"
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Group Sessions</span>
                    </label>
                </div>
            </div>

            <!-- Subject Group Filter -->
            <ChoicesInput class="mb-6" v-model="filters.group_id" placeholder="Choose a subject group"
                label="Subject Group">
                <option v-for="group in subjectGroups" :value="group.id" :key="group.id">{{ group.name }}</option>
            </ChoicesInput>

            <!-- Subject Filter -->
            <ChoicesInput class="mb-6" v-model="filters.subject_id" placeholder="Choose a subject"
                label="Choose Subject">
                <option v-for="subject in subjects" :value="subject.id" :key="subject.id">{{ subject.name }}</option>
            </ChoicesInput>

            <!-- Location Filter -->
            <ChoicesInput class="mb-6" v-model="filters.city" placeholder="Choose a city" label="Tutor location">
                <option v-for="city in cities" :value="city.id" :key="city.id">{{ city.name }}</option>
            </ChoicesInput>

            <!-- Fee Range -->
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Fee per session</h3>
                <div class="space-y-2">
                    <input type="range" min="0" max="100" v-model="filters.max_price" class="w-full">
                    <div class="flex justify-between text-xs text-gray-500">
                        <span>$0</span>
                        <span>$100+</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script setup>
import { ref, computed, watch, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3';
import ChoicesInput from '@/Components/forms/FormElements/ChoicesInput.vue';

const emit = defineEmits(['filtered']);

const page = usePage();

const subjectGroups = computed(() => page.props.subjectGroups.data);
const subjects = computed(() => page.props.subjects.data);
const cities = computed(() => page.props.cities.data);

const filters = ref(page.props.filters);

const onClearFilters = () => {
    filters.value = {
        session_type: 'all',
        group_id: null,
        subject_id: null,
        max_price: null,
        city: null
    };
}

watch(filters, () => {

    let _filters = {};

    if (filters.value.session_type !== 'all') {
        _filters.session_type = filters.value.session_type;
    }
    
    if (filters.value.group_id) {
        _filters.group_id = filters.value.group_id;
    }
    
    if (filters.value.subject_id) {
        _filters.subject_id = filters.value.subject_id;
    }
    
    if (filters.value.max_price) {
        _filters.max_price = filters.value.max_price;
    }
    
    if (filters.value.city) {
        _filters.city = filters.value.city;
    }

    emit('filtered', _filters);

}, { deep: true });

onMounted(() => {
    console.log(filters.value);
});


</script>