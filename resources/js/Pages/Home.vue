<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import EventsSection from '@/Components/EventsSection.vue';
</script>

<template>
  <div> <Head title="Home" />

    <MainLayout>
      <!-- <section class="py-5 bg-light text-center">
          <div class="">
              <h1 class="display-4 fw-bold mb-3">Welcome to Sportsday.ai!</h1>
              <p class="lead">Your ultimate source for sports news, results, and events.</p>
          </div>
      </section> -->

      <div class=" py-1">
        <div class="row">
          <aside class="col-12 col-md-2 d-none d-lg-block sidebar-sticky">
            <div class="p-3 bg-white  rounded-lg h-100 sidebar-content">
              <h5 class="fw-bold mb-3">Filter/Categories</h5>
              <ul class="list-unstyled">
                <li><a href="#" class="text-decoration-none text-dark d-block py-1">All Sports</a></li>
                <li><a href="#" class="text-decoration-none text-dark d-block py-1">Football</a></li>
                <li><a href="#" class="text-decoration-none text-dark d-block py-1">Basketball</a></li>
                <li><a href="#" class="text-decoration-none text-dark d-block py-1">Tennis</a></li>
                <li><a href="#" class="text-decoration-none text-dark d-block py-1">More...</a></li>
              </ul>
            </div>
          </aside>

          <main class="col-12 col-md-8">
            <EventsSection />
          </main>

          <aside class="col-12 col-md-2 d-none d-md-block sidebar-sticky">
            <div class="p-3 bg-white  rounded-lg h-100 sidebar-content">
              <h5 class="fw-bold mb-3">Top News</h5>
              <ul class="list-unstyled">
                <li><a href="#" class="text-decoration-none text-dark d-block py-1">Team A wins Cup!</a></li>
                <li><a href="#" class="text-decoration-none text-dark d-block py-1">Player B injured</a></li>
                <li><a href="#" class="text-decoration-none text-dark d-block py-1">Next Big Event</a></li>
              </ul>
              <hr>
              <h5 class="fw-bold mb-3">Advertisements</h5>
              <div class="text-center">
                  <img src="https://via.placeholder.com/150x250?text=Ad+Space" alt="Ad" class="img-fluid rounded mb-2">
                  <img src="https://via.placeholder.com/150x150?text=Ad+Space+2" alt="Ad 2" class="img-fluid rounded">
              </div>
            </div>
          </aside>
        </div>
      </div>
    </MainLayout>
  </div> </template>

<style scoped>
.sidebar-sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 6rem;
  height: calc(100vh - 6rem);
  overflow-y: auto;
  padding-bottom: 1rem;
}

.sidebar-content {
    min-height: 100%;
}

@media (max-width: 767.98px) {
  .container.py-4 {
    padding-top: 2rem !important;
    padding-bottom: 2rem !important;
  }
  .col-12:not(.d-md-block) {
    margin-top: 1.5rem !important;
  }
  .col-12:not(.d-md-block):first-child {
      margin-top: 0 !important;
  }
}
</style>