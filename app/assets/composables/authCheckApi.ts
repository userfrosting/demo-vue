import { ref } from 'vue'
import axios from 'axios'
import { type AlertInterface, AlertStyle } from '@userfrosting/theme-pink-cupcake/types'
// import { useAuthStore } from '../stores/auth'
// const authStore = useAuthStore()

/**
 * Composable used to communicate with the `/auth/check` api. Calling "check"
 * will fetch the user info from the server and set the frontend object.
 */
// TODO : Fix error "getActivePinia()" was called but there was no active Pinia
// export function useCheckApi(auth: typeof authStore) {
export function useCheckApi(auth: any) {
    const loading = ref(false)
    const error = ref<AlertInterface | undefined>()

    const check = () => {
        loading.value = true
        error.value = undefined
        axios
            .get('/auth/check')
            .then((response) => {
                auth.setUser(response.data.user)
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

    return { loading, error, check }
}
