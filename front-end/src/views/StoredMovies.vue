<script setup>
import axios from 'axios';
import { ref } from 'vue'
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';
import Nav from '../components/Nav.vue';
import MovieCard from '../components/MovieCard.vue';
import { store } from "../stores/script.js";
import { useAuthStore } from "../stores/auth.js";
import router from '../router';
const authStore = useAuthStore();

onMounted(async () => {
    await authStore.getUser();
    store.getStoredMovies();
});
</script>
<template>
    <Nav />
    <div class="container">
        <h1 class="text-center p-4 bg-dark text-white m-4 rounded-3">
            Una lista di tutti i risultati che sono stati cercati!
        </h1>
        <div v-if="store.storedMovies" class="row row-cols-5 justify-content-center">
            <div v-for="movie in store.storedMovies">
                <MovieCard :movie="movie" />
            </div>
        </div>
    </div>
</template>
<style scoped ></style>