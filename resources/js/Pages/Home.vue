<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<template>
  <MainLayout>
    <div class="text-center py-5">
      <h1 class="display-4 fw-bold text-dark mb-4">Mirësevini në Sports Diary!</h1>
      <p class="lead text-secondary mb-5">
        Platforma juaj digjitale për të shikuar, regjistruar dhe ndarë aktivitetet sportive.
      </p>
      <div class="d-grid gap-2 col-6 mx-auto">
        <a href="/login" class="btn btn-primary btn-lg">Kyçu</a>
        <a href="/register" class="btn btn-outline-secondary btn-lg">Regjistrohu</a>
      </div>
    </div>
  </MainLayout>
</template>