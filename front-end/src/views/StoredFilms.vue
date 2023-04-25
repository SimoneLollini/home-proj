<script setup>
import axios from 'axios';
import { ref } from 'vue'
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';
import Nav from '../components/Nav.vue';
import FilmCard from '../components/FilmCard.vue';
import { store } from "../stores/script.js";
import { useAuthStore } from "../stores/auth.js";
import router from '../router';
const authStore = useAuthStore();

onMounted(async () => {
    await authStore.getUser();
    store.getStoredFilms();
});
</script>
<template>
    <Nav />
    <div class="container">
        <h1 class="text-center p-4 bg-dark text-white m-4 rounded-3">
            Una lista di tutti i risultati che sono stati salvati!
        </h1>
        <div class="row row-cols-5 justify-content-center">
            <div v-for="film in store.storedFilms">
                <FilmCard :film="film" />
            </div>
        </div>
    </div>
</template>
<style scoped ></style>