import { createRouter, createWebHistory } from "vue-router";
import GamesList from "@/components/GamesList.vue";
import GamePage from "@/views/GamePage.vue";

const routes = [
  { path: "/games", component: GamesList },
  { path: "/games/:id", component: GamePage },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
