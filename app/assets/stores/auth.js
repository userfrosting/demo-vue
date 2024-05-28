import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', {
    persist: true,
    state: () => {
        return {
            user: null
        }
    },
    getters: {
        auth: (state) => state.user !== null
    },
    actions: {
        setUser(user) {
            this.user = user
        },
        unsetUser() {
            this.user = null
        }
    }
})
