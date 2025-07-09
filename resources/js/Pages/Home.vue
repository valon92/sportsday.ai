<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'; // Sigurohuni që Layout-i kryesor është importuar

// Mund të shtohen props ose funksionalitet shtesë këtu në të ardhmen
</script>

<template>
  <MainLayout>
    <div class="text-center py-5 bg-light"> <h1 class="display-4 fw-bold text-dark mb-4">Welcome to Sportsday!</h1>
      <p class="lead text-secondary mb-5">
        Your ultimate platform to watch, record, and share your sports activities.
      </p>
      <div class="d-grid gap-2 col-lg-6 mx-auto"> <a href="/login" class="btn btn-primary btn-lg">Login</a>
        <a href="/register" class="btn btn-outline-secondary btn-lg">Register</a>
      </div>
    </div>

    <div class="container my-5"> <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm"> <div class="card-body">
              <h5 class="card-title text-primary"><i class="fas fa-video me-2"></i>Watch Reels</h5>
              <p class="card-text">Explore amazing sports moments from athletes worldwide.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title text-success"><i class="fas fa-plus-circle me-2"></i>Add Your Activity</h5>
              <p class="card-text">Log your personal bests and track your progress over time.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title text-info"><i class="fas fa-share-alt me-2"></i>Share & Connect</h5>
              <p class="card-text">Share your achievements with friends and connect with the sports community.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<style scoped>
/* Këtu mund të shtohen stile specifike për Home.vue nëse nevojiten */
</style>