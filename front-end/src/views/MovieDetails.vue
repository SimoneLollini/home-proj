<script setup>
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';
import Nav from '../components/Nav.vue';
import { store } from "../stores/script.js";
const route = useRoute()
onMounted(() => {
    store.movieToSearchId = route.params.id;
    store.callApi(store.URL_MOVIE, true);
});
</script>
<template>
    <Nav />
    <div class="container py-5 text-dark" v-if="store.movie">
        <div class="row row-cols-3 pt-5">
            <div class="col">
                <img class="poster" :src="store.movie.Poster" :alt="store.movie.title">
            </div>
            <div class="col overflow_card">
                <h1 class="pb-2 fs-1">
                    {{ store.movie.Title }}
                </h1>
                <div class="pb-2">
                    {{ store.movie.Year }}
                </div>
                <p class="pb-2">
                    {{ store.movie.Plot }}
                </p>
            </div>
        </div>
    </div>
    <div v-else class="container py-5 text-dark">
        <h1 class="text-center">Caricamento...</h1>
    </div>
</template>
<style scoped >
.container {
    height: calc(100% - 56px);
}

.overflow_card {
    height: 60vh;
    overflow-y: auto;

}
</style>