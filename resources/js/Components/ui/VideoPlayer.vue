<template>
    <div class="relative bg-white border-10 border-white rounded-lg overflow-hidden aspect-video">
        <img src="@/assets/images/cards/videoframe_100.png" alt="Video Introduction" class="w-full h-full object-cover rounded-lg">
        <!-- Video Controls Overlay -->
        <div class="absolute bottom-3 left-3 rounded-full text-white bg-[#2b333f75]">
            <svg class="w-13 h-13 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8 5.5l8 6.5-8 6.5v-13z" stroke="currentColor" stroke-width="3" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
    </div>
</template>