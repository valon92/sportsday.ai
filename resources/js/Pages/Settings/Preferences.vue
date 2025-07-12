<script setup>
import SettingsLayout from '@/Layouts/SettingsLayout.vue';
import { Head } from '@inertiajs/vue3';

// You might define props here if you fetch user preferences from the backend
// defineProps({
//   userPreferences: Object,
// });
</script>

<template>
  <div> <Head title="Preferences" />

    <SettingsLayout>
      <h3 class="fw-bold mb-4">Notification Preferences</h3>
      <p class="text-muted mb-4">Manage how you receive notifications about events, news, and updates.</p>

      <form @submit.prevent="savePreferences">
        <div class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
          <label class="form-check-label" for="emailNotifications">Email Notifications</label>
          <small class="form-text text-muted d-block">Receive important updates via email.</small>
        </div>

        <div class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" id="pushNotifications">
          <label class="form-check-label" for="pushNotifications">Push Notifications</label>
          <small class="form-text text-muted d-block">Get instant alerts on your device.</small>
        </div>

        <hr class="my-4">

        <h3 class="fw-bold mb-4">Theme Settings</h3>
        <p class="text-muted mb-4">Choose your preferred application theme.</p>
        <div class="mb-3">
          <label for="themeSelect" class="form-label">Application Theme</label>
          <select class="form-select" id="themeSelect">
            <option value="light">Light Theme</option>
            <option value="dark">Dark Theme</option>
            <option value="system">System Default</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Save Preferences</button>
      </form>
    </SettingsLayout>
  </div> </template>

<style scoped>
/* Specific styles for Preferences page if needed */
</style>