import { ref } from 'vue'
import axios from 'axios'
import { type AlertInterface, AlertStyle } from '@userfrosting/theme-pink-cupcake/types'
// import { useAuthStore } from '../stores/auth'
// const authStore = useAuthStore()

/**
 * Composable used to communicate with the `/auth/login` api. Calling "login"
 * with the user login data will validate the data with the server. If login is
 * successful, the user will be set on the frontend object. Otherwise, an error
 * will be defined.
 */
// TODO : Fix error "getActivePinia()" was called but there was no active Pinia
// export function useLoginApi(auth: typeof authStore) {
export function useLoginApi(auth: any) {
    const loading = ref(false)
    const error = ref<AlertInterface | undefined>()

    // TODO : Error if user is not null
    // TODO : Change form type
    const login = (form: any) => {
        loading.value = true
        error.value = undefined
        axios
            .post('/auth/login', form)
            .then((response) => {
                auth.setUser(response.data)
            })
            .catch((err) => {
                error.value = {
                    ...err.response.data,
                    ...{ style: AlertStyle.Danger, closeBtn: true }
                }
            })
            .finally(() => {
                loading.value = false
            })
    }

    return { loading, error, login }
}
