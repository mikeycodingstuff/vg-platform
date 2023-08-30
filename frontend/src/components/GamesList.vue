<template>
	<div>
		<h2>List of Games</h2>
		<ul>
			<li v-for="game in games" :key="game.id">{{ game.name }}</li>
		</ul>
	</div>
</template>
  
<script setup lang="ts">
import { ref, onMounted } from 'vue';
import type { Game } from '@/types/types';

const games = ref<Game[]>([]);
const BASE_URL = import.meta.env.VITE_API_ENDPOINT;

onMounted(() => {
  fetchGames();
});

const fetchGames = async () => {
  try {
    const response = await fetch(`${BASE_URL}/api/games`);
    const data: { data: Game[] } = await response.json();
    games.value = data.data;
  } catch (error) {
    console.error('Error fetching games:', error);
  }
};
</script>

  