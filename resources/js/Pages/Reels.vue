<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref, onMounted, onUnmounted } from 'vue'; // Import necessary Vue features

// Sample reel data - will come from backend later
const reels = ref([
  {
    id: 1,
    video_url: 'https://www.w3schools.com/html/mov_bbb.mp4', // Example video URL
    username: 'SportyAthlete_01',
    description: 'Amazing goal from yesterday\'s match! ⚽ #football #goal #sports',
    music_title: 'Epic Sports Anthem',
    likes: 1500,
    comments: 230,
    shares: 45,
    user_avatar: 'https://via.placeholder.com/50/007bff/ffffff?text=U1',
  },
  {
    id: 2,
    video_url: 'https://assets.mixkit.co/videos/preview/mixkit-top-view-of-a-swimming-pool-1188-large.mp4', // Another example
    username: 'SwimMaster_X',
    description: 'Morning swim sessions are the best! 🏊‍♀️ #swimming #fitness #workout',
    music_title: 'Chill Workout Beats',
    likes: 980,
    comments: 110,
    shares: 20,
    user_avatar: 'https://via.placeholder.com/50/28a745/ffffff?text=U2',
  },
  // Add more dummy reels here for testing the scroll functionality
  {
    id: 3,
    video_url: 'https://assets.mixkit.co/videos/preview/mixkit-man-lifts-dumbbells-in-a-gym-2311-large.mp4',
    username: 'GymRat_Pro',
    description: 'Pushing limits every day! 💪 #gym #fitnessmotivation #beastmode',
    music_title: 'Power Up Track',
    likes: 2100,
    comments: 300,
    shares: 60,
    user_avatar: 'https://via.placeholder.com/50/dc3545/ffffff?text=U3',
  },
  {
    id: 4,
    video_url: 'https://assets.mixkit.co/videos/preview/mixkit-portrait-of-a-woman-playing-badminton-with-a-racket-1076-large.mp4',
    username: 'BadmintonQueen',
    description: 'Smash and dash! Love this game. 🏸 #badminton #sportygirl #passion',
    music_title: 'Uplifting Pop',
    likes: 1800,
    comments: 250,
    shares: 50,
    user_avatar: 'https://via.placeholder.com/50/ffc107/333333?text=U4',
  },
]);

// Current active reel index
const currentReelIndex = ref(0);

// References to video elements
const videoRefs = ref([]);

// Function to play the current video and pause others
const playCurrentVideo = () => {
  videoRefs.value.forEach((video, index) => {
    if (index === currentReelIndex.value) {
      video.play().catch(e => console.error("Video play failed:", e)); // Autoplay might be blocked, add error handling
    } else {
      video.pause();
      video.currentTime = 0; // Reset time for paused videos
    }
  });
};

// Handle scroll for changing reels
const handleScroll = (event) => {
  const container = event.target;
  const scrollPosition = container.scrollTop;
  const containerHeight = container.clientHeight;

  // Calculate which reel is currently in view
  const newIndex = Math.round(scrollPosition / containerHeight);

  if (newIndex !== currentReelIndex.value) {
    currentReelIndex.value = newIndex;
    playCurrentVideo(); // Play the new current video
  }
};

// Interaction functions (placeholders)
const handleLike = (reelId) => {
  console.log(`Liked reel: ${reelId}`);
  // Logic to send like to backend and update count
};

const handleComment = (reelId) => {
  console.log(`Commented on reel: ${reelId}`);
  // Logic to open comment section/modal
};

const handleShare = (reelId) => {
  console.log(`Shared reel: ${reelId}`);
  // Logic to trigger share dialog
};

const followUser = (username) => {
  console.log(`Followed user: ${username}`);
  // Logic to send follow request
};

// Lifecycle hooks for video playback on mount and cleanup on unmount
onMounted(() => {
  playCurrentVideo(); // Start playing the first video when component mounts
});

onUnmounted(() => {
  videoRefs.value.forEach(video => {
    if (video) video.pause(); // Pause all videos when component unmounts
  });
});

</script>

<template>
  <MainLayout>
    <div class="reels-page-container d-flex justify-content-center">
      <div class="reels-container" @scroll="handleScroll">
        <div v-for="(reel, index) in reels" :key="reel.id" class="reel-item d-flex align-items-center justify-content-center">
          <video
            :src="reel.video_url"
            loop
            muted
            playsinline
            preload="auto"
            class="reel-video"
            :ref="el => { if (el) videoRefs[index] = el }"
          ></video>

          <div class="reel-overlay d-flex flex-column justify-content-end p-3">
            <div class="reel-text-content mb-auto">
              <div class="d-flex align-items-center mb-2">
                <img :src="reel.user_avatar" alt="User Avatar" class="rounded-circle me-2 reel-avatar">
                <h5 class="text-white mb-0 fw-bold">{{ reel.username }}</h5>
                <button class="btn btn-sm btn-outline-light ms-3 follow-button" @click="followUser(reel.username)">Follow</button>
              </div>
              <p class="text-white reel-description">{{ reel.description }}</p>
              <div class="d-flex align-items-center text-white reel-music">
                <i class="fas fa-music me-2"></i>
                <span>{{ reel.music_title }}</span>
              </div>
            </div>

            <div class="reel-actions d-flex flex-column align-items-center">
              <div class="action-item text-center mb-3">
                <button class="btn btn-lg text-white" @click="handleLike(reel.id)">
                  <i class="fas fa-heart"></i>
                </button>
                <small class="d-block text-white">{{ reel.likes }}</small>
              </div>
              <div class="action-item text-center mb-3">
                <button class="btn btn-lg text-white" @click="handleComment(reel.id)">
                  <i class="fas fa-comment-dots"></i>
                </button>
                <small class="d-block text-white">{{ reel.comments }}</small>
              </div>
              <div class="action-item text-center">
                <button class="btn btn-lg text-white" @click="handleShare(reel.id)">
                  <i class="fas fa-share"></i>
                </button>
                <small class="d-block text-white">{{ reel.shares }}</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<style scoped>
.reels-page-container {
  height: calc(100vh - 56px); /* Full viewport height minus navbar height */
  overflow: hidden; /* Hide scrollbar for the page itself */
  background-color: #000; /* Black background for reel experience */
  position: relative;
  width: 100%;
}

.reels-container {
  height: 100%;
  width: 100%;
  max-width: 500px; /* Max width for TikTok-like experience on large screens */
  overflow-y: scroll; /* Enable vertical scrolling */
  scroll-snap-type: y mandatory; /* Ensures snapping to each video */
  -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
  position: relative;
}

/* Hide scrollbar for aesthetic purposes */
.reels-container::-webkit-scrollbar {
  display: none;
}
.reels-container {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}

.reel-item {
  width: 100%;
  height: 100%;
  scroll-snap-align: start; /* Snap to the start of each reel item */
  position: relative;
  background-color: #000; /* Fallback background */
}

.reel-video {
  width: 100%;
  height: 100%;
  object-fit: contain; /* Ensure video fits within the container, preserving aspect ratio */
  display: block;
}

.reel-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to top, rgba(0,0,0,0.5), transparent 50%); /* Gradient at bottom */
  display: flex;
  flex-direction: row; /* Main flex direction for text content and actions */
  justify-content: space-between; /* Puts text on left, actions on right */
  align-items: flex-end; /* Aligns content to the bottom */
  pointer-events: none; /* Allows clicks to pass through to the video initially */
}

.reel-overlay > * {
  pointer-events: auto; /* Re-enable pointer events for actual content/buttons */
}

.reel-text-content {
  flex-grow: 1; /* Takes available space on the left */
  max-width: calc(100% - 80px); /* Leave space for action buttons */
  word-wrap: break-word; /* Ensure long text wraps */
}

.reel-avatar {
  width: 35px;
  height: 35px;
  border: 1px solid rgba(255, 255, 255, 0.7);
}

.reel-description {
  font-size: 0.95rem;
  margin-bottom: 0.5rem;
  line-height: 1.3;
}

.reel-music {
  font-size: 0.85rem;
  font-weight: bold;
}

.reel-actions {
  flex-shrink: 0; /* Don't shrink action buttons */
  width: 70px; /* Fixed width for action bar */
}

.action-item button {
  background-color: transparent;
  border: none;
  font-size: 1.8rem; /* Large icons */
  color: white;
  transition: transform 0.2s ease-in-out;
}

.action-item button:hover {
  transform: scale(1.1);
  color: #fff;
}

.action-item small {
  font-size: 0.75rem;
  font-weight: bold;
  text-shadow: 0 0 5px rgba(0, 0, 0, 0.5); /* Shadow for better readability on video */
}

.follow-button {
  border-color: white;
  color: white;
  font-weight: bold;
  transition: background-color 0.2s, color 0.2s;
}

.follow-button:hover {
  background-color: white;
  color: #000 !important;
}

/* Responsive adjustments */
@media (max-width: 575.98px) { /* Extra small devices (portrait phones) */
  .reels-page-container {
    height: calc(100vh - 56px); /* Full height on mobile */
    width: 100%;
    max-width: unset; /* Remove max-width constraint */
  }
  .reels-container {
    max-width: unset; /* Take full width */
  }
}

@media (min-width: 576px) and (max-width: 991.98px) { /* Small to Medium devices */
  .reels-page-container {
    height: calc(100vh - 56px);
  }
  .reels-container {
    max-width: 400px; /* Slightly wider on tablets */
  }
  .reel-video {
    object-fit: cover; /* Cover the container more aggressively */
  }
}
</style>