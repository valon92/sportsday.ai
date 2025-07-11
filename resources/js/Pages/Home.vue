<template>
  <Head title="Home" />

  <MainLayout>
    <section class="py-5 bg-light text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Welcome to Sportsday.ai!</h1>
            <p class="lead">Your ultimate source for sports news, results, and events.</p>
        </div>
    </section>

    <div class=" py-4">
      <div class="row">
        <aside class="col-12 col-md-2 d-none d-md-block sidebar-sticky">
          <div class="p-3 bg-white shadow-sm rounded-lg h-100 sidebar-content">
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
          <div class="p-3 bg-white shadow-sm rounded-lg h-100 sidebar-content">
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
</template>


<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'; // Or AuthenticatedLayout.vue
import { Head } from '@inertiajs/vue3';
import EventsSection from '@/Components/EventsSection.vue'; // Import our EventsSection component

// Define props if your Home.vue receives any from the Laravel backend
// defineProps({
//   welcomeMessage: String,
// });
</script>

<style scoped>
/* Ensure sidebars adapt well on smaller screens */
/* On small screens (xs, sm), columns will stack vertically due to col-12 */
/* On medium screens (md) and up, they will arrange horizontally (2-8-2) */

/* Sticky sidebar styles */
.sidebar-sticky {
  position: -webkit-sticky; /* For Safari */
  position: sticky;
  top: 6rem; /* Adjust this value to set how far from the top the sidebar should stick.
               6rem is a good starting point if you have a fixed navbar. */
  height: calc(100vh - 6rem); /* Adjust height to fill remaining viewport, minus top offset */
  overflow-y: auto; /* Enable scrolling for sidebar content if it overflows */
  padding-bottom: 1rem; /* Add some padding at the bottom for aesthetic */
}

.sidebar-content {
    /* Ensures background and shadow are applied correctly to the content itself */
    min-height: 100%; /* Make sure content div inside sticky takes full height */
}

/* Hide on small screens and show on medium and up */
/* d-none hides it by default, d-md-block makes it block on medium and up */
/* These classes are applied directly in the template: d-none d-md-block */

/* Adjust padding/margins for better spacing on mobile */
@media (max-width: 767.98px) {
  .container.py-4 {
    padding-top: 2rem !important;
    padding-bottom: 2rem !important;
  }
  /* Remove specific margin-top for stacked columns on mobile as they are now hidden */
  .col-12:not(.d-md-block) { /* Target only columns that are NOT hidden on mobile */
    margin-top: 1.5rem !important;
  }
  .col-12:not(.d-md-block):first-child {
      margin-top: 0 !important; /* No top margin for the very first visible column on mobile */
  }
}
</style>