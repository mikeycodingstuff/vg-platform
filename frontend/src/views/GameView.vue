<template>
	<div>
		<template v-if="loading">
			<p>
				Loading...
			</p>
		</template>
		<template v-else-if="game">
			<GameDetail :game="game" />
		</template>
	</div>
</template>
  
<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import GameDetail from '@/components/GameDetail.vue';
import type { Game } from '@/types/types';

const router = useRouter();
const game = ref<Game | null>(null);
const BASE_URL = import.meta.env.VITE_API_ENDPOINT;
const loading = ref(true);

onMounted(() => {
	const gameId = Number(router.currentRoute.value.params.id);
	fetchGameById(gameId);
});

async function fetchGameById(id: number): Promise<void> {
	try {
		const response = await fetch(`${BASE_URL}/games/${id}`);
		const data: { data: Game } = await response.json();
		game.value = data.data;
		loading.value = false;
	} catch (error) {
		console.error('Error fetching game:', error);
		loading.value = false;
	}
}
</script>
  