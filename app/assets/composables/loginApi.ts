import { ref } from 'vue'
import axios from 'axios'
import { type AlertInterface, AlertStyle } from '@userfrosting/theme-pink-cupcake/types'

/**
 * API to communicate with the authentication API.
 */
// TODO : Change auth type
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
