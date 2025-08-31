<template>
    <div>
        <nav class="border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                </a>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <!-- User Menu Dropdown -->
                    <div class="relative">
                        <button 
                            type="button"
                            @click="toggleUserDropdown"
                            class="flex text-sm rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            aria-expanded="false"
                        >
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="@/assets/images/user/avatar.png" alt="user photo">
                        </button>
                        
                        <!-- Dropdown menu -->
                        <div 
                            v-show="isUserDropdownOpen"
                            class="absolute right-0 mt-2 z-50 bg-white divide-y divide-gray-100 rounded-lg shadow-lg dark:bg-gray-700 dark:divide-gray-600 min-w-[200px]"
                        >
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white">{{ user.name || 'Bonnie Green' }}</span>
                                <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ user.email || 'name@flowbite.com' }}</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a 
                                        href="#" 
                                        @click="handleMenuClick('dashboard')"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                    >
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                                            </svg>
                                            Dashboard
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a 
                                        href="#" 
                                        @click="handleMenuClick('profile')"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                    >
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            Profile
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a 
                                        href="#" 
                                        @click="handleMenuClick('settings')"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                    >
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            Settings
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a 
                                        href="#" 
                                        @click="handleMenuClick('earnings')"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                    >
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                            </svg>
                                            Earnings
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a 
                                        href="#" 
                                        @click="handleMenuClick('logout')"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                    >
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                            Sign out
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Mobile menu button -->
                    <button 
                        @click="toggleMobileMenu"
                        type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-user" 
                        :aria-expanded="isMobileMenuOpen"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                
                <!-- Mobile menu -->
                <div 
                    :class="[
                        'items-center justify-between w-full md:flex md:w-auto md:order-1',
                        isMobileMenuOpen ? 'flex' : 'hidden'
                    ]" 
                    id="navbar-user"
                >
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:border-gray-700">
                        <li>
                            <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { usePage } from '@inertiajs/vue3';

// Reactive state
const isUserDropdownOpen = ref(false);
const isMobileMenuOpen = ref(false);

// Get user data from Inertia page props
const page = usePage();
const user = page.props.auth?.user || {};

// Toggle user dropdown
const toggleUserDropdown = () => {
    isUserDropdownOpen.value = !isUserDropdownOpen.value;
    // Close mobile menu when user dropdown is opened
    if (isUserDropdownOpen.value) {
        isMobileMenuOpen.value = false;
    }
};

// Toggle mobile menu
const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
    // Close user dropdown when mobile menu is opened
    if (isMobileMenuOpen.value) {
        isUserDropdownOpen.value = false;
    }
};

// Handle menu item clicks
const handleMenuClick = (action) => {
    // Close dropdown after click
    isUserDropdownOpen.value = false;
    
    switch (action) {
        case 'dashboard':
            // Navigate to dashboard
            window.location.href = '/dashboard';
            break;
        case 'profile':
            // Navigate to profile
            window.location.href = '/profile';
            break;
        case 'settings':
            // Navigate to settings
            window.location.href = '/settings';
            break;
        case 'earnings':
            // Navigate to earnings
            window.location.href = '/earnings';
            break;
        case 'logout':
            // Handle logout
            if (confirm('Are you sure you want to logout?')) {
                // You can use Inertia router here if you have a logout route
                window.location.href = '/logout';
            }
            break;
        default:
            console.log('Unknown action:', action);
    }
};

// Close dropdowns when clicking outside
const handleClickOutside = (event) => {
    const userDropdown = event.target.closest('.relative');
    const mobileMenu = event.target.closest('#navbar-user');
    
    if (!userDropdown && isUserDropdownOpen.value) {
        isUserDropdownOpen.value = false;
    }
    
    if (!mobileMenu && isMobileMenuOpen.value) {
        isMobileMenuOpen.value = false;
    }
};

// Add click outside listener
onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

// Clean up listener
onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});
</script>