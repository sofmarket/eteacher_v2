<template>
    <td :class="{
        'p-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-400': type === 'body',
        'p-4 text-left text-xs font-medium text-gray-700 dark:text-gray-400': type === 'head',
        'text-left': align === 'left',
        'text-center': align === 'center',
        'text-right': align === 'right'
    }">
        <slot></slot>
    </td>
</template>

<script setup>

const props = defineProps({
    type: {
        type: String,
        required: false,
        default: 'body' // body or head
    },
    align: {
        type: String,
        required: false,
        default: 'left' // left or center or right
    }
});
</script>