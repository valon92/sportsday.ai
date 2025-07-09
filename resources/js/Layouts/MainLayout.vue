<template>
  <div class="d-flex flex-column min-vh-100"> <header class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="/">sportsday.com</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/reels">Reels</a>
            </li>
            </ul>
        </div>
      </div>
    </header>

    <main class="container flex-grow-1 py-4"> <slot />
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-auto"> <div class="container">
        <p>&copy; {{ new Date().getFullYear() }} sportsday.com. All rights reserved.</p>
      </div>
    </footer>
  </div>
</template>

<script setup>
// Mund te keni nevoje te importoni diçka këtu nëse keni komponenete te tjera ne këtë Layout
</script>