<template>
  <div class="m-5 flex justify-between">
    <div class="py-2 px-4 m-5 bg-sub-alt rounded-lg">
      <p class="text-sub font-bold">select theme:</p>
      <select @change="changeTheme" v-model="themeStore.currentTheme" class="bg-background p-3 ">
        <option value="botanical">botanical</option>
        <option value="rose_pine_dawn">rose pine dawn</option>
        <option value="moonlight">moonlight</option>
      </select>
    </div>
    <div class="py-2 px-4 m-5 bg-sub-alt rounded-lg">
      <p class="text-sub font-bold">
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
</script>
