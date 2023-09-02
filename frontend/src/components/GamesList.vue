<template>
  <div>
    <h1 class="text-2xl text-sub">List of Games</h1>
    <table>
      <thead>
        <tr class="text-sub">
          <th>Name</th>
          <th>Release Date</th>
          <th>Developer</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="game in games" :key="game.id">
          <td>{{ game.name }}</td>
          <td>{{ game.release_date }}</td>
          <td>{{ game.developer }}</td>
        </tr>
      </tbody>
    </table>
    <p v-if="loading">Loading...</p>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import type { Game } from '@/types/types';

const games = ref<Game[]>([]);
const loading = ref(true);
const BASE_URL = import.meta.env.VITE_API_ENDPOINT;

onMounted(() => {
  fetchGames();
});

const fetchGames = async () => {
  try {
    const response = await fetch(`${BASE_URL}/games`);
    console.log(`${BASE_URL}/games`);
    const data: Game[] = await response.json();
    games.value = data;
    loading.value = false;
  } catch (error) {
    console.error('Error fetching games:', error);
    loading.value = false;
  }
};
</script>
