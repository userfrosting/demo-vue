<script setup>
import { useAuthStore } from '../../stores/auth'
import { useCheckApi } from '../../composables/authCheckApi'

const auth = useAuthStore()

// Login API variables
const { loading, check } = useCheckApi(auth)
check()
</script>

<template>
    <UFCardBox title="Auth Check">
        <div class="uk-container uk-text-center">
            <p style="font-size: 100px">
                <font-awesome-icon
                    class="uk-text-success"
                    v-if="auth.isAuth"
                    :icon="['fas', 'circle-check']" />
                <font-awesome-icon class="uk-text-danger" v-else :icon="['fas', 'circle-xmark']" />
            </p>
            <p v-if="auth.isAuth">
                <img :src="auth.user.avatar" class="uk-margin-right" width="50" height="50" />
                <span class="uk-text-middle">
                    <strong>Username:</strong> {{ auth.user.user_name }}
                </span>
            </p>
            <p>
                <button class="uk-button uk-button-primary" @click="check()" :disabled="loading">
                    Check Authentication
                </button>
            </p>
        </div>
    </UFCardBox>
</template>
