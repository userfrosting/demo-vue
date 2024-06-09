import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('../views/HomeView.vue')
        },
        {
            path: '/about',
            name: 'about',
            component: () => import('../views/AboutView.vue')
        },
        {
            path: '/resources',
            name: 'api',
            component: () => import('../views/ApiView.vue')
        },
        {
            path: '/auth',
            name: 'auth',
            component: () => import('../views/AuthView.vue')
        }
    ]
})

export default router
