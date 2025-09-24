<template>
  <div class="w-full select-none">

    <!-- Hero Section -->
    <HeroSection />

    <!-- Features Section -->
    <FeaturesSection />

    <!-- Stats Section -->
    <StatsSection />

    <!-- Subjects Section -->
    <SubjectsSection />

    <!-- Testimonials Section -->
    <TestimonialsSection />

    <!-- CTA Section -->
    <CTASection />

  </div>
</template>

<script setup>
import CTASection from './Components/CTASection.vue';
import FeaturesSection from './Components/FeaturesSection.vue';
import StatsSection from './Components/StatsSection.vue';
import SubjectsSection from './Components/SubjectsSection.vue';
import TestimonialsSection from './Components/TestimonialsSection.vue';
import HeroSection from './Components/HeroSection.vue';

</script>