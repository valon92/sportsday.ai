<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue'; // Assuming you want to use MainLayout here for consistency

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <MainLayout>
        <Head title="Register" />

        <div class="container d-flex justify-content-center align-items-center min-vh-100 py-5">
            <div class="card shadow-lg p-4 p-md-5 auth-card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4 fw-bold text-primary">Join Sportsday.ai!</h2>
                    <p class="text-center text-muted mb-4">Create your account to get started.</p>

                    <form @submit.prevent="submit">
                        <div class="mb-3">
                            <label for="name" class="form-label visually-hidden">Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control form-control-lg"
                                    v-model="form.name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                    placeholder="Your Name"
                                >
                            </div>
                            <div v-if="form.errors.name" class="text-danger mt-2">
                                {{ form.errors.name }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label visually-hidden">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control form-control-lg"
                                    v-model="form.email"
                                    required
                                    autocomplete="username"
                                    placeholder="Email Address"
                                >
                            </div>
                            <div v-if="form.errors.email" class="text-danger mt-2">
                                {{ form.errors.email }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label visually-hidden">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control form-control-lg"
                                    v-model="form.password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Password"
                                >
                            </div>
                            <div v-if="form.errors.password" class="text-danger mt-2">
                                {{ form.errors.password }}
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label visually-hidden">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input
                                    id="password_confirmation"
                                    type="password"
                                    class="form-control form-control-lg"
                                    v-model="form.password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Confirm Password"
                                >
                            </div>
                            <div v-if="form.errors.password_confirmation" class="text-danger mt-2">
                                {{ form.errors.password_confirmation }}
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Register
                            </button>
                        </div>
                    </form>

                    <p class="text-center mt-4 mb-0 text-muted">
                        Already have an account?
                        <!-- <Link :href="route('login')" class="text-decoration-none text-primary fw-semibold">
                            Log in here
                        </Link> -->
                    </p>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<style scoped>
.auth-card {
    max-width: 500px;
    width: 100%;
    border-radius: 1rem;
    background-color: #f8f9fa; /* Light background for the card */
}

.min-vh-100 {
    min-height: 100vh;
}

.form-control-lg {
    height: calc(2.8rem + 2px); /* Slightly taller input fields */
}

.input-group-text {
    background-color: var(--bs-light);
    border-right: none;
    color: var(--bs-primary); /* Icon color */
}

.form-control {
    border-left: none;
}

.form-control:focus {
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25); /* Primary color shadow on focus */
    border-color: var(--bs-primary);
}

.btn-primary {
    background-color: var(--bs-primary);
    border-color: var(--bs-primary);
}

.btn-primary:hover {
    background-color: var(--bs-primary-hover); /* Assuming you have a hover color variable */
    border-color: var(--bs-primary-hover);
}

/* Custom primary hover color if not defined in Bootstrap variables */
:root {
  --bs-primary-hover: #0a58ca; /* A slightly darker blue */
}
</style>