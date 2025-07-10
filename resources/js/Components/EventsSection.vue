<script setup>
import { ref, computed, onMounted } from 'vue';
import EventCard from '@/Components/EventCard.vue';

// --- Placeholder Data ---
// In a real application, this data would come from your Laravel backend (API or props).
// We'll use a larger dataset to demonstrate the "Load More" functionality.
const allEvents = ref([
  { id: 1, title: 'Football Match: Local Derby', sport: 'Football', date: '2026-01-15', time: '19:00', location: 'City Stadium', image: 'https://via.placeholder.com/400x250/28a745/ffffff?text=Football+Derby' },
  { id: 2, title: 'Basketball Championship Final', sport: 'Basketball', date: '2026-01-20', time: '20:30', location: 'Arena Hall', image: 'https://via.placeholder.com/400x250/007bff/ffffff?text=Basketball+Final' },
  { id: 3, title: 'Tennis Grand Slam Quarter-Finals', sport: 'Tennis', date: '2026-01-25', time: '14:00', location: 'Tennis Club Courts', image: 'https://via.placeholder.com/400x250/ffc107/343a40?text=Tennis+Match' },
  { id: 4, title: 'Athletics Marathon Race', sport: 'Athletics', date: '2026-02-01', time: '08:00', location: 'Downtown Streets', image: 'https://via.placeholder.com/400x250/dc3545/ffffff?text=Marathon+Race' },
  { id: 5, title: 'Volleyball League Semi-Finals', sport: 'Volleyball', date: '2026-02-05', time: '18:00', location: 'Sports Center', image: 'https://via.placeholder.com/400x250/6f42c1/ffffff?text=Volleyball' },
  { id: 6, title: 'Handball Cup Group Stage', sport: 'Handball', date: '2026-02-10', time: '17:00', location: 'Indoor Arena', image: 'https://via.placeholder.com/400x250/fd7e14/ffffff?text=Handball+Cup' },
  { id: 7, title: 'Boxing Heavyweight Title Fight', sport: 'Boxing', date: '2026-02-15', time: '22:00', location: 'Grand Casino', image: 'https://via.placeholder.com/400x250/17a2b8/ffffff?text=Boxing+Fight' },
  { id: 8, title: 'Cycling Tour Stage 3', sport: 'Cycling', date: '2026-02-20', time: '10:00', location: 'Mountain Pass', image: 'https://via.placeholder.com/400x250/e83e8c/ffffff?text=Cycling+Tour' },
  { id: 9, title: 'Swimming National Trials', sport: 'Swimming', date: '2026-02-25', time: '11:00', location: 'Olympic Pool', image: 'https://via.placeholder.com/400x250/6610f2/ffffff?text=Swimming+Trials' },
  { id: 10, title: 'Rugby Union Premiership Match', sport: 'Rugby', date: '2026-03-01', time: '15:00', location: 'Rugby Park', image: 'https://via.placeholder.com/400x250/20c997/ffffff?text=Rugby+Match' },
  { id: 11, title: 'Golf Major Championship Round 1', sport: 'Golf', date: '2026-03-05', time: '09:00', location: 'Royal Golf Club', image: 'https://via.placeholder.com/400x250/e0a800/ffffff?text=Golf+Championship' },
  { id: 12, title: 'Formula 1 Grand Prix', sport: 'F1 Racing', date: '2026-03-10', time: '16:00', location: 'International Circuit', image: 'https://via.placeholder.com/400x250/1e7e34/ffffff?text=F1+Grand+Prix' },
  { id: 13, title: 'Ice Hockey Playoff Game', sport: 'Ice Hockey', date: '2026-03-15', time: '19:30', location: 'Ice Palace', image: 'https://via.placeholder.com/400x250/000000/ffffff?text=Ice+Hockey' },
  { id: 14, title: 'Badminton Open Tournament', sport: 'Badminton', date: '2026-03-20', time: '13:00', location: 'Community Sports Hall', image: 'https://via.placeholder.com/400x250/8a2be2/ffffff?text=Badminton' },
  { id: 15, title: 'Table Tennis World Cup', sport: 'Table Tennis', date: '2026-03-25', time: '10:00', location: 'Exhibition Center', image: 'https://via.placeholder.com/400x250/5f9ea0/ffffff?text=Table+Tennis' },
  { id: 16, title: 'Darts Championship Finals', sport: 'Darts', date: '2026-03-30', time: '21:00', location: 'Convention Centre', image: 'https://via.placeholder.com/400x250/d2691e/ffffff?text=Darts' },
]);
// --- End Placeholder Data ---

const eventsPerPage = 12; // Number of events to display initially and on "Load More"
const displayedEventsCount = ref(eventsPerPage);

const displayedEvents = computed(() => {
  return allEvents.value.slice(0, displayedEventsCount.value);
});

const hasMoreEvents = computed(() => {
  return displayedEventsCount.value < allEvents.value.length;
});

const loadMore = () => {
  displayedEventsCount.value += eventsPerPage;
};

// Optional: Sort events by date if they are not already sorted
onMounted(() => {
  allEvents.value.sort((a, b) => {
    const dateA = new Date(`${a.date}T${a.time}`);
    const dateB = new Date(`${b.date}T${b.time}`);
    return dateA - dateB;
  });
});
</script>

<template>
  <section class="events-section py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-5 fw-bold text-dark">Upcoming Sports Events</h2>
      
      <div v-if="displayedEvents.length === 0" class="alert alert-info text-center" role="alert">
        No upcoming events found. Please check back later!
      </div>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
        <div class="col" v-for="event in displayedEvents" :key="event.id">
          <EventCard :event="event" />
        </div>
      </div>

      <div class="text-center mt-5" v-if="hasMoreEvents">
        <button @click="loadMore" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">
          Load More Events <i class="fas fa-chevron-down ms-2"></i>
        </button>
      </div>
    </div>
  </section>
</template>

<style scoped>
.events-section {
  padding-top: 4rem;
  padding-bottom: 4rem;
}

h2 {
  color: #343a40; /* Darker heading for contrast */
}

/* Custom button style if desired, or rely on Bootstrap defaults */
.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0056b3;
  border-color: #0056b3;
}

/* Ensure consistent card heights in each row by adjusting column spacing */
.row-cols-1 > .col,
.row-cols-md-2 > .col,
.row-cols-lg-3 > .col,
.row-cols-xl-4 > .col {
  display: flex; /* Makes the column a flex container */
}

.col > .event-card {
  flex: 1; /* Allows the card to take up all available space in its flex column */
}
</style>