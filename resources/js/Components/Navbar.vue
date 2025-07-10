<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand me-4" href="/">Sportsday</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbarCollapse" aria-controls="mainNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNavbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/sports">
              <span class="d-none d-lg-inline"><i class="fas fa-baseball-ball me-1"></i></span>
              <span class="d-lg-none">Sports</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/reels">
              <span class="d-none d-lg-inline"><i class="fas fa-video me-1"></i></span>
              <span class="d-lg-none">Reels</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/results">
              <span class="d-none d-lg-inline"><i class="fas fa-trophy me-1"></i></span>
              <span class="d-lg-none">Results</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/news">
              <span class="d-none d-lg-inline"><i class="fas fa-newspaper me-1"></i></span>
              <span class="d-lg-none">News</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/teams">
              <span class="d-none d-lg-inline"><i class="fas fa-users me-1"></i></span>
              <span class="d-lg-none">Teams</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/players">
              <span class="d-none d-lg-inline"><i class="fas fa-user-circle me-1"></i></span>
              <span class="d-lg-none">Players</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/transfer">
              <span class="d-none d-lg-inline"><i class="fas fa-exchange-alt me-1"></i></span>
              <span class="d-lg-none">Transfer</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/calendar">
              <span class="d-none d-lg-inline"><i class="fas fa-calendar-alt me-1"></i></span>
              <span class="d-lg-none">Calendar</span>
            </a>
          </li>

          <li class="nav-item ms-lg-3">
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            </form>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item me-2">
            <a class="btn btn-outline-light"  href="/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary" href="/register">Register</a>
          </li>

          <li class="nav-item dropdown ms-lg-3">
            <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="d-none d-lg-inline"><i class="fas fa-ellipsis-h"></i></span>
              <span class="d-lg-none">More</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreDropdown">
              <li><h6 class="dropdown-header">Profile & Settings</h6></li>
              <li><a class="dropdown-item" href="/settings">Settings</a></li>
              <li><a class="dropdown-item" href="/privacy">Privacy</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><h6 class="dropdown-header">Communication</h6></li>
              <li><a class="dropdown-item" href="/notifications">Notifications</a></li>
              <li><a class="dropdown-item" href="/vibration">Vibration</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/help">Help</a></li>
              <li><a class="dropdown-item" href="/tell-a-friend">Tell a Friend</a></li>
              <li><a class="dropdown-item" href="/contact-us">Contact Us</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script setup>
// No specific script for Navbar for now
</script>

<style scoped>
/* Stilet shtesë për të rregulluar hapësirën dhe pamjen e ikonave/tekstit */
.navbar-nav .nav-link {
  display: flex;
  align-items: center;
  justify-content: center; /* Center the icon/text for responsiveness */
  padding-left: 0.75rem; /* Some padding around icons */
  padding-right: 0.75rem;
}

@media (min-width: 992px) { /* Bootstrap's 'lg' breakpoint */
  .navbar-nav .nav-link span.d-lg-none {
    display: none !important; /* Hide text on large screens */
  }
  .navbar-nav .nav-link span.d-none.d-lg-inline {
    display: inline !important; /* Show icon on large screens */
  }
}

@media (max-width: 991.98px) { /* Below 'lg' breakpoint */
  .navbar-nav .nav-link {
    justify-content: flex-start; /* Align left on small screens */
  }
  .navbar-nav .nav-link span.d-lg-none {
    display: inline !important; /* Show text on small screens */
  }
  .navbar-nav .nav-link span.d-none.d-lg-inline {
    display: none !important; /* Hide icon on small screens */
  }
}
</style>