import { ref } from 'vue'
import axios from 'axios'
import { type AlertInterface, AlertStyle } from '@userfrosting/theme-pink-cupcake/types'

/**
 * API to communicate with the authentication API.
 */
// TODO : Change auth type
export function useCheckApi(auth: any) {
    const loading = ref(false)
    const error = ref<AlertInterface | undefined>()

    const check = () => {
        loading.value = true
        error.value = undefined
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
