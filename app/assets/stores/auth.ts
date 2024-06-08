import { defineStore } from 'pinia'
import type { UserInterface } from '../interfaces/userInterface'

export const useAuthStore = defineStore('auth', {
    persist: true,
    state: () => {
        return {
            user: null as UserInterface | null
        }
    },
    getters: {
        isAuth: (state): boolean => state.user !== null
    },
    actions: {
        setUser(user: UserInterface): void {
            this.user = user
        },
        unsetUser(): void {
            this.user = null
        }
    }
})
