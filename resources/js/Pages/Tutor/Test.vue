<template>
    <div class="flex flex-col">
        <SelectInput label="Fruits" v-model="fruits" multiple>
            <option v-for="fruit in fruitsData" :key="fruit" :value="fruit">{{ fruit }}</option>
        </SelectInput>
        <hr>
        <button @click="submit" class="bg-blue-500 text-white p-2 rounded-md mt-4">submit</button>
    </div>
</template>

<script setup>

import { onMounted } from 'vue';
import { ref } from 'vue';
import SelectInput from '@/Components/forms/FormElements/SelectInput.vue';

const fruits = ref([]);
const fruitsData = ref([
    'Banana',
    'Apple',
    'Orange',
    'Pineapple',
    'Mango',
    'Strawberry',
    'Watermelon',
    'Kiwi',
    'Grapes',
    'Cherry',
    'Peach',
    'Plum',
    'Pear'
]);

onMounted(() => {
    console.log(fruits.value);
});

const submit = () => {
    console.log(fruits.value);
}
</script>
