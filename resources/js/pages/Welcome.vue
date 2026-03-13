<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { login } from '@/routes';
</script>

<template>
  <Head title="Login" />

  <div
    class="flex min-h-screen items-center justify-center bg-gradient-to-br from-[#a8e6cf] via-[#dcedc1] to-[#ffd3b6] p-6"
  >
    <div
      class="flex flex-col items-center justify-center rounded-3xl bg-white/90 p-12 shadow-2xl backdrop-blur-md dark:bg-black/60 dark:text-white transition-all"
    >
      <h1 class="mb-6 text-3xl font-semibold text-gray-900 dark:text-white">
        Welcome here!
      </h1>
      <p class="mb-8 text-center text-gray-700 dark:text-gray-300">
        Access your application dashboard and manage your projects easily.
      </p>
      <Link
        :href="login()"
        class="text-center w-full rounded-lg bg-[#7bc47f] px-6 py-3 text-lg font-medium text-white shadow-lg hover:bg-[#5ea35a] transition-colors"
      >
        Login
      </Link>
    </div>
  </div>
</template>

<style scoped>
body {
  font-family: 'Inter', sans-serif;
}
</style>