<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref, computed } from 'vue';

// Sample static news data (will come from backend later)
const newsArticles = ref([
  {
    id: 1,
    title: 'Local Team Secures Championship Title in Thrilling Final',
    image: 'https://via.placeholder.com/800x450/007bff/ffffff?text=Football_Champ_Hero', // Larger image for featured
    summary: 'In a nail-biting finish, the local football team, the "Mountain Lions," clinched the championship title, marking a historic win for the city. This victory comes after a season of relentless effort and exceptional teamwork, culminating in a memorable performance against their fierce rivals.',
    author: 'John Doe',
    date: '2025-07-09',
    category: 'Football',
    likes: 250,
    comments: 45,
    shares: 12,
    is_featured: true, // Mark this as the featured article
  },
  {
    id: 2,
    title: 'Basketball Star Breaks All-Time Scoring Record',
    image: 'https://via.placeholder.com/400x250/28a745/ffffff?text=Basketball_Record',
    summary: 'Veteran player Emily Johnson set a new league record for most points scored in a single season, cementing her legacy in basketball history.',
    author: 'Jane Smith',
    date: '2025-07-07',
    category: 'Basketball',
    likes: 380,
    comments: 70,
    shares: 25,
    is_featured: false,
  },
  {
    id: 3,
    title: 'New Training Regimen Boosts Olympic Hopefuls',
    image: 'https://via.placeholder.com/400x250/dc3545/ffffff?text=Olympics_Training',
    summary: 'Athletes preparing for the upcoming Olympics are showing promising results with an innovative new training program focused on endurance and agility.',
    author: 'Sports Daily',
    date: '2025-07-06',
    category: 'Athletics',
    likes: 190,
    comments: 30,
    shares: 8,
    is_featured: false,
  },
  {
    id: 4,
    title: 'Youth Soccer League Kicks Off Season with Grand Opening',
    image: 'https://via.placeholder.com/400x250/ffc107/333333?text=Youth_Soccer',
    summary: 'The annual Youth Soccer League commenced its season today with a festive opening ceremony, welcoming hundreds of young aspiring footballers.',
    author: 'Community Reporter',
    date: '2025-07-05',
    category: 'Football',
    likes: 120,
    comments: 15,
    shares: 5,
    is_featured: false,
  },
  {
    id: 5,
    title: 'Tennis Tournament Delivers Unexpected Upsets',
    image: 'https://via.placeholder.com/400x250/17a2b8/ffffff?text=Tennis_Upset',
    summary: 'The Grand Slam tournament saw several top-seeded players eliminated early, leading to an unpredictable and exciting path to the finals.',
    author: 'Tennis World',
    date: '2025-07-04',
    category: 'Tennis',
    likes: 210,
    comments: 35,
    shares: 10,
    is_featured: false,
  },
  {
    id: 6,
    title: 'Swimming Sensation Clinches Gold in World Aquatics',
    image: 'https://via.placeholder.com/400x250/6f42c1/ffffff?text=Swimming_Gold',
    summary: 'Newcomer Sarah Chen stunned competitors by winning gold in the 100m freestyle, setting a personal best and signaling a bright future.',
    author: 'Water Sports Mag',
    date: '2025-07-03',
    category: 'Swimming',
    likes: 180,
    comments: 20,
    shares: 7,
    is_featured: false,
  },
]);

// Computed property to get the featured article
const featuredArticle = computed(() => newsArticles.value.find(article => article.is_featured));

// Computed property to get other articles (non-featured)
const otherArticles = computed(() => newsArticles.value.filter(article => !article.is_featured));

// Interaction functions (placeholders)
const handleLike = (articleId) => {
  console.log(`User liked article ID: ${articleId}`);
  // In a real app, this would send an API request to record the like.
};

const handleComment = (articleId) => {
  console.log(`User commented on article ID: ${articleId}`);
  // This would typically open a comment modal or navigate to a comment section.
};

const handleShare = (articleId) => {
  console.log(`User shared article ID: ${articleId}`);
  // This would typically trigger a share dialog (e.g., to social media).
};

// Function to view full article details
const viewArticleDetails = (articleId) => {
  console.log(`Navigating to details for Article ID: ${articleId}`);
  // When connected to backend: router.visit(`/news/${articleId}`);
};
</script>

<template>
  <MainLayout>
    <div class="container py-5">
      <h1 class="display-5 fw-bold text-dark mb-4 text-center">Latest Sports News</h1>

      <div v-if="featuredArticle" class="mb-5 featured-news-card" @click="viewArticleDetails(featuredArticle.id)">
        <div class="row g-0">
          <div class="col-md-6">
            <img :src="featuredArticle.image" class="img-fluid rounded-start featured-img" :alt="featuredArticle.title">
          </div>
          <div class="col-md-6">
            <div class="card-body d-flex flex-column h-100">
              <h2 class="card-title fw-bold text-primary">{{ featuredArticle.title }}</h2>
              <p class="card-text text-muted small mb-2">
                <i class="far fa-user me-1"></i> {{ featuredArticle.author }} |
                <i class="far fa-calendar-alt ms-2 me-1"></i> {{ featuredArticle.date }}
              </p>
              <p class="card-text flex-grow-1">{{ featuredArticle.summary }}</p>
              <button class="btn btn-dark mt-auto align-self-start read-more-btn">Read More <i class="fas fa-arrow-right ms-2"></i></button>

              <div class="d-flex align-items-center mt-3 pt-3 border-top-secondary">
                <button class="icon-btn" @click.stop="handleLike(featuredArticle.id)">
                  <i class="far fa-heart me-1"></i> {{ featuredArticle.likes }}
                </button>
                <button class="icon-btn ms-4" @click.stop="handleComment(featuredArticle.id)">
                  <i class="far fa-comment me-1"></i> {{ featuredArticle.comments }}
                </button>
                <button class="icon-btn ms-4" @click.stop="handleShare(featuredArticle.id)">
                  <i class="fas fa-share-alt me-1"></i> Share
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <h2 class="display-6 fw-bold text-dark mb-4 mt-5 text-center">Other News</h2>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <div class="col" v-for="article in otherArticles" :key="article.id">
          <div class="card h-100 shadow-sm news-card-item">
            <div class="card-content-clickable" @click="viewArticleDetails(article.id)">
              <img :src="article.image" class="card-img-top" :alt="article.title">
              <div class="card-body pb-0">
                <h5 class="card-title fw-bold mb-2">{{ article.title }}</h5>
                <p class="card-text text-muted small mb-2">
                  <i class="far fa-user me-1"></i> {{ article.author }} |
                  <i class="far fa-calendar-alt ms-2 me-1"></i> {{ article.date }}
                </p>
                <p class="card-text">{{ article.summary }}</p>
              </div>
            </div>

            <div class="card-footer bg-transparent border-top pt-3 d-flex justify-content-around align-items-center">
              <button class="icon-btn" @click.stop="handleLike(article.id)">
                <i class="far fa-heart me-1"></i> {{ article.likes }}
              </button>
              <button class="icon-btn" @click.stop="handleComment(article.id)">
                <i class="far fa-comment me-1"></i> {{ article.comments }}
              </button>
              <button class="icon-btn" @click.stop="handleShare(article.id)">
                <i class="fas fa-share-alt me-1"></i> Share
              </button>
            </div>
          </div>
        </div>
        <div v-if="otherArticles.length === 0 && !featuredArticle" class="col-12 text-center text-muted">
          No news articles available at the moment.
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<style scoped>
/* Common styles for all news cards (general, non-specific) */
.card-content-clickable {
  flex-grow: 1; /* Allows content to take up available space */
  display: flex;
  flex-direction: column;
}

.card-body {
  padding: 1.25rem;
}

.card-text.small {
  font-size: 0.85rem;
}

/* --- Modern Interaction Buttons --- */
.icon-btn {
  background: none;
  border: none;
  color: #6c757d; /* Muted grey for icons */
  font-size: 1rem; /* Standard font size */
  padding: 0.5rem 0.75rem; /* Some padding for clickability */
  cursor: pointer;
  display: flex;
  align-items: center;
  transition: color 0.2s ease-in-out, transform 0.2s ease-in-out;
}

.icon-btn:hover {
  color: var(--bs-primary); /* Primary color on hover */
  transform: translateY(-2px); /* Slight lift effect */
}

.icon-btn i {
  font-size: 1.2rem; /* Slightly larger icon */
  margin-right: 0.5rem;
}

/* --- Featured News Section Styles --- */
.featured-news-card {
  background-color: #fff;
  border-radius: 0.75rem; /* More rounded corners */
  overflow: hidden; /* Ensures rounded corners clip content */
  box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1); /* More prominent shadow */
  cursor: pointer;
  transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.featured-news-card:hover {
  transform: translateY(-8px); /* More pronounced lift effect */
  box-shadow: 0 1.5rem 4rem rgba(0, 0, 0, 0.15) !important;
}

.featured-img {
  height: 100%; /* Take full height of column */
  object-fit: cover; /* Cover the area, preserving aspect ratio */
  border-radius: 0.75rem 0 0 0.75rem; /* Only left corners rounded */
}

.featured-news-card .card-body {
  padding: 2rem; /* More padding for a premium feel */
}

.featured-news-card .card-title {
  font-size: 2rem; /* Larger, more impactful title */
  margin-bottom: 1rem;
  line-height: 1.2;
}

.featured-news-card .card-text {
  font-size: 1.1rem; /* Larger summary text */
  color: #333;
}

.read-more-btn {
  background-color: #343a40; /* Dark button */
  color: white;
  border: none;
  padding: 0.75rem 1.5rem;
  border-radius: 0.5rem;
  font-weight: bold;
  transition: background-color 0.2s ease-in-out;
}

.read-more-btn:hover {
  background-color: var(--bs-primary); /* Primary color on hover */
}

.border-top-secondary {
  border-top: 1px solid rgba(0, 0, 0, 0.1) !important; /* Lighter border */
}

/* --- Other News Articles Grid Styles --- */
.news-card-item {
  transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
  cursor: pointer;
  display: flex;
  flex-direction: column;
}

.news-card-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.news-card-item .card-img-top {
  height: 180px; /* Slightly smaller image for grid cards */
}

.news-card-item .card-title {
  font-size: 1.15rem; /* Adjusted title size for grid cards */
}

.news-card-item .card-footer {
  justify-content: space-around; /* Distribute items more evenly */
  padding: 0.75rem 1rem; /* Adjust padding */
}

/* Responsive adjustments for featured article layout */
@media (max-width: 767.98px) { /* On small screens, stack image and text */
  .featured-news-card .row.g-0 {
    flex-direction: column;
  }
  .featured-news-card .col-md-6 {
    width: 100%;
  }
  .featured-img {
    height: 250px; /* Fixed height for mobile featured image */
    border-radius: 0.75rem 0.75rem 0 0; /* All top corners rounded */
  }
  .featured-news-card .card-body {
    padding: 1.5rem; /* Less padding on small screens */
  }
  .featured-news-card .card-title {
    font-size: 1.5rem;
  }
  .featured-news-card .card-text {
    font-size: 1rem;
  }
}
</style>