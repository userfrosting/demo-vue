import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('@/views/AboutView.vue')
    },
    {
      path: '/resources',
      name: 'api',
      component: () => import('@/views/ApiView.vue')
    },
    {
      path: '/auth',
      name: 'auth',
      component: () => import('@/views/AuthView.vue')
    }
  ]
})

export default router
