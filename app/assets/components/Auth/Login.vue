<script setup>
import { useAuthStore } from '../../stores/auth.js'
import Alert from '../Alert.vue'

const auth = useAuthStore()

// Variables
let form = {
    user_name: '',
    password: ''
}
</script>

<template>
    <h2>Login</h2>
    <form class="uk-form-horizontal" uk-margin>
        <Alert :alert="auth.error" />
        <div>
            <label class="uk-form-label" for="form-horizontal-username">Username</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-username" type="text" v-model="form.user_name">
            </div>
        </div>
        <div>
            <label class="uk-form-label" for="form-horizontal-password">Password</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-password" type="password" v-model="form.password">
            </div>
        </div>
        <div class="uk-text-center">
            <button class="uk-button uk-button-primary" @click="auth.login(form)" :disabled='auth.loading'>Login</button>
        </div>
    </form>
</template>