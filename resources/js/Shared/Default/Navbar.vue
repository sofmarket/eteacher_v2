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
                            <Link :href="route('front.home')"
                                class="text-gray-600 hover:text-gray-900 font-medium text-md transition-colors duration-200 relative group">
                            Home</Link>
                            <Link :href="route('front.tutors.index')"
                                class="text-gray-600 hover:text-gray-900 font-medium text-md transition-colors duration-200 relative group">
                            Find a Tutor</Link>
                            <Link :href="route('front.about')"
                                class="text-gray-600 hover:text-gray-900 font-medium text-md transition-colors duration-200 relative group">
                            About</Link>
                            <Link :href="route('front.how-it-works')"
                                    class="text-gray-600 hover:text-gray-900 font-medium text-md transition-colors duration-200 relative group">
                                How It Works</Link>
                            <Link :href="route('front.faq')"
                                class="text-gray-600 hover:text-gray-900 font-medium text-md transition-colors duration-200 relative group">
                            FAQ</Link>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4" v-if="!sharedUser">
                        <Link :href="route('login')"
                            class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Login</Link>
                        <Link :href="route('signup')"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">Sign Up</Link>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

// Reactive state
const isUserDropdownOpen = ref(false);
const isMobileMenuOpen = ref(false);

// Get user data from Inertia page props
const page = usePage();
const sharedUser = page.props.sharedUser;

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