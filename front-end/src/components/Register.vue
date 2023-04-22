<script setup>
import { ref } from "vue";
import { useAuthStore } from "../stores/auth";
import Nav from "./Nav.vue";

const authStore = useAuthStore();

const form = ref({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});
</script>
<template>
  <Nav />
  <section class="bg-[#F4F7FF] ">
    <div class="container mx-auto">
      <div class="w-full px-4">
        <div
          class="mx-auto max-w-[525px] overflow-hidden rounded-lg bg-white py-16 px-10 text-center sm:px-12 md:px-[60px]">
          <h1 class="text-center mb-4 text-3xl">Registrazione</h1>
          <form @submit.prevent="authStore.handleRegister(form)">
            <div class="mb-3">
              <input type="text" placeholder="Name" v-model="form.name"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
              <div v-if="authStore.errors.name" class="flex">
                <span class="text-red-400 text-sm m-2 p-2">
                  {{ authStore.errors.name[0] }}
                </span>
              </div>
            </div>
            <div class="mb-3">
              <input type="email" placeholder="Email" v-model="form.email"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
              <div v-if="authStore.errors.email" class="flex">
                <span class="text-red-400 text-sm m-2 p-2">
                  {{ authStore.errors.email[0] }}
                </span>
              </div>
            </div>
            <div class="mb-3">
              <input type="password" placeholder="Password" v-model="form.password"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
              <div v-if="authStore.errors.password" class="flex">
                <span class="text-red-400 text-sm m-2 p-2">
                  {{ authStore.errors.password[0] }}
                </span>
              </div>
            </div>
            <div class="mb-3">
              <input type="password" placeholder="Conferma password" v-model="form.password_confirmation"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
            </div>
            <div class="mb-10">
              <button type="submit" class="w-full px-4 py-3 bg-indigo-500 hover:bg-indigo-700 rounded-md text-white">
                Register
              </button>
            </div>
          </form>
          <p class="text-base text-[#adadad]">
            <router-link to="/login" class="text-primary hover:underline">
              Se hai già un account, accedi
            </router-link>
          </p>
        </div>
      </div>
    </div>
  </section>
</template>