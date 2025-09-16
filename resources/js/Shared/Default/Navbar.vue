<template>
    <div>
        <!-- Navigation -->
        <nav class="fixed top-0 w-full z-50 bg-white/90 backdrop-blur-xl border-b border-gray-100/50 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <h1 class="text-2xl font-bold text-blue-600">ETeacher</h1>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-8">
                            <a href="#"
                                class="text-gray-600 hover:text-gray-900 font-medium text-md transition-colors duration-200 relative group">Home</a>
                            <a href="#"
                                class="text-gray-600 hover:text-gray-900 font-medium text-md transition-colors duration-200 relative group">About</a>
                            <a href="#"
                                class="text-gray-600 hover:text-gray-900 font-medium text-md transition-colors duration-200 relative group">Services</a>
                            <a href="#"
                                class="text-gray-600 hover:text-gray-900 font-medium text-md transition-colors duration-200 relative group">Contact</a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button
                            class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Login</button>
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">Sign
                            Up</button>
                    </div>
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