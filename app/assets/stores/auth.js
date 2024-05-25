// store.js
import { defineStore } from 'pinia'
import axios from 'axios'
import { AlertStyle } from '@userfrosting/theme-pink-cupcake/types'

// TODO : Alert shouldn't be in the store, as it will be displayed on refresh
// TODO : Only user should be in the Pinia store. The API should be in Composable
// TODO : Alert doesn't display HTML
// TODO : Change to Typescript, add AlertInterface

export const useAuthStore = defineStore('auth', {
    persist: true,
    state: () => {
        return {
            loading: false,
            user: null,
            error: null
        }
    },
    getters: {
        auth: (state) => state.user !== null
    },
    actions: {
        login(form) {
            this.loading = true
            this.error = null
            axios
                .post('/auth/login', form)
                .then((response) => {
                    this.user = response.data
                    this.check() // Check to make sure it worked
                })
                .catch((error) => {
                    this.error = {
                        ...error.response.data,
                        ...{style: AlertStyle.Danger, closeBtn: true}
                    }
                })
                .finally(() => {
                    this.loading = false
                })
        },
        logout() {
            this.loading = true
            this.user = null
            axios
                .get('/auth/logout')
                .then(() => {
                    this.check() // Check to make sure it worked
                })
                .finally(() => {
                    this.loading = false
                })
        },
        check() {
            this.loading = true
            axios
                .get('/auth/check')
                .then((response) => {
                    this.user = response.data.user
                })
                .finally(() => {
                    this.loading = false
                })
        }
    }
})
