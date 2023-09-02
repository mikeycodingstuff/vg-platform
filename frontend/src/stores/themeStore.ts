import { defineStore } from 'pinia';

export const useThemeStore = defineStore('theme', {
  state: () => ({
    currentTheme: localStorage.getItem('theme') || 'botanical',
  }),
  getters: {
    getCurrentTheme(): string {
      return this.currentTheme;
    },
  },
  actions: {
    setTheme(theme: string) {
      this.currentTheme = theme;
      localStorage.setItem('theme', theme);
    },
  },
});
