<script setup>
import { store as store } from "../stores/script.js";
</script>


<template>
    <section class="input_wrapper">
        <div class="mb-3">
            <label class="d-block fs-5 fs-4" for="movieByTitle">Cerca film dal titolo</label>
            <div class="wraper d-flex gap-1">
                <input id="movieByTitle" class="form-control p-1" @keyup.enter="store.callApi(store.URL_MOVIE, false)"
                    type="text" placeholder="Cerca" v-model="store.moviesQuery">
                <button class="btn btn-dark text-white p-1" @click="store.callApi(store.URL_MOVIE, false)">Cerca</button>
            </div>
        </div>
        <div class="mb-3">
            <label class="d-block fs-5 fs-4" for="movieById">Cerca film dall'id</label>
            <div class="wrapper d-flex gap-1">
                <input id="movieById" class="form-control p-1" @keyup.enter="store.callApi(store.URL_MOVIE, true)"
                    type="text" placeholder="Cerca" v-model="store.movieToSearchId">
                <button class="btn btn-dark text-white p-1" @click="store.callApi(store.URL_MOVIE, true)">Cerca</button>
            </div>
        </div>
        <div class="position-relative" v-if="store.error">
            <div class="position-absolute alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Attenzione!</strong>
                {{ store.error === true ? "Prova ad inserire un parametro di ricerca!" :
                    store.error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </section>
</template>

<style scoped>
.input_wrapper {
    max-width: 350px;
    padding-top: 56px;
    margin: auto;
}
</style>
