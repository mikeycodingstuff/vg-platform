import { defineStore } from 'pinia';

export const useThemeStore = defineStore('theme', {
  state: () => ({
    currentTheme: localStorage.getItem('theme') || 'defaultTheme',
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
      document.documentElement.setAttribute('data-theme', theme);
    },
  },
});
