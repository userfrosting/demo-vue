import { ref } from 'vue'
import axios from 'axios'
import { type AlertInterface, AlertStyle } from '@userfrosting/theme-pink-cupcake/types'
// import { useAuthStore } from '../stores/auth'
// const authStore = useAuthStore()

/**
 * Composable used to communicate with the `/auth/logout` api. Calling "logout"
 * will send the request to logout the user server side and delete the frontend
 * user object.
 */
// TODO : Fix error "getActivePinia()" was called but there was no active Pinia
// export function useLogoutApi(auth: typeof authStore) {
export function useLogoutApi(auth: any) {
    const loading = ref(false)
    const error = ref<AlertInterface | undefined>()

    const logout = () => {
        loading.value = true
        error.value = undefined
        auth.unsetUser()
        axios
            .get('/auth/logout')
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

    return { loading, error, logout }
}
