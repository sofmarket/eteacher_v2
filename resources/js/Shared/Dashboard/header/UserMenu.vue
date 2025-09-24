<template>
  <div class="relative" ref="dropdownRef">
    <button class="flex items-center text-gray-700 dark:text-gray-400" @click.prevent="toggleDropdown">
      <span class="mr-0 lg:mr-3 overflow-hidden rounded-full h-11 w-11">
        <img :src="sharedUser?.avatar" alt="User" />
      </span>

      <span class="hidden md:block mx-1 font-medium text-theme-sm">{{ sharedUser?.name }} </span>

      <ChevronDownIcon :class="{ 'hidden md:block': true, 'rotate-180': dropdownOpen }" />
    </button>

    <!-- Dropdown Start -->
    <div v-if="dropdownOpen"
      class="absolute right-0 mt-[17px] flex w-[260px] flex-col rounded-2xl border border-gray-200 bg-white p-3 shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark">
      <div>
        <span class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
          {{ sharedUser?.name }}
        </span>
        <span class="mt-0.5 block text-theme-xs text-gray-500 dark:text-gray-400">
          {{ sharedUser?.email }}
        </span>
      </div>

      <ul class="flex flex-col gap-1 pt-4 pb-3 border-b border-gray-200 dark:border-gray-800">
        <li v-for="item in menuItems" :key="item.href">
          <Link :href="item.href"
            class="flex items-center gap-3 px-3 py-2 font-medium text-gray-700 rounded-lg group text-theme-sm hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
          <!-- SVG icon would go here -->
          <component :is="item.icon" class="text-gray-500 group-hover:text-gray-700 dark:group-hover:text-gray-300" />
          {{ item.text }}
          </Link>
        </li>
      </ul>
      <Link :href="route('logout')" method="post" as="button"
        class="flex items-center gap-3 px-3 py-2 mt-3 font-medium text-gray-700 rounded-lg group text-theme-sm hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
      <LogoutIcon class="text-gray-500 group-hover:text-gray-700 dark:group-hover:text-gray-300" />
      Sign out
      </Link>
    </div>
    <!-- Dropdown End -->
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue';
import { HomeIcon, ChevronDownIcon, LogoutIcon, SettingsIcon, CalenderIcon, StaredIcon, UserGroupIcon, ChatIcon } from '@/icons'
import { Link, usePage } from '@inertiajs/vue3';
const dropdownOpen = ref(false)
const dropdownRef = ref(null)

// reactive reference to props
const page = usePage();

// safely access with optional chaining
const sharedUser = computed(() => page.props.sharedUser?.data ?? null)

const menuItems = ref([]);

const toggleDropdown = () => {
  dropdownOpen.value = !dropdownOpen.value
}

const closeDropdown = () => {
  dropdownOpen.value = false
}

const handleClickOutside = (event) => {
  if (dropdownRef.value && !dropdownRef.value.contains(event.target)) {
    closeDropdown()
  }
}

const renderUserMenu = () => {
  if (sharedUser.value.type === 'tutor') {
    return [
      {
        href: route('tutor.home'),
        icon: HomeIcon,
        text: 'Dashboard'
      },
      {
        href: route('tutor.profile'),
        icon: SettingsIcon,
        text: 'Profile Settings'
      },
    ]
  } else {
    return [
      {
        href: route('student.home'),
        icon: HomeIcon,
        text: 'Dashboard'
      },
      {
        href: route('student.profile'),
        icon: SettingsIcon,
        text: 'Profile Settings'
      },
      {
        href: route('student.bookings.index'),
        icon: CalenderIcon,
        text: 'My Bookings'
      },
      {
        href: route('student.bookings.index'),
        icon: StaredIcon,
        text: 'Favourites'
      },
      {
        href: route('front.tutors.index'),
        icon: UserGroupIcon,
        text: 'Find Tutors'
      },
      {
        href: route('conversations.index'),
        icon: ChatIcon,
        text: 'Inbox'
      },
    ]
  }
}

onMounted(() => {
  document.addEventListener('click', handleClickOutside)
  menuItems.value = renderUserMenu();
})

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside);
})
</script>
