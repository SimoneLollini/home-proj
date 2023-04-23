<script setup>
import { store } from "../stores/script.js"
const props = defineProps({
    movie: Object,
})
</script>
<template>
    <div class="col mb-4">
        <div class="card h-100 text-dark border-0">
            <div class="card-head bg-light rounded-top text-center">
                <h3> {{ store.refactorTitle(movie.Title) }}</h3>
            </div>
            <img class="card_image" :src="movie.Poster" :alt="movie.Title">
        </div>
    </div>
</template>
<style scoped>
img {
    height: 100%;
    object-fit: cover;
}
</style>