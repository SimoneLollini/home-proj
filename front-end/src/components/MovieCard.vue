<script setup>
import { store } from "../stores/script.js"
const props = defineProps({
    movie: Object,
})
</script>
<template>
    <div class="col mb-4">
        <router-link :to="{ name: 'movie-details', params: { id: movie.imdbID } }"
            class="card h-100 text-dark border-0 text-decoration-none">
            <div class="card-head bg-light rounded-top text-center">
                <h3> {{ store.refactorTitle(movie.Title) }}</h3>
            </div>
            <img class="card_image" :src="movie.Poster" :alt="movie.Title">
        </router-link>
    </div>
</template>
<style scoped>
img {
    height: 100%;
    object-fit: cover;
}
</style>