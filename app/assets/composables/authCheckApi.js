import { ref } from 'vue'
import axios from 'axios'
import { AlertStyle } from '@userfrosting/theme-pink-cupcake/types'

/**
 * API to communicate with the authentication API.
 */
export function useCheckApi(auth) {
    const loading = ref(false)
    const error = ref(null)

    const check = () => {
        loading.value = true
        error.value = null
        axios
            .get('/auth/check')
            .then((response) => {
                auth.user = response.data.user
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
