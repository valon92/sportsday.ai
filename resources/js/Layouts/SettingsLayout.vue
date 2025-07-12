<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

const currentRoute = computed(() => page.url.split('?')[0]);

const isActive = (route) => {
    return currentRoute.value === route;
};
</script>

<template>
  <div> <Head title="Settings" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Settings</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="row">
                            <div class="col-md-3">
                                <ul class="nav flex-column nav-pills">
                                    <li class="nav-item">
                                        <Link :href="route('profile.edit')" 
                                              class="nav-link" 
                                              :class="{ 'active': isActive('/profile') }">
                                            <i class="fas fa-user-circle me-2"></i> Profile Information
                                        </Link>
                                    </li>
                                    <li class="nav-item mt-2">
                                        <Link :href="route('settings.preferences')" 
                                              class="nav-link" 
                                              :class="{ 'active': isActive('/settings/preferences') }">
                                            <i class="fas fa-sliders-h me-2"></i> Preferences
                                        </Link>
                                    </li>
                                    <li class="nav-item mt-2">
                                        <Link :href="route('settings.security')" 
                                              class="nav-link" 
                                              :class="{ 'active': isActive('/settings/security') }">
                                            <i class="fas fa-lock me-2"></i> Security
                                        </Link>
                                    </li>
                                    <li class="nav-item mt-2">
                                        <Link :href="route('settings.privacy')" 
                                              class="nav-link" 
                                              :class="{ 'active': isActive('/settings/privacy') }">
                                            <i class="fas fa-shield-alt me-2"></i> Privacy
                                        </Link>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-9 mt-4 mt-md-0">
                                <slot />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
  </div> </template>

<style scoped>
.nav-link.active {
    background-color: #007bff;
    color: white;
}

.nav-link {
    color: #495057;
    transition: background-color 0.2s, color 0.2s;
    border-radius: 0.375rem;
}

.nav-link:hover {
    background-color: #e9ecef;
    color: #007bff;
}

.nav-link.active i {
    color: white;
}
.nav-link:not(.active) i {
    color: #6c757d;
}
</style>