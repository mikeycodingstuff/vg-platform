<template>
  <div class="m-5 flex justify-center">
    <button
      @click="toggleTheme"
      class="bg-sub-alt text-text hover:bg-text hover:text-sub-alt font-bold py-2 px-4 rounded m-5"
    >
      Toggle Theme
    </button>
    <div class="py-2 px-4 m-5">
      <p class="text-sub font-bold">
        Current Theme: {{ themeStore.currentTheme }}
      </p>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useThemeStore } from '../stores/themeStore';

const themeStore = useThemeStore();

const toggleTheme = () => {
  const newTheme =
    themeStore.currentTheme === 'rose_pine_dawn'
      ? 'botanical'
      : 'rose_pine_dawn';
  themeStore.setTheme(newTheme);
};
</script>
