<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref, computed } from 'vue';

// Sample static player data (will come from backend later)
const players = ref([
  {
    id: 1,
    name: 'Lionel Messi',
    photo: 'https://via.placeholder.com/400x250/007bff/ffffff?text=Messi',
    sport: 'Football',
    team: 'Inter Miami',
    position: 'Forward',
    likes: 850, // Represents followers
    comments: 150,
    shares: 50,
    is_followed: false,
  },
  {
    id: 2,
    name: 'LeBron James',
    photo: 'https://via.placeholder.com/400x250/28a745/ffffff?text=LeBron',
    sport: 'Basketball',
    team: 'Los Angeles Lakers',
    position: 'Small Forward',
    likes: 920,
    comments: 180,
    shares: 65,
    is_followed: true,
  },
  {
    id: 3,
    name: 'Serena Williams',
    photo: 'https://via.placeholder.com/400x250/dc3545/ffffff?text=Serena',
    sport: 'Tennis',
    team: null, // Individual sport
    position: 'Athlete',
    likes: 780,
    comments: 120,
    shares: 40,
    is_followed: false,
  },
  {
    id: 4,
    name: 'Cristiano Ronaldo',
    photo: 'https://via.placeholder.com/400x250/ffc107/333333?text=Ronaldo',
    sport: 'Football',
    team: 'Al Nassr FC',
    position: 'Forward',
    likes: 990, // Most popular for demo
    comments: 200,
    shares: 70,
    is_followed: false,
  },
  {
    id: 5,
    name: 'Simone Biles',
    photo: 'https://via.placeholder.com/400x250/17a2b8/ffffff?text=Simone',
    sport: 'Gymnastics',
    team: null,
    position: 'Gymnast',
    likes: 650,
    comments: 90,
    shares: 35,
    is_followed: false,
  },
  {
    id: 6,
    name: 'Michael Phelps',
    photo: 'https://via.placeholder.com/400x250/6f42c1/ffffff?text=Phelps',
    sport: 'Swimming',
    team: null,
    position: 'Swimmer',
    likes: 700,
    comments: 100,
    shares: 38,
    is_followed: false,
  },
]);

// Computed property to sort players by likes (representing followers) in descending order
const sortedPlayers = computed(() => {
  const playersCopy = [...players.value];
  return playersCopy.sort((a, b) => b.likes - a.likes);
});

// Interaction functions (placeholders)
const handleLike = (playerId) => {
  console.log(`User liked player ID: ${playerId}`);
  const player = players.value.find(p => p.id === playerId);
  if (player) {
    player.likes++; // Frontend-only increment for visual feedback
  }
};

const handleComment = (playerId) => {
  console.log(`User commented on player ID: ${playerId}`);
  // Logic to open a comment modal or navigate to comment section
};

const handleShare = (playerId) => {
  console.log(`User shared player ID: ${playerId}`);
  // Logic to trigger a share dialog
};

// Function to toggle follow status
const toggleFollow = (playerId) => {
  const player = players.value.find(p => p.id === playerId);
  if (player) {
    player.is_followed = !player.is_followed;
    // When following, increment likes; when unfollowing, decrement
    if (player.is_followed) {
      player.likes++;
    } else {
      player.likes--;
    }
    console.log(`User ${player.is_followed ? 'followed' : 'unfollowed'} player ID: ${playerId}`);
    // In a real app, send API request here to update follow status in backend
  }
};

// Function to view full player details
const viewPlayerDetails = (playerId) => {
  console.log(`Navigating to details for Player ID: ${playerId}`);
  // When connected to backend: router.visit(`/players/${playerId}`);
};
</script>

<template>
  <MainLayout>
    <div class="container py-5">
      <h1 class="display-5 fw-bold text-dark mb-4 text-center">Explore Our Players</h1>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <div class="col" v-for="player in sortedPlayers" :key="player.id">
          <div class="card h-100 shadow-sm player-card">
            <div class="player-card-image-header" @click="viewPlayerDetails(player.id)">
              <img :src="player.photo" class="card-img-top player-bg-img" :alt="player.name + ' photo'">
              <div class="player-info-overlay">
                <h5 class="card-title fw-bold text-white mb-1">{{ player.name }}</h5>
                <p class="card-text text-white-50 small mb-1">{{ player.sport }} <span v-if="player.team">| {{ player.team }}</span></p>
                <p class="card-text player-role text-white-75">{{ player.position }}</p>
              </div>
            </div>

            <div class="card-body p-3 d-flex flex-column justify-content-between align-items-start">
                <div class="d-flex justify-content-between w-100 align-items-center mb-3">
                    <button
                        class="btn btn-sm follow-button"
                        :class="{'btn-primary': !player.is_followed, 'btn-outline-secondary': player.is_followed}"
                        @click.stop="toggleFollow(player.id)"
                    >
                        <i :class="{'fas fa-plus': !player.is_followed, 'fas fa-check': player.is_followed}" class="me-1"></i>
                        {{ player.is_followed ? 'Following' : 'Follow' }}
                    </button>
                    <small class="text-muted fw-bold">{{ player.likes }} Followers</small>
                </div>

                <div class="d-flex w-100 justify-content-around mt-auto pt-3 border-top-secondary">
                  <button class="icon-btn" @click.stop="handleLike(player.id)">
                    <i class="far fa-heart me-1"></i> {{ player.likes }}
                  </button>
                  <button class="icon-btn" @click.stop="handleComment(player.id)">
                    <i class="far fa-comment me-1"></i> {{ player.comments }}
                  </button>
                  <button class="icon-btn" @click.stop="handleShare(player.id)">
                    <i class="fas fa-share-alt me-1"></i> Share
                  </button>
                </div>
            </div>
          </div>
        </div>
        <div v-if="sortedPlayers.length === 0" class="col-12 text-center text-muted">
          No players available at the moment.
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<style scoped>
.player-card {
  cursor: pointer;
  transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.player-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

/* Image Header with Overlay */
.player-card-image-header {
  position: relative;
  width: 100%;
  height: 180px; /* Fixed height for image area */
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  text-align: center;
  overflow: hidden;
}

.player-bg-img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Cover the entire area */
  position: absolute;
  top: 0;
  left: 0;
  filter: brightness(0.6); /* Darken the image for text readability */
  transition: filter 0.3s ease;
}

.player-card:hover .player-bg-img {
  filter: brightness(0.4); /* Darken more on hover */
}

.player-info-overlay {
  position: relative; /* Stays above the image */
  z-index: 1; /* Ensures it's on top of the image */
  padding: 1rem;
}

.player-info-overlay .card-title {
  font-size: 1.5rem; /* Larger title on image */
  margin-bottom: 0.2rem;
  text-shadow: 0 0 8px rgba(0, 0, 0, 0.7); /* Shadow for better readability */
}

.player-info-overlay .card-text {
  font-size: 0.95rem;
  text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
}

.player-info-overlay .player-role {
  font-style: italic;
  font-size: 0.85rem;
  margin-top: 0.5rem;
  text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
}

/* Card Body - Now contains only the follow button and interactions */
.card-body {
  padding: 1rem !important; /* Ensure consistent padding */
  text-align: left; /* Align follow button to start */
  display: flex;
  flex-direction: column;
}

.follow-button {
  font-weight: bold;
  border-radius: 0.4rem;
  padding: 0.4rem 1rem;
  transition: all 0.2s ease-in-out;
}

/* Styles for modern interaction buttons (consistent across pages) */
.icon-btn {
  background: none;
  border: none;
  color: #6c757d; /* Muted grey for icons */
  font-size: 1rem;
  padding: 0.5rem 0.75rem;
  cursor: pointer;
  display: flex;
  align-items: center;
  transition: color 0.2s ease-in-out, transform 0.2s ease-in-out;
}

.icon-btn:hover {
  color: var(--bs-primary); /* Primary color on hover */
  transform: translateY(-2px);
}

.icon-btn i {
  font-size: 1.2rem;
  margin-right: 0.5rem;
}

.border-top-secondary {
  border-top: 1px solid rgba(0, 0, 0, 0.1) !important;
}
</style>