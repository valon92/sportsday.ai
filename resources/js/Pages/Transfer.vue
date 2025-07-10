<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref } from 'vue';

// Sample static transfer data (will come from backend later)
const transfers = ref([
  {
    id: 1,
    player_name: 'David Silva',
    player_photo: 'https://via.placeholder.com/100/007bff/ffffff?text=Silva',
    from_team: 'Manchester City',
    from_team_logo: 'https://via.placeholder.com/50/87CEEB/ffffff?text=MCFC',
    to_team: 'Real Sociedad',
    to_team_logo: 'https://via.placeholder.com/50/FFA500/ffffff?text=RSO',
    fee: 'Free Transfer',
    date: '2025-07-01',
    status: 'Confirmed',
    likes: 120, // Added likes
    comments: 25, // Added comments
    shares: 10,  // Added shares
  },
  {
    id: 2,
    player_name: 'Erling Haaland',
    player_photo: 'https://via.placeholder.com/100/28a745/ffffff?text=Haaland',
    from_team: 'Borussia Dortmund',
    from_team_logo: 'https://via.placeholder.com/50/FFD700/000000?text=BVB',
    to_team: 'Manchester City',
    to_team_logo: 'https://via.placeholder.com/50/87CEEB/ffffff?text=MCFC',
    fee: '€60M',
    date: '2025-06-25',
    status: 'Confirmed',
    likes: 350,
    comments: 60,
    shares: 25,
  },
  {
    id: 3,
    player_name: 'Frenkie de Jong',
    player_photo: 'https://via.placeholder.com/100/dc3545/ffffff?text=DeJong',
    from_team: 'FC Barcelona',
    from_team_logo: 'https://via.placeholder.com/50/A50044/ffffff?text=FCB',
    to_team: 'Manchester United',
    to_team_logo: 'https://via.placeholder.com/50/FF0000/ffffff?text=MU',
    fee: '€85M',
    date: '2025-07-05',
    status: 'Rumor',
    likes: 210,
    comments: 40,
    shares: 15,
  },
  {
    id: 4,
    player_name: 'Kevin Durant',
    player_photo: 'https://via.placeholder.com/100/17a2b8/ffffff?text=Durant',
    from_team: 'Brooklyn Nets',
    from_team_logo: 'https://via.placeholder.com/50/000000/ffffff?text=BN',
    to_team: 'Phoenix Suns',
    to_team_logo: 'https://via.placeholder.com/50/E56020/ffffff?text=PS',
    fee: 'Trade',
    date: '2025-02-09',
    status: 'Confirmed',
    likes: 180,
    comments: 30,
    shares: 12,
  },
  {
    id: 5,
    player_name: 'Rafael Nadal',
    player_photo: 'https://via.placeholder.com/100/6f42c1/ffffff?text=Nadal',
    from_team: 'Retired',
    from_team_logo: 'https://via.placeholder.com/50/AAAAAA/ffffff?text=RET',
    to_team: 'Coach (Rumor)',
    to_team_logo: 'https://via.placeholder.com/50/00FFFF/000000?text=COA',
    fee: 'N/A',
    date: '2025-07-10',
    status: 'Rumor',
    likes: 90,
    comments: 18,
    shares: 7,
  },
]);

// Interaction functions (placeholders) - Modified to accept transferId
const handleLike = (transferId) => {
  console.log(`User liked transfer ID: ${transferId}`);
  // In a real app, send API request here.
  const transfer = transfers.value.find(t => t.id === transferId);
  if (transfer) {
    transfer.likes++; // For immediate visual feedback
  }
};

const handleComment = (transferId) => {
  console.log(`User commented on transfer ID: ${transferId}`);
  // Logic to open a comment modal or navigate to comment section.
};

const handleShare = (transferId) => {
  console.log(`User shared transfer ID: ${transferId}`);
  // Logic to trigger a share dialog.
};

// Function to view transfer details (placeholder)
const viewTransferDetails = (transferId) => {
  console.log(`Navigating to details for Transfer ID: ${transferId}`);
  // When connected to backend: router.visit(`/transfers/${transferId}`);
};
</script>

<template>
  <MainLayout>
    <div class="container py-5">
      <h1 class="display-5 fw-bold text-dark mb-4 text-center">Latest Transfer News</h1>

      <div class="row row-cols-1 g-4">
        <div class="col" v-for="transfer in transfers" :key="transfer.id">
          <div class="card h-100 shadow-sm transfer-card">
            <div class="card-body d-flex flex-column" @click="viewTransferDetails(transfer.id)">
              <div class="d-flex align-items-center mb-3">
                <img :src="transfer.player_photo" class="player-photo rounded-circle me-3" :alt="transfer.player_name">
                <div>
                  <h5 class="card-title fw-bold mb-0">{{ transfer.player_name }}</h5>
                  <small class="text-muted">{{ transfer.date }}</small>
                </div>
                <span :class="{
                  'badge bg-success': transfer.status === 'Confirmed',
                  'badge bg-warning text-dark': transfer.status === 'Rumor',
                  'badge bg-info': transfer.status === 'Loan'
                }" class="ms-auto transfer-status">
                  {{ transfer.status }}
                </span>
              </div>

              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="text-center team-info">
                  <img :src="transfer.from_team_logo" class="team-logo mb-1" :alt="transfer.from_team">
                  <p class="mb-0 small text-muted">{{ transfer.from_team }}</p>
                </div>
                <i class="fas fa-arrow-right fa-2x text-primary mx-3"></i>
                <div class="text-center team-info">
                  <img :src="transfer.to_team_logo" class="team-logo mb-1" :alt="transfer.to_team">
                  <p class="mb-0 small text-muted">{{ transfer.to_team }}</p>
                </div>
              </div>

              <div class="text-center mt-auto pt-3 border-top-secondary">
                <p class="mb-0 fw-bold">Transfer Fee: <span class="text-primary">{{ transfer.fee }}</span></p>
              </div>
            </div>

            <div class="card-footer bg-transparent pt-3 d-flex justify-content-around align-items-center">
              <button class="icon-btn" @click.stop="handleLike(transfer.id)">
                <i class="far fa-heart me-1"></i> {{ transfer.likes }}
              </button>
              <button class="icon-btn" @click.stop="handleComment(transfer.id)">
                <i class="far fa-comment me-1"></i> {{ transfer.comments }}
              </button>
              <button class="icon-btn" @click.stop="handleShare(transfer.id)">
                <i class="fas fa-share-alt me-1"></i> Share
              </button>
            </div>
          </div>
        </div>
        <div v-if="transfers.length === 0" class="col-12 text-center text-muted">
          No transfer news available at the moment.
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<style scoped>
.transfer-card {
  cursor: pointer;
  transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
  border-left: 5px solid var(--bs-primary);
  display: flex; /* Make it a flex container */
  flex-direction: column; /* Stack children vertically */
}

.transfer-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.player-photo {
  width: 70px;
  height: 70px;
  object-fit: cover;
  border: 2px solid var(--bs-primary);
}

.team-logo {
  width: 40px;
  height: 40px;
  object-fit: contain;
}

.transfer-status {
  padding: 0.5em 0.8em;
  border-radius: 0.3rem;
  font-size: 0.8em;
  font-weight: bold;
}

.team-info {
  flex: 1;
}

.fa-arrow-right {
  font-size: 1.8rem;
}

.card-body {
  padding: 1.5rem;
  flex-grow: 1; /* Allow card-body to grow and push footer down */
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

.border-top-secondary {
  border-top: 1px solid rgba(0, 0, 0, 0.1) !important;
}
</style>