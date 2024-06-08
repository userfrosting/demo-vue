import { ref } from 'vue'
import axios from 'axios'
import { type AlertInterface, AlertStyle } from '@userfrosting/theme-pink-cupcake/types'

/**
 * API to communicate with the authentication API.
 */
// TODO : Change auth type
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
