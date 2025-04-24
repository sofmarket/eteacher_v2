import { ref, computed, onMounted, onUnmounted } from "vue";

// Shared state outside the function
const isExpanded = ref(true);
const isMobileOpen = ref(false);
const isMobile = ref(false);
const isHovered = ref(false);
const activeItem = ref(null);
const openSubmenu = ref(null);

export function useSidebar() {
    const handleResize = () => {
        const mobile = window.innerWidth < 768;
        isMobile.value = mobile;
        if (!mobile) {
            isMobileOpen.value = false;
        }
    };

    onMounted(() => {
        handleResize();
        window.addEventListener("resize", handleResize);
    });

    onUnmounted(() => {
        window.removeEventListener("resize", handleResize);
    });

    const toggleSidebar = () => {
        if (isMobile.value) {
            isMobileOpen.value = !isMobileOpen.value;
        } else {
            isExpanded.value = !isExpanded.value;
        }
    };

    const toggleMobileSidebar = () => {
        isMobileOpen.value = !isMobileOpen.value;
    };

    const setIsHovered = (value) => {
        isHovered.value = value;
    };

    const setActiveItem = (item) => {
        activeItem.value = item;
    };

    const toggleSubmenu = (item) => {
        openSubmenu.value = openSubmenu.value === item ? null : item;
    };

    return {
        isExpanded: computed(() => (isMobile.value ? false : isExpanded.value)),
        isMobileOpen,
        isHovered,
        activeItem,
        openSubmenu,
        toggleSidebar,
        toggleMobileSidebar,
        setIsHovered,
        setActiveItem,
        toggleSubmenu,
    };
}
