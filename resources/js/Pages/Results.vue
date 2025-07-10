<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref, computed, onMounted } from 'vue'; // Import onMounted

// Reactive state for selected sport filter
const selectedSportFilter = ref('All'); // Default filter

// Reactive state for selected date (simplified for frontend mockup)
const selectedDate = ref(new Date().toISOString().slice(0, 10)); // Default to today's date

// *** Dynamic Sport Types (Placeholder for Backend Fetch) ***
const sportTypes = ref([]); // Initialize as an empty reactive array

// Sample static results data (will come from backend later)
const allResults = ref([
  {
    id: 1,
    sport: 'Football',
    team1: 'Team A',
    team2: 'Team B',
    score1: 2,
    score2: 1,
    status: 'Finished',
    time: '19:00',
    date: '2025-07-09',
    likes: 150,
    comments: 25,
    shares: 10,
  },
  {
    id: 2,
    sport: 'Basketball',
    team1: 'Team X',
    team2: 'Team Y',
    score1: 98,
    score2: 99,
    status: 'Live',
    time: '20:30',
    date: '2025-07-10',
    likes: 300,
    comments: 50,
    shares: 15,
  },
  {
    id: 3,
    sport: 'Tennis',
    team1: 'Player 1',
    team2: 'Player 2',
    score1: '6-4, 6-3',
    score2: '',
    status: 'Finished',
    time: '14:00',
    date: '2025-07-09',
    likes: 80,
    comments: 10,
    shares: 5,
  },
  {
    id: 4,
    sport: 'Football',
    team1: 'Team C',
    team2: 'Team D',
    score1: 0,
    score2: 0,
    status: 'Upcoming',
    time: '21:00',
    date: '2025-07-10',
    likes: 50,
    comments: 5,
    shares: 2,
  },
  {
    id: 5,
    sport: 'Volleyball',
    team1: 'Team M',
    team2: 'Team N',
    score1: '3-1',
    score2: '',
    status: 'Finished',
    time: '17:00',
    date: '2025-07-10',
    likes: 120,
    comments: 20,
    shares: 8,
  },
  {
    id: 6,
    sport: 'Basketball',
    team1: 'Team P',
    team2: 'Team Q',
    score1: 0,
    score2: 0,
    status: 'Upcoming',
    time: '18:00',
    date: '2025-07-11',
    likes: 30,
    comments: 3,
    shares: 1,
  },
]);

// Filtered results based on selected sport and date
const filteredResults = computed(() => {
  let results = allResults.value;

  // Filter by sport type
  if (selectedSportFilter.value !== 'All') {
    results = results.filter(result => result.sport === selectedSportFilter.value);
  }

  // Filter by date
  results = results.filter(result => result.date === selectedDate.value);

  // Sort by status (Live first, then Upcoming, then Finished)
  results.sort((a, b) => {
    const statusOrder = { 'Live': 1, 'Upcoming': 2, 'Finished': 3 };
    return statusOrder[a.status] - statusOrder[b.status];
  });

  return results;
});

// Function to handle sport filter change
const filterBySport = (sport) => {
  selectedSportFilter.value = sport;
  console.log(`Filtering by sport: ${selectedSportFilter.value}`);
};

// Function to handle date change
const changeDate = (event) => {
  selectedDate.value = event.target.value;
  console.log(`Filtering by date: ${selectedDate.value}`);
};

// Interaction functions (placeholders)
const handleLike = (resultId) => {
  console.log(`User liked result ID: ${resultId}`);
  // Logic to send like to backend via API
};

const handleComment = (resultId) => {
  console.log(`User commented on result ID: ${resultId}`);
  // Logic to open a comment modal or navigate to comment section
};

const handleShare = (resultId) => {
  console.log(`User shared result ID: ${resultId}`);
  // Logic to trigger a share dialog
};

// Function to view result details (if card is clicked)
const viewResultDetails = (resultId) => {
  console.log(`Navigating to details for Result ID: ${resultId}`);
  // When connected to backend: router.visit(`/results/${resultId}`);
};

// --- Lifecycle hook to simulate fetching sport types on component mount ---
onMounted(() => {
  // In a real application, you would make an API call here:
  // fetch('/api/sports/types')
  //   .then(response => response.json())
  //   .then(data => {
  //     sportTypes.value = ['All', ...data.uniqueSportNames]; // Prepend 'All'
  //   })
  //   .catch(error => console.error('Error fetching sport types:', error));

  // For now, we'll manually populate it to show the filter works:
  // Dynamically extract unique sports from current dummy data for demonstration
  const uniqueSports = [...new Set(allResults.value.map(result => result.sport))];
  sportTypes.value = ['All', ...uniqueSports.sort()]; // Add 'All' and sort alphabetically
});
</script>

<template>
  <MainLayout>
    <div class="container py-5">
      <h1 class="display-5 fw-bold text-dark mb-4">Live Scores & Results</h1>

      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <div class="btn-group mb-3 mb-md-0" role="group" aria-label="Sport filters">
          <button
            v-for="sport in sportTypes"
            :key="sport"
            type="button"
            class="btn"
            :class="{'btn-primary': selectedSportFilter === sport, 'btn-outline-primary': selectedSportFilter !== sport}"
            @click="filterBySport(sport)"
          >
            {{ sport }}
          </button>
        </div>

        <div class="input-group w-auto">
          <label for="resultDate" class="input-group-text">Date:</label>
          <input type="date" id="resultDate" class="form-control" :value="selectedDate" @change="changeDate">
        </div>
      </div>

      <div class="row row-cols-1 g-4">
        <div class="col" v-for="result in filteredResults" :key="result.id">
          <div class="card h-100 shadow-sm result-card">
            <div class="card-body p-3 d-flex flex-column">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="card-title mb-0 text-uppercase fw-bold">{{ result.sport }}</h5>
                <span :class="{
                  'badge bg-success': result.status === 'Live',
                  'badge bg-primary': result.status === 'Upcoming',
                  'badge bg-secondary': result.status === 'Finished'
                }">
                  {{ result.status }}
                </span>
              </div>
              <p class="text-muted small mb-3">{{ result.date }} - {{ result.time }}</p>

              <div class="flex-grow-1 mb-3 match-details-clickable" @click="viewResultDetails(result.id)">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h6 class="mb-0">{{ result.team1 }}</h6>
                  <span class="fs-5 fw-bold">{{ result.score1 }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <h6 class="mb-0">{{ result.team2 }}</h6>
                  <span class="fs-5 fw-bold">{{ result.score2 }}</span>
                </div>
              </div>

              <div class="card-footer bg-transparent border-top pt-3 d-flex justify-content-around align-items-center">
                <button class="btn btn-sm d-flex align-items-center interaction-btn" @click.stop="handleLike(result.id)">
                  <i class="far fa-heart me-1"></i> {{ result.likes }}
                </button>
                <button class="btn btn-sm  d-flex align-items-center interaction-btn" @click.stop="handleComment(result.id)">
                  <i class="far fa-comment me-1"></i> {{ result.comments }}
                </button>
                <button class="btn btn-sm  d-flex align-items-center interaction-btn" @click.stop="handleShare(result.id)">
                  <i class="fas fa-share-alt me-1"></i> Share
                </button>
              </div>
            </div>
          </div>
        </div>
        <div v-if="filteredResults.length === 0" class="col-12 text-center text-muted">
          No results found for the selected filters.
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<style scoped>
.result-card {
  transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
  cursor: pointer;
}

.result-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 0.4rem 0.8rem rgba(0, 0, 0, 0.1) !important;
}

.match-details-clickable {
  flex-grow: 1;
  cursor: pointer;
}

.match-details-clickable h6 {
    font-size: 1.1rem;
}

.card-footer {
  padding: 0.75rem 1.25rem;
  background-color: transparent;
  border-top: 1px solid rgba(0, 0, 0, 0.125);
  margin-top: auto;
}

.interaction-btn {
  font-size: 0.9rem;
  padding: 0.5rem 0.75rem;
  border-radius: 0.4rem;
  transition: all 0.2s ease-in-out;
}

.interaction-btn:hover {
  background-color: var(--bs-primary);
  color: white !important;
  transform: translateY(-2px);
  box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
}

.interaction-btn i {
  margin-right: 0.3rem;
}

.input-group-text {
  background-color: var(--bs-light);
  border-right: 0;
}
.form-control[type="date"] {
  border-left: 0;
}
</style>