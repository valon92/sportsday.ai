<script setup>
import SettingsLayout from '@/Layouts/SettingsLayout.vue'; // Make sure this path is correct
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <div> <Head title="Privacy Settings" />

    <SettingsLayout>
      <div class="container py-4">
        <h3 class="fw-bold mb-4">Privacy Control</h3>
        <p class="text-muted mb-4">Manage your privacy settings and data sharing options here.</p>

        <form @submit.prevent="savePrivacySettings">
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="dataSharing" checked>
                <label class="form-check-label" for="dataSharing">Share Anonymous Data</label>
                <small class="form-text text-muted d-block">Help us improve by sharing non-identifiable usage data.</small>
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="personalizedAds">
                <label class="form-check-label" for="personalizedAds">Personalized Advertisements</label>
                <small class="form-text text-muted d-block">Receive ads tailored to your interests.</small>
            </div>

            <hr class="my-4">

            <h4 class="fw-bold mb-3">Data Export</h4>
            <p class="text-muted mb-3">Request a copy of your personal data.</p>
            <button type="button" class="btn btn-outline-primary">Request Data Export</button>

            <button type="submit" class="btn btn-primary mt-4">Save Privacy Settings</button>
        </form>
      </div>
    </SettingsLayout>
  </div>
</template>

<style scoped>
/* Add any specific styles for the Privacy page here */
</style>