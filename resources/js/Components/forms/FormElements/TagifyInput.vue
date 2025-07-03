<template>
    <div class="flex flex-col">
        <label v-if="props.label" for="tagify-input" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">{{ props.label }}</label>
        <div class="flex-1">
            <input @change="props.onChange" ref="elem" class="w-full" />
        </div>
    </div>
</template>

<script setup>

import Tagify from "@yaireo/tagify"
import "@yaireo/tagify/dist/tagify.css"
import { ref, watch, onMounted } from 'vue';

const props = defineProps({
    value: [String, Array],
    onChange: Function,
    name: String,
    label: {
        type: String,
        default: null
    },
    whitelist: {
        type: Array,
        default: () => [],
    },
    searchKeys: {
        type: Array,
        default: () => [],
    },
});

const tagify = ref(null);
const elem = ref(null);

var tagifySettings = {
    tagTextProp: 'name',
    skipInvalid: true,
    // maxTags: 10,
    dropdown: {
        closeOnSelect: false,
        enabled: 1,
        classname: 'tagify-dropdown',
    },
    enforceWhitelist: false,
    autocomplete: true,
    whitelist: [],
};

onMounted(() => {
    if (props.whitelist.length > 0) {
        tagifySettings.whitelist = props.whitelist;
        tagifySettings.enforceWhitelist = true;
        tagifySettings.dropdown.searchKeys = props.searchKeys;
    }
    tagify.value = new Tagify(elem.value, tagifySettings);
});

watch(elem, (newVal, oldVal) => {
    // if (tagify.value != null) {
    //     tagify.value.loadOriginalValues(newVal);
    // }
});

</script>