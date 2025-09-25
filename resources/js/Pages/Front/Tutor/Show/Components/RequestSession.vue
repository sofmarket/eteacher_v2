<template>
    <div>
        <button @click="showModal = true"
            class="bg-[#ff6b35] text-white px-4 py-2 rounded-lg font-medium transition-colors">
            Request a Session
        </button>
        <Modal title="Request a Session" :modalActive="showModal" @close="showModal = false">
            <!-- Request Session Section -->
            <template #body>
                <!-- Session Type Selector -->
                <div class="mb-6 w-full">
                    <div class="bg-stone-100 rounded-lg p-1 flex">
                        <button
                            @click="selectedSessionType = 'private'"
                            class="relative px-6 py-3 text-sm font-medium transition-all duration-200 rounded-md w-full"
                            :class="selectedSessionType === 'private' 
                                ? 'bg-white text-stone-800 shadow-sm' 
                                : 'text-stone-600 hover:text-stone-800'"
                        >
                            Private Session
                        </button>
                        <button
                            @click="selectedSessionType = 'group'"
                            class="relative px-6 py-3 text-sm font-medium transition-all duration-200 rounded-md w-full"
                            :class="selectedSessionType === 'group' 
                                ? 'bg-white text-stone-800 shadow-sm' 
                                : 'text-stone-600 hover:text-stone-800'"
                        >
                            Group Session
                        </button>
                    </div>
                </div>

                <form class="mt-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                            <input type="text"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                            <input type="text"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                        <input type="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                        <textarea rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                </form>
            </template>
        </Modal>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import Modal from '@/Components/ui/Modal.vue';

const showModal = ref(false);
const selectedSessionType = ref('private');

</script>