<template>
  <div class="m-5 flex justify-between">
    <div class="py-2 px-4 m-5 bg-theme-sub-alt rounded-lg">
      <p class="text-theme-sub font-bold">Select theme:</p>
      <select
        @change="changeTheme"
        v-model="themeStore.currentTheme"
        class="bg-theme-bg p-3"
      >
        <option v-for="theme in themes" :key="theme" :value="theme">
          {{ theme }}
        </option>
      </select>
    </div>
    <div class="flex items-center">
      <p class="p-3 text-theme-main">main</p>
      <p class="p-3 text-theme-text">text</p>
      <p class="p-3 text-theme-bg bg-theme-sub">bg</p>
      <p class="p-3 text-theme-sub">sub</p>
      <p class="p-3 text-theme-sub-alt bg-theme-sub">sub-alt</p>
    </div>
    <div class="py-2 px-4 m-5 bg-sub-alt rounded-lg">
      <p class="text-theme-sub font-bold">
        Current Theme: {{ themeStore.currentTheme }}
      </p>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useThemeStore } from '../stores/themeStore';

const themeStore = useThemeStore();

const changeTheme = () => {
  themeStore.setTheme(themeStore.currentTheme);
};

const themes = ['botanical', 'rose_pine_dawn', 'moonlight'];
</script>
