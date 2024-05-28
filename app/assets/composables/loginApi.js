import { ref } from 'vue'
import axios from 'axios'
import { AlertStyle } from '@userfrosting/theme-pink-cupcake/types'

/**
 * API to communicate with the authentication API.
 */
export function useLoginApi(auth) {
    const loading = ref(false)
    const error = ref(undefined)
    // const error = ref<AlertInterface>()

    // TODO : Error if user is not null

    const login = (form) => {
        loading.value = true
        error.value = null
        axios
            .post('/auth/login', form)
            .then((response) => {
                auth.user = response.data
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
