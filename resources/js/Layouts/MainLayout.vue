<template>
  <div class="d-flex flex-column min-vh-100">
    <Navbar />

    <main class="container flex-grow-1 py-4">
      <slot />
    </main>

    <Footer />
  </div>
</template>

<script setup>
// Importoni komponentët Navbar dhe Footer
import Navbar from '@/Components/Navbar.vue';
import Footer from '@/Components/Footer.vue';
</script>

<style scoped>
/* Çdo stil specifik për MainLayout, por që nuk i përket Navbar-it apo Footer-it */
</style>