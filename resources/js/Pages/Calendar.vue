<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref, computed } from 'vue';

// Use a ref to store the selected date, defaulting to today
// Format: YYYY-MM-DD for easier comparison
const selectedDate = ref(new Date().toISOString().slice(0, 10));

// Sample static event data (will come from backend later)
const allEvents = ref([
  {
    id: 1,
    name: 'Premier League Match: Man Utd vs Liverpool',
    sport: 'Football',
    date: '2025-07-10', // Today
    time: '20:00',
    location: 'Old Trafford',
    status: 'Upcoming',
    likes: 150, // Added likes
    comments: 30, // Added comments
    shares: 15,  // Added shares
  },
  {
    id: 2,
    name: 'NBA Finals: Warriors vs Celtics Game 7',
    sport: 'Basketball',
    date: '2025-07-10', // Today
    time: '03:00',
    location: 'Chase Center',
    status: 'Completed',
    likes: 220,
    comments: 45,
    shares: 20,
  },
  {
    id: 3,
    name: 'Wimbledon Men\'s Singles Final',
    sport: 'Tennis',
    date: '2025-07-13', // Future date
    time: '14:00',
    location: 'All England Lawn Tennis Club',
    status: 'Upcoming',
    likes: 180,
    comments: 35,
    shares: 10,
  },
  {
    id: 4,
    name: 'Formula 1: British Grand Prix Practice',
    sport: 'Motorsport',
    date: '2025-07-12', // Future date
    time: '10:00',
    location: 'Silverstone Circuit',
    status: 'Upcoming',
    likes: 90,
    comments: 15,
    shares: 5,
  },
  {
    id: 5,
    name: 'Cycling: Tour de France Stage 15',
    sport: 'Cycling',
    date: '2025-07-15', // Future date
    time: '12:30',
    location: 'French Alps',
    status: 'Upcoming',
    likes: 75,
    comments: 12,
    shares: 4,
  },
  {
    id: 6,
    name: 'Local Charity Marathon',
    sport: 'Athletics',
    date: '2025-07-11', // Tomorrow
    time: '09:00',
    location: 'City Park',
    status: 'Upcoming',
    likes: 50,
    comments: 8,
    shares: 2,
  },
]);

// Computed property to filter events based on the selected date
const filteredEvents = computed(() => {
  return allEvents.value.filter(event => event.date === selectedDate.value);
});

// Function to handle date change from the input
const handleDateChange = (event) => {
  selectedDate.value = event.target.value;
};

// Function to format date for display
const formatDateDisplay = (dateString) => {
  // Ensure dateString is a valid date for formatting
  if (!dateString) return '';
  const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
  try {
    return new Date(dateString).toLocaleDateString('en-US', options);
  } catch (error) {
    console.error("Error formatting date:", dateString, error);
    return dateString; // Fallback
  }
};

// Function to get status badge class
const getStatusBadgeClass = (status) => {
  switch (status) {
    case 'Upcoming': return 'bg-primary';
    case 'Live': return 'bg-danger';
    case 'Completed': return 'bg-success';
    default: return 'bg-secondary';
  }
};

// Interaction functions (placeholders) - Modified to accept eventId
const handleLike = (eventId) => {
  console.log(`User liked event ID: ${eventId}`);
  // In a real app, send API request here.
  const event = allEvents.value.find(e => e.id === eventId);
  if (event) {
    event.likes++; // For immediate visual feedback
  }
};

const handleComment = (eventId) => {
  console.log(`User commented on event ID: ${eventId}`);
  // Logic to open a comment modal or navigate to comment section.
};

const handleShare = (eventId) => {
  console.log(`User shared event ID: ${eventId}`);
  // Logic to trigger a share dialog.
};

</script>

<template>
  <MainLayout>
    <div class="container py-5">
      <h1 class="display-5 fw-bold text-dark mb-4 text-center">Sports Calendar</h1>

      <div class="card shadow-sm mb-4">
        <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-center">
          <label for="eventDate" class="form-label me-md-3 mb-2 mb-md-0 fw-bold text-muted">Select Date:</label>
          <input
            type="date"
            id="eventDate"
            class="form-control w-auto me-md-3"
            v-model="selectedDate"
            @change="handleDateChange"
          />
          <h4 class="mb-0 mt-3 mt-md-0 text-primary">{{ formatDateDisplay(selectedDate) }}</h4>
        </div>
      </div>

      <div class="row row-cols-1 g-3">
        <div class="col" v-if="filteredEvents.length === 0">
          <div class="alert alert-info text-center" role="alert">
            No events scheduled for {{ formatDateDisplay(selectedDate) }}. Please select another date.
          </div>
        </div>
        <div class="col" v-for="event in filteredEvents" :key="event.id">
          <div class="card h-100 shadow-sm event-card">
            <div class="card-body d-flex flex-column">
              <div class="d-flex align-items-center mb-3">
                <div class="me-3 text-center">
                  <i class="fas fa-calendar-alt fa-2x text-primary"></i>
                  <p class="mb-0 mt-1 small text-muted">{{ event.time }}</p>
                </div>
                <div class="flex-grow-1">
                  <h5 class="card-title mb-1">{{ event.name }}</h5>
                  <p class="card-text mb-1 small text-muted">
                    <i class="fas fa-futbol me-1"></i> {{ event.sport }}
                    <span v-if="event.location"> | <i class="fas fa-map-marker-alt ms-1 me-1"></i> {{ event.location }}</span>
                  </p>
                </div>
                <span class="badge ms-auto py-2 px-3 fw-bold" :class="getStatusBadgeClass(event.status)">
                  {{ event.status }}
                </span>
              </div>
            </div>

            <div class="card-footer bg-transparent pt-3 d-flex justify-content-around align-items-center">
              <button class="icon-btn" @click.stop="handleLike(event.id)">
                <i class="far fa-heart me-1"></i> {{ event.likes }}
              </button>
              <button class="icon-btn" @click.stop="handleComment(event.id)">
                <i class="far fa-comment me-1"></i> {{ event.comments }}
              </button>
              <button class="icon-btn" @click.stop="handleShare(event.id)">
                <i class="fas fa-share-alt me-1"></i> Share
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<style scoped>
.event-card {
  border-left: 5px solid var(--bs-primary);
  transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
  display: flex; /* Make it a flex container */
  flex-direction: column; /* Stack children vertically */
}

.event-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 0.4rem 0.8rem rgba(0, 0, 0, 0.1) !important;
}

.form-control.w-auto {
  max-width: 200px;
}

.badge {
  font-size: 0.9em;
}

/* Specific badge colors */
.badge.bg-primary { background-color: var(--bs-primary) !important; }
.badge.bg-danger { background-color: var(--bs-danger) !important; }
.badge.bg-success { background-color: var(--bs-success) !important; }
.badge.bg-info { background-color: var(--bs-info) !important; }
.badge.bg-warning { background-color: var(--bs-warning) !important; }
.badge.bg-secondary { background-color: var(--bs-secondary) !important; }

.card-body {
  padding: 1.5rem;
  flex-grow: 1; /* Allows card-body to grow and push footer down */
}

.card-footer {
  background-color: transparent; /* No background color */
  border-top: 1px solid rgba(0, 0, 0, 0.125); /* Light border top */
  margin-top: auto; /* Push footer to the bottom */
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
</style>