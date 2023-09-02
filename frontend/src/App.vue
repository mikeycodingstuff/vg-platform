<template>
  <div id="app" class="p-20">
    <router-view></router-view>
    <theme-selector></theme-selector>
  </div>
</template>

<script setup lang="ts">
import ThemeSelector from './components/ThemeSelector.vue';
</script>
