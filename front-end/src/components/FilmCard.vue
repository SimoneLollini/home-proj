<script setup>
import { store } from "../stores/script.js"
const props = defineProps({
    film: Object,
})
</script>
<template>
    <div class="col mb-4">
        <router-link :to="{ name: 'film-details', params: { id: film.imdbID } }"
            class="card h-100 text-dark border-0 text-decoration-none">
            <div class="card-head bg-light rounded-top text-center">
                <h3> {{ store.refactorTitle(film.Title) }}</h3>
            </div>
            <img class="card_image" :src="film.Poster" :alt="film.Title">
        </router-link>
    </div>
</template>
<style scoped>
img {
    height: 100%;
    object-fit: cover;
}
</style>