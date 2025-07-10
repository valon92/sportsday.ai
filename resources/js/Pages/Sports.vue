<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref, computed } from 'vue';

// Reactive state for Men/Women selection
const selectedGender = ref('men'); // Default 'men'

// Function to change gender
const selectGender = (gender) => {
  selectedGender.value = gender;
  console.log(`Selected gender: ${selectedGender.value}`);
};

// Static data for example sports (will be replaced by backend data later)
const sports = [
  {
    id: 1,
    name: 'FOOTBALL',
    athlete_image: 'https://via.placeholder.com/200x150/007bff/ffffff?text=Football_Player',
    athlete_name: 'Lionel Messi',
    medal_name: 'Ballon d\'Or 2024',
    likes: 12345,
    comments: 567,
    gender: 'men'
  },
  {
    id: 2,
    name: 'BASKETBALL',
    athlete_image: 'https://via.placeholder.com/200x150/28a745/ffffff?text=Basketball_Player',
    athlete_name: 'LeBron James',
    medal_name: 'NBA MVP 2024',
    likes: 9876,
    comments: 321,
    gender: 'men'
  },
  {
    id: 3,
    name: 'TENNIS',
    athlete_image: 'https://via.placeholder.com/200x150/dc3545/ffffff?text=Tennis_Female',
    athlete_name: 'Iga Świątek',
    medal_name: 'French Open 2024',
    likes: 7654,
    comments: 189,
    gender: 'women'
  },
  {
    id: 4,
    name: 'ATHLETICS',
    athlete_image: 'https://via.placeholder.com/200x150/ffc107/333333?text=Athlete_Female',
    athlete_name: 'Sha\'Carri Richardson',
    medal_name: 'World Champion 100m 2024',
    likes: 8901,
    comments: 250,
    gender: 'women'
  },
   {
    id: 5,
    name: 'VOLLEYBALL',
    athlete_image: 'https://via.placeholder.com/200x150/6c757d/ffffff?text=Volleyball_Player',
    athlete_name: 'Wilfredo León',
    medal_name: 'CEV Champions League MVP',
    likes: 4500,
    comments: 120,
    gender: 'men'
  },
  {
    id: 6,
    name: 'SWIMMING',
    athlete_image: 'https://via.placeholder.com/200x150/17a2b8/ffffff?text=Swimmer_Male',
    athlete_name: 'Caeleb Dressel',
    medal_name: 'Olympic Gold 2024',
    likes: 6000,
    comments: 200,
    gender: 'men'
  },
    {
    id: 7,
    name: 'GYMNASTICS',
    athlete_image: 'https://via.placeholder.com/200x150/fd7e14/ffffff?text=Gymnast_Female',
    athlete_name: 'Simone Biles',
    medal_name: 'World Championship Gold 2024',
    likes: 15000,
    comments: 800,
    gender: 'women'
  },
  {
    id: 8,
    name: 'BOXING',
    athlete_image: 'https://via.placeholder.com/200x150/6f42c1/ffffff?text=Boxer_Male',
    athlete_name: 'Tyson Fury',
    medal_name: 'Heavyweight Champion',
    likes: 7000,
    comments: 300,
    gender: 'men'
  },
];

// Calculate filtered sports based on selected gender
const filteredSports = computed(() => {
  return sports.filter(sport => sport.gender === selectedGender.value);
});

// Function to handle like action
const handleLike = (sportId) => {
  console.log(`User liked sport ID: ${sportId}`);
  // Logic to send like to backend via API
  // You might want to temporarily update the UI here and then confirm with server response
};

// Function to handle comment action
const handleComment = (sportId) => {
  console.log(`User commented on sport ID: ${sportId}`);
  // Logic to open a comment modal or navigate to comment section
};

// Function to handle share action
const handleShare = (sportId) => {
  console.log(`User shared sport ID: ${sportId}`);
  // Logic to trigger a share dialog (e.g., to social media)
};

// Function to navigate to sport details page
const viewSportDetails = (sportId) => {
  console.log(`Navigating to details for Sport ID: ${sportId}`);
  // When connected to backend: router.visit(`/sports/${sportId}`);
};
</script>

<template>
  <MainLayout>
    <div class="container py-5">
      <h1 class="display-5 fw-bold text-dark mb-4">Sports Categories</h1>

      <div class="d-flex justify-content-center mb-5">
        <button
          class="btn me-3"
          :class="{'btn-primary': selectedGender === 'men', 'btn-outline-primary': selectedGender !== 'men'}"
          @click="selectGender('men')"
        >
          Men
        </button>
        <button
          class="btn"
          :class="{'btn-primary': selectedGender === 'women', 'btn-outline-primary': selectedGender !== 'women'}"
          @click="selectGender('women')"
        >
          Women
        </button>
      </div>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <div class="col" v-for="sport in filteredSports" :key="sport.id">
          <div class="card h-100 shadow-sm clickable-card">
            <div @click="viewSportDetails(sport.id)" class="card-content-clickable">
              <img :src="sport.athlete_image" class="card-img-top" :alt="sport.name + ' Athlete'">
              <div class="card-body pb-0">
                <h5 class="card-title text-uppercase mb-2 fw-bold">{{ sport.name }}</h5>
                <p class="card-text text-muted mb-3">
                  <i class="fas fa-medal me-1 text-warning"></i> {{ sport.athlete_name }} - {{ sport.medal_name }}
                </p>
              </div>
            </div>

            <div class="card-footer d-flex justify-content-around align-items-center bg-transparent border-top pt-3">
              <button class="btn btn-sm  d-flex align-items-center interaction-btn" @click.stop="handleLike(sport.id)">
                <i class="far fa-heart me-1"></i> {{ sport.likes }}
              </button>
              <button class="btn btn-sm  d-flex align-items-center interaction-btn" @click.stop="handleComment(sport.id)">
                <i class="far fa-comment me-1"></i> {{ sport.comments }}
              </button>
              <button class="btn btn-sm  d-flex align-items-center interaction-btn" @click.stop="handleShare(sport.id)">
                <i class="fas fa-share-alt me-1"></i> Share
              </button>
            </div>
          </div>
        </div>
        <div v-if="filteredSports.length === 0" class="col-12 text-center text-muted">
          No sports available for this category yet.
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<style scoped>
/* Styles for clickable cards */
.clickable-card {
  cursor: pointer;
  transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
  display: flex;
  flex-direction: column;
}

.clickable-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.card-content-clickable {
  flex-grow: 1;
  display: flex;
  flex-direction: column;
}

.card-img-top {
  width: 100%;
  height: 150px;
  object-fit: cover;
}

.card-body {
  padding: 1.25rem;
}

.card-title {
  margin-bottom: 0.5rem;
}

.card-text {
  font-size: 0.9rem;
}

.card-footer {
  padding: 0.75rem 1.25rem;
  background-color: transparent;
  border-top: 1px solid rgba(0, 0, 0, 0.125);
  margin-top: auto;
}

/* Specific styles for interaction buttons (Like, Comment, Share) */
.interaction-btn {
  font-size: 0.9rem; /* Pak më i madh për lexueshmëri */
  padding: 0.5rem 0.75rem; /* Padding më i mirë */
  border-radius: 0.4rem; /* Kënde pak më të rrumbullakëta */
  transition: all 0.2s ease-in-out; /* Animacion më i mirë */
}

.interaction-btn:hover {
  background-color: var(--bs-primary); /* Ngjyra primare në hover */
  color: white !important; /* Teksti i bardhë në hover */
  transform: translateY(-2px); /* Efekt i vogël ngritjeje */
  box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
}

.interaction-btn i {
  margin-right: 0.3rem; /* Hapësirë mes ikone dhe tekstit */
}
</style>