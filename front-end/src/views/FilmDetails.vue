<script setup>
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';
import Nav from '../components/Nav.vue';
import { store } from "../stores/script.js";
import { useAuthStore } from "../stores/auth";

const route = useRoute()
const authStore = useAuthStore();
onMounted(async () => {
    await authStore.getUser();
    store.filmToSearchId = route.params.id;
    store.callApi(store.URL_FILM, true);
});
</script>
<template>
    <Nav />
    <div class="container py-5 text-dark" v-if="store.film">
        <div class="row row-cols-3 pt-5">
            <div class="col">
                <img class="poster" :src="store.film.Poster" :alt="store.film.title">
            </div>
            <div class="col">
                <h1 class="pb-2 fs-1">
                    {{ store.film.Title }}
                </h1>
                <div class="pb-2">
                    {{ store.film.Year }}
                </div>
                <p class="pb-2">
                    {{ store.film.Plot }}
                </p>
                <div class="pb-2">
                    <button @click="store.storeFilm" :disabled="!store.loading" class="btn btn-primary">
                        {{ store.loading ? "Salva" : "caricamento..." }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div v-else class="container py-5 text-dark">
        <h1 class="text-center">Caricamento...</h1>
    </div>
</template>