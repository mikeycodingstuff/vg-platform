<template>
  <div>
    <h1>{{ game.name }}</h1>
    <p>Release Date: {{ game.release_date }}</p>
    <p>Developer: {{ game.developer }}</p>
    <p>Description: {{ game.description }}</p>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import type { Game } from '@/types/types';

const props = defineProps<{
  game: Game;
}>();

const game = ref(props.game);
</script>
