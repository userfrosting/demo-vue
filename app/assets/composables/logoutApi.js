import { ref } from 'vue'
import axios from 'axios'
import { AlertStyle } from '@userfrosting/theme-pink-cupcake/types'

/**
 * API to communicate with the authentication API.
 */
export function useLogoutApi(auth) {
    const loading = ref(false)
    const error = ref(null)

    const logout = () => {
        loading.value = true
        error.value = null
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
