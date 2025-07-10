<script setup>
import { computed, ref } from 'vue';

const props = defineProps({
  event: {
    type: Object,
    required: true,
    // Define the shape of the event object for clarity and validation
    validator: (value) => {
      return (
        typeof value.id === 'number' &&
        typeof value.title === 'string' &&
        typeof value.sport === 'string' &&
        typeof value.date === 'string' && // Format YYYY-MM-DD
        typeof value.time === 'string' && // Format HH:MM
        typeof value.location === 'string' &&
        typeof value.image === 'string'
      );
    },
  },
});

// Reactive state for local likes (not persisted to backend yet)
const localLikes = ref(Math.floor(Math.random() * 100) + 10); // Random initial likes
const isLiked = ref(false); // State to track if current user liked it

// Computed properties for displaying formatted date/time if needed
const formattedDate = computed(() => {
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  return new Date(props.event.date).toLocaleDateString('en-US', options);
});

const formattedTime = computed(() => {
  // Assuming time is already in HH:MM format
  return props.event.time; 
});

// A simple way to generate a placeholder image if none is provided
const eventImage = computed(() => {
  return props.event.image || `https://via.placeholder.com/400x250?text=${props.event.sport}`;
});

// --- Interaction Methods ---
const toggleLike = () => {
  if (isLiked.value) {
    localLikes.value--;
  } else {
    localLikes.value++;
  }
  isLiked.value = !isLiked.value;
  // In a real app, you'd send an API request here to update the like status on the backend.
  console.log(`Event ${props.event.id}: Like status toggled. New likes: ${localLikes.value}`);
};

const handleComment = () => {
  // In a real app, this would open a comment modal or navigate to a details page.
  console.log(`Event ${props.event.id}: Comment button clicked.`);
  alert('Comment functionality coming soon!');
};

const handleShare = () => {
  // In a real app, this would open a share dialog.
  if (navigator.share) {
    navigator.share({
      title: props.event.title,
      text: `Check out this upcoming ${props.event.sport} event: ${props.event.title} on ${formattedDate.value} at ${props.event.location}`,
      url: window.location.href, // Or a specific URL for this event
    }).then(() => {
      console.log(`Event ${props.event.id}: Shared successfully.`);
    }).catch((error) => {
      console.error(`Event ${props.event.id}: Error sharing:`, error);
    });
  } else {
    // Fallback for browsers that don't support Web Share API
    console.log(`Event ${props.event.id}: Share button clicked.`);
    alert('Share functionality coming soon! (Web Share API not supported)');
  }
};
</script>

<template>
  <div class="card event-card h-100 shadow-sm border-0 rounded-lg overflow-hidden">
    <img :src="eventImage" class="card-img-top event-img" :alt="event.title">
    <div class="card-body d-flex flex-column">
      <h5 class="card-title text-truncate">{{ event.title }}</h5>
      <p class="card-text text-muted mb-2">
        <i class="fas fa-baseball-ball me-1"></i> {{ event.sport }}
      </p>
      <p class="card-text mb-1">
        <i class="far fa-calendar-alt me-1"></i> {{ formattedDate }}
      </p>
      <p class="card-text mb-2">
        <i class="far fa-clock me-1"></i> {{ formattedTime }}
      </p>
      <p class="card-text text-muted small mt-auto">
        <i class="fas fa-map-marker-alt me-1"></i> {{ event.location }}
      </p>
      <div class="mt-3 text-center">
        <a href="#" class="btn btn-primary btn-sm rounded-pill px-3">View Details</a>
      </div>
    </div>
    
    <div class="card-footer bg-white border-top d-flex justify-content-around align-items-center p-2">
      <button @click="toggleLike" class="btn btn-transparent p-0 interaction-btn" :class="{ 'liked': isLiked }">
        <i :class="['fas fa-heart', { 'text-danger': isLiked }]"></i>
        <span class="ms-1 small">{{ localLikes }}</span>
      </button>
      <button @click="handleComment" class="btn btn-transparent p-0 interaction-btn">
        <i class="fas fa-comment"></i>
        <span class="ms-1 small">Comment</span>
      </button>
      <button @click="handleShare" class="btn btn-transparent p-0 interaction-btn">
        <i class="fas fa-share-alt"></i>
        <span class="ms-1 small">Share</span>
      </button>
    </div>
  </div>
</template>

<style scoped>
.event-card {
  transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.event-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.event-img {
  height: 180px; /* Fixed height for consistent card sizes */
  object-fit: cover; /* Ensures image covers the area without distortion */
  border-top-left-radius: inherit;
  border-top-right-radius: inherit;
}

.card-title {
  font-size: 1.15rem;
  font-weight: 600;
  color: #343a40; /* Dark text for titles */
  margin-bottom: 0.5rem;
}

.card-text {
  font-size: 0.9rem;
  color: #6c757d; /* Muted text for details */
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0056b3;
  border-color: #0056b3;
}

/* New styles for interaction buttons */
.card-footer {
  border-top: 1px solid #e9ecef; /* Light border at the top of the footer */
}

.interaction-btn {
  border: none;
  background: none;
  color: #6c757d; /* Muted color for icons */
  font-size: 0.9rem;
  font-weight: 500;
  cursor: pointer;
  display: flex;
  align-items: center;
  padding: 0.25rem 0.5rem;
  transition: color 0.2s ease-in-out;
}

.interaction-btn:hover {
  color: #007bff; /* Primary color on hover */
}

/* Style for the liked state */
.interaction-btn.liked .fa-heart {
  color: #dc3545; /* Red color for liked heart */
}
.interaction-btn.liked:hover .fa-heart {
    color: #c82333; /* Darker red on hover when liked */
}

.interaction-btn i {
  margin-right: 0.25rem;
}
</style>