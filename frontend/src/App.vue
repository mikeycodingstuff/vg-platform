<template>
  <div
    id="app"
    class="p-20 bg-theme-bg text-theme-text"
    :class="themeStore.currentTheme"
  >
    <router-view></router-view>
    <theme-selector></theme-selector>
  </div>
</template>

<script setup lang="ts">
import ThemeSelector from './components/ThemeSelector.vue';
import { useThemeStore } from './stores/themeStore';

const themeStore = useThemeStore();
</script>
