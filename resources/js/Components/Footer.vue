<script setup>
// No specific script logic needed for now, as the footer is primarily static.
// If we were to add functionalities like a newsletter signup,
// we would add that logic here.
</script>

<template>
  <footer class="bg-dark text-white pt-5 pb-4">
    <div class="container text-center text-md-left">
      <div class="row text-center text-md-left">

        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold text-primary">Sportsday.ai</h5>
          <p>
            Your premier platform for all things sports. 
            From live scores to the latest news and best reels, 
            we keep you connected to the world of sports.
          </p>
        </div>

        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold text-primary">Categories</h5>
          <p><a href="/sports" class="text-white" style="text-decoration: none;">Sports</a></p>
          <p><a href="/reels" class="text-white" style="text-decoration: none;">Reels</a></p>
          <p><a href="/results" class="text-white" style="text-decoration: none;">Results</a></p>
          <p><a href="/news" class="text-white" style="text-decoration: none;">News</a></p>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold text-primary">Useful Links</h5>
          <p><a href="/profile" class="text-white" style="text-decoration: none;">Profile</a></p>
          <p><a href="/settings" class="text-white" style="text-decoration: none;">Settings</a></p>
          <p><a href="/help" class="text-white" style="text-decoration: none;">Help</a></p>
          <p><a href="/privacy" class="text-white" style="text-decoration: none;">Privacy Policy</a></p>
        </div>

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold text-primary">Contact</h5>
          <p><i class="fas fa-home me-3"></i> Pristina, Kosovo</p>
          <p><i class="fas fa-envelope me-3"></i> info@sportsday.ai</p>
          <p><i class="fas fa-phone me-3"></i> +383 4X XXX XXX</p>
          <p><i class="fas fa-print me-3"></i> +383 4X XXX XXX</p>
        </div>

      </div>

      <hr class="mb-4">

      <div class="row align-items-center">
        <div class="col-md-7 col-lg-8">
          <p class="text-center text-md-left">
            © 2025 Copyright: 
            <a href="#" style="text-decoration: none;">
              <strong class="text-primary">Sportsday.ai</strong>
            </a>
          </p>
        </div>

        <div class="col-md-5 col-lg-4">
          <div class="text-center text-md-right">
            <ul class="list-unstyled list-inline">
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-facebook"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-google-plus"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-linkedin-in"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-youtube"></i></a>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </footer>
</template>

<style scoped>
/* Additional specific styles for the footer if needed */
/* You can set styles for font-size, colors, etc. here */
.text-primary {
  color: #007bff !important; /* Bootstrap's primary color, you can change it according to your brand */
}

/* Margin for icons in contact section */
.fa-home, .fa-envelope, .fa-phone, .fa-print {
    margin-right: 0.5rem;
}

/* Social links - to center them vertically with text */
.list-inline-item {
  display: inline-block;
  margin-right: 15px; /* Space between social icons */
}

/* Responsive adjustments for small screens */
@media (max-width: 767.98px) { /* Small devices (landscape phones, 768px and up) */
  .text-md-left, .text-md-right {
    text-align: center !important; /* Centers text and buttons on mobile */
  }
}
</style>