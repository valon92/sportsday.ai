<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'; // Sigurohuni që Layout-i kryesor është importuar
import { Head } from '@inertiajs/vue3';
import EventsSection from '@/Components/EventsSection.vue';
// Mund të shtohen props ose funksionalitet shtesë këtu në të ardhmen
</script>

<template>


  <MainLayout>
   

    

     <section class="py-5 bg-light text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Welcome to Sportsday.ai!</h1>
            <p class="lead">Your ultimate source for sports news, results, and events.</p>
        </div>
    </section>

    <EventsSection />


   






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