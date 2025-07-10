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


   <!-- 9. Winter Special Olympics -->
<section class="bg-dark text-white py-5" style="background-image: url('/images/winter-special-olympics-2026.jpg'); background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="background-color: rgba(0,0,0,0.6); border-radius: 1rem;">
        <h2 class="display-5 fw-bold mb-3">Winter Special Olympics</h2>
        <p class="lead mb-3">March 6 – 15 · Global Locations</p>
        <p class="mb-4">Celebrating athletes with intellectual disabilities through inclusive, inspiring, and competitive winter sports.</p>
        <a href="https://www.turin2025.org/en" class="btn btn-light btn-lg px-4">Learn More</a>
    </div>
</section>

<!-- 10. The Masters Golf Tournament -->
<section class="bg-dark text-white py-5" style="background-image: url('/images/masters-golf-2026.jpg'); background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="background-color: rgba(0,0,0,0.6); border-radius: 1rem;">
        <h2 class="display-5 fw-bold mb-3">The Masters 2026</h2>
        <p class="lead mb-3">April 9 – 12 · Augusta National, USA</p>
        <p class="mb-4">Golf's most prestigious tournament welcomes the world’s best to the hallowed greens of Augusta.</p>
        <a href="{{ route('events.masters') }}" class="btn btn-success btn-lg px-4">Tournament Info</a>
    </div>
</section>

<!-- 11. Grand National Horse Race -->
<section class="bg-dark text-white py-5" style="background-image: url('/images/grand-national-2026.jpg'); background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="background-color: rgba(0,0,0,0.6); border-radius: 1rem;">
        <h2 class="display-5 fw-bold mb-3">Grand National 2026</h2>
        <p class="lead mb-3">April 11 · Aintree Racecourse, England</p>
        <p class="mb-4">A British sporting tradition, the Grand National is the most iconic steeplechase horse race in the world.</p>
        <a href="{{ route('events.grand-national') }}" class="btn btn-warning btn-lg px-4">Event Details</a>
    </div>
</section>

<!-- 12. World Snooker Championship -->
<section class="bg-dark text-white py-5" style="background-image: url('/images/world-snooker-championship-2026.jpg'); background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="background-color: rgba(0,0,0,0.6); border-radius: 1rem;">
        <h2 class="display-5 fw-bold mb-3">World Snooker Championship 2026</h2>
        <p class="lead mb-3">April 18 – May 4 · Sheffield, England</p>
        <p class="mb-4">Snooker's biggest title returns to the Crucible Theatre, featuring elite players battling for glory.</p>
        <a href="{{ route('events.snooker') }}" class="btn btn-secondary btn-lg px-4">Championship Info</a>
    </div>
</section>

<!-- 13. Boston & London Marathons -->
<section class="bg-dark text-white py-5" style="background-image: url('/images/boston-london-marathons-2026.jpg'); background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="background-color: rgba(0,0,0,0.6); border-radius: 1rem;">
        <h2 class="display-5 fw-bold mb-3">Boston & London Marathons 2026</h2>
        <p class="lead mb-3">April 20 & 26 · Boston, USA & London, UK</p>
        <p class="mb-4">Two of the world’s most prestigious marathons take center stage with thousands of runners and millions of viewers.</p>
        <a href="{{ route('events.world-marathons') }}" class="btn btn-primary btn-lg px-4">View Races</a>
    </div>
</section>

<!-- Keep previous content -->
<!-- 4. South Asian Games -->
<section class="bg-dark text-white py-5" style="background-image: url('/images/south-asian-games-2026.jpg'); background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="background-color: rgba(0,0,0,0.6); border-radius: 1rem;">
        <h2 class="display-5 fw-bold mb-3">South Asian Games 2026</h2>
        <p class="lead mb-3">January 23 – 31 · Lahore, Pakistan</p>
        <p class="mb-4">South Asia's largest multi-sport event brings together the region's finest athletes for a week of passion and pride.</p>
        <a href="{{ route('events.south-asian-games') }}" class="btn btn-warning btn-lg px-4">Event Info</a>
    </div>
</section>

<!-- 5. Commonwealth Winter Paralympics -->
<section class="bg-dark text-white py-5" style="background-image: url('/images/commonwealth-winter-paralympics-2026.jpg'); background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="background-color: rgba(0,0,0,0.6); border-radius: 1rem;">
        <h2 class="display-5 fw-bold mb-3">Commonwealth Winter Paralympics</h2>
        <p class="lead mb-3">February 6 – 15 · Milan & Cortina d’Ampezzo, Italy</p>
        <p class="mb-4">A celebration of strength, determination, and inclusion through winter sports in the Italian Alps.</p>
        <a href="{{ route('events.commonwealth-paralympics') }}" class="btn btn-outline-light btn-lg px-4">View Details</a>
    </div>
</section>

<!-- 6. Super Bowl LX -->
<section class="bg-dark text-white py-5" style="background-image: url('/images/super-bowl-lx-2026.jpg'); background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="background-color: rgba(0,0,0,0.6); border-radius: 1rem;">
        <h2 class="display-5 fw-bold mb-3">Super Bowl LX</h2>
        <p class="lead mb-3">February 8 · Levi's Stadium, Santa Clara, USA</p>
        <p class="mb-4">The most-watched sporting event in America returns for another legendary showdown on the gridiron.</p>
        <a href="{{ route('events.super-bowl') }}" class="btn btn-danger btn-lg px-4">Watch Now</a>
    </div>
</section>

<!-- 7. ICC Men’s T20 World Cup -->
<section class="bg-dark text-white py-5" style="background-image: url('/images/icc-t20-world-cup-2026.jpg'); background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="background-color: rgba(0,0,0,0.6); border-radius: 1rem;">
        <h2 class="display-5 fw-bold mb-3">ICC Men’s T20 World Cup 2026</h2>
        <p class="lead mb-3">February 10 – March 8 · India & Sri Lanka</p>
        <p class="mb-4">Explosive cricket action as the world’s top nations battle for T20 supremacy in the subcontinent.</p>
        <a href="{{ route('events.t20-world-cup') }}" class="btn btn-success btn-lg px-4">Full Coverage</a>
    </div>
</section>

<!-- 8. Tokyo Marathon -->
<section class="bg-dark text-white py-5" style="background-image: url('/images/tokyo-marathon-2026.jpg'); background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="background-color: rgba(0,0,0,0.6); border-radius: 1rem;">
        <h2 class="display-5 fw-bold mb-3">Tokyo Marathon 2026</h2>
        <p class="lead mb-3">March 1 · Tokyo, Japan</p>
        <p class="mb-4">Join thousands of runners on a scenic and spirited journey through one of the world's most iconic cities.</p>
        <a href="{{ route('events.tokyo-marathon') }}" class="btn btn-info btn-lg px-4">Race Info</a>
    </div>
</section>








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