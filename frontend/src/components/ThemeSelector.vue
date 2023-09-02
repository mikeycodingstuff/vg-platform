<template>
  <div class="m-5 flex justify-center">
    <button
      @click="toggleTheme"
      class="bg-background hover:bg-hover text-white font-bold py-2 px-4 rounded m-5"
    >
      Toggle Theme
    </button>
    <div class="bg-background rounded font-bold py-2 px-4 m-5">
      <p class="text-primary">Current Theme: {{ themeStore.currentTheme }}</p>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useThemeStore } from '../stores/themeStore';

const themeStore = useThemeStore();

const toggleTheme = () => {
  const newTheme =
    themeStore.currentTheme === 'lightTheme' ? 'defaultTheme' : 'lightTheme';
  themeStore.setTheme(newTheme);
};
</script>
