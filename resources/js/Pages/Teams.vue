<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref, computed } from 'vue';

// Sample static team data (will come from backend later)
const teams = ref([
  {
    id: 1,
    name: 'Thunderbolts FC',
    logo: 'https://via.placeholder.com/400x250/007bff/ffffff?text=Thunderbolts_FC',
    sport: 'Football',
    motto: 'United by passion, driven by victory.',
    likes: 520, // This represents followers
    comments: 85,
    shares: 30,
    is_followed: false,
  },
  {
    id: 2,
    name: 'Hoop Dreamers',
    logo: 'https://via.placeholder.com/400x250/28a745/ffffff?text=Hoop_Dreamers',
    sport: 'Basketball',
    motto: 'Dunking on limits, soaring to success.',
    likes: 410,
    comments: 60,
    shares: 20,
    is_followed: true,
  },
  {
    id: 3,
    name: 'Racquet Rebels',
    logo: 'https://via.placeholder.com/400x250/dc3545/ffffff?text=Racquet_Rebels',
    sport: 'Tennis',
    motto: 'Serve, volley, conquer.',
    likes: 600, // Still the most popular for demo
    comments: 35,
    shares: 15,
    is_followed: false,
  },
  {
    id: 4,
    name: 'Velocity Vipers',
    logo: 'https://via.placeholder.com/400x250/ffc107/333333?text=Velocity_Vipers',
    sport: 'Athletics',
    motto: 'Speed, strength, spirit.',
    likes: 350,
    comments: 40,
    shares: 18,
    is_followed: false,
  },
  {
    id: 5,
    name: 'Aqua Aces',
    logo: 'https://via.placeholder.com/400x250/17a2b8/ffffff?text=Aqua_Aces',
    sport: 'Swimming',
    motto: 'Making waves, breaking records.',
    likes: 290,
    comments: 30,
    shares: 10,
    is_followed: false,
  },
  {
    id: 6,
    name: 'Volley Virtuosos',
    logo: 'https://via.placeholder.com/400x250/6f42c1/ffffff?text=Volley_Virtuosos',
    sport: 'Volleyball',
    motto: 'Spike the competition, ace the game.',
    likes: 310,
    comments: 45,
    shares: 12,
    is_followed: false,
  },
]);

// Computed property to sort teams by likes (representing followers) in descending order
const sortedTeams = computed(() => {
  const teamsCopy = [...teams.value];
  return teamsCopy.sort((a, b) => b.likes - a.likes);
});

// Interaction functions (placeholders)
const handleLike = (teamId) => {
  console.log(`User liked team ID: ${teamId}`);
  const team = teams.value.find(t => t.id === teamId);
  if (team) {
    team.likes++; // Frontend-only increment for visual feedback
  }
};

const handleComment = (teamId) => {
  console.log(`User commented on team ID: ${teamId}`);
  // Logic to open a comment modal or navigate to comment section
};

const handleShare = (teamId) => {
  console.log(`User shared team ID: ${teamId}`);
  // Logic to trigger a share dialog
};

// Function to toggle follow status
const toggleFollow = (teamId) => {
  const team = teams.value.find(t => t.id === teamId);
  if (team) {
    team.is_followed = !team.is_followed;
    // When following, increment likes; when unfollowing, decrement
    if (team.is_followed) {
      team.likes++;
    } else {
      team.likes--;
    }
    console.log(`User ${team.is_followed ? 'followed' : 'unfollowed'} team ID: ${teamId}`);
    // In a real app, send API request here to update follow status in backend
  }
};

// Function to view full team details
const viewTeamDetails = (teamId) => {
  console.log(`Navigating to details for Team ID: ${teamId}`);
  // When connected to backend: router.visit(`/teams/${teamId}`);
};
</script>

<template>
  <MainLayout>
    <div class="container py-5">
      <h1 class="display-5 fw-bold text-dark mb-4 text-center">Explore Our Teams</h1>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <div class="col" v-for="team in sortedTeams" :key="team.id">
          <div class="card h-100 shadow-sm team-card">
            <div class="team-card-image-header" @click="viewTeamDetails(team.id)">
              <img :src="team.logo" class="card-img-top team-bg-img" :alt="team.name + ' logo'">
              <div class="team-info-overlay">
                <h5 class="card-title fw-bold text-white mb-1">{{ team.name }}</h5>
                <p class="card-text text-white-50 small mb-2">{{ team.sport }}</p>
                <p class="card-text team-motto text-white-75">{{ team.motto }}</p>
              </div>
            </div>

            <div class="card-body p-3 d-flex flex-column justify-content-between align-items-start">
                <div class="d-flex justify-content-between w-100 align-items-center mb-3">
                    <button
                        class="btn btn-sm follow-button"
                        :class="{'btn-primary': !team.is_followed, 'btn-outline-secondary': team.is_followed}"
                        @click.stop="toggleFollow(team.id)"
                    >
                        <i :class="{'fas fa-plus': !team.is_followed, 'fas fa-check': team.is_followed}" class="me-1"></i>
                        {{ team.is_followed ? 'Following' : 'Follow' }}
                    </button>
                    <small class="text-muted fw-bold">{{ team.likes }} Followers</small>
                </div>

                <div class="d-flex w-100 justify-content-around mt-auto pt-3 border-top-secondary">
                  <button class="icon-btn" @click.stop="handleLike(team.id)">
                    <i class="far fa-heart me-1"></i> {{ team.likes }}
                  </button>
                  <button class="icon-btn" @click.stop="handleComment(team.id)">
                    <i class="far fa-comment me-1"></i> {{ team.comments }}
                  </button>
                  <button class="icon-btn" @click.stop="handleShare(team.id)">
                    <i class="fas fa-share-alt me-1"></i> Share
                  </button>
                </div>
            </div>
          </div>
        </div>
        <div v-if="sortedTeams.length === 0" class="col-12 text-center text-muted">
          No teams available at the moment.
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<style scoped>
.team-card {
  cursor: pointer;
  transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.team-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

/* Image Header with Overlay */
.team-card-image-header {
  position: relative;
  width: 100%;
  height: 180px;
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  text-align: center;
  overflow: hidden;
}

.team-bg-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  position: absolute;
  top: 0;
  left: 0;
  filter: brightness(0.6);
  transition: filter 0.3s ease;
}

.team-card:hover .team-bg-img {
  filter: brightness(0.4);
}

.team-info-overlay {
  position: relative;
  z-index: 1;
  padding: 1rem;
}

.team-info-overlay .card-title {
  font-size: 1.5rem;
  margin-bottom: 0.2rem;
  text-shadow: 0 0 8px rgba(0, 0, 0, 0.7);
}

.team-info-overlay .card-text {
  font-size: 0.95rem;
  text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
}

.team-info-overlay .team-motto {
  font-style: italic;
  font-size: 0.85rem;
  margin-top: 0.5rem;
  text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
}

/* Card Body */
.card-body {
  padding: 1rem !important;
  text-align: left;
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
  color: #6c757d;
  font-size: 1rem;
  padding: 0.5rem 0.75rem;
  cursor: pointer;
  display: flex;
  align-items: center;
  transition: color 0.2s ease-in-out, transform 0.2s ease-in-out;
}

.icon-btn:hover {
  color: var(--bs-primary);
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