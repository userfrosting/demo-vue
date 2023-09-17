<script setup>
import axios from 'axios'
import { ref } from 'vue'
import Alert from '../components/Alert.vue'

// Variables
const user = ref(null)
const loading = ref(false)
const auth = ref(false)
const alert = ref(null)
let form = {
    user_name: '',
    password: ''
}

// Methods 
function checkAuth() {
    loading.value = true
    axios.get('/auth/check').then((response) => {
        user.value = response.data.user
        auth.value = response.data.auth
    })
    .finally(() => {
        loading.value = false
    })
}

function login() {
    loading.value = true
    alert.value = null
    axios.post('/auth/login', form)
        .then(() => {
            checkAuth()
        }).catch((error) => {
            alert.value = error.response.data
        })
        .finally(() => {
            loading.value = false
        })
}

function logout() {
    loading.value = true
    axios.get('/auth/logout')
        .then(() => {
            user.value = null
            auth.value = false
        })
        .finally(() => {
            loading.value = false
        })
}

// Initial load
checkAuth()
</script>

<template>
    <div class="uk-container">
        <h1 class="uk-heading-divider">Authentication Test</h1>
        <div class="uk-grid-divider uk-child-width-expand@s" uk-grid>
            <div v-if="auth">
                <div class="uk-margin uk-text-center">
                    <button class="uk-button uk-button-default" @click="logout()" :disabled='loading'>Logout</button>
                </div>
            </div>
            <div v-else="auth">
                <h2>Login</h2>
                <form class="uk-form-horizontal">
                    <Alert :alert="alert" />
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-username">Username</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-horizontal-username" type="text" v-model="form.user_name">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-password">Password</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-horizontal-password" type="password" v-model="form.password">
                        </div>
                    </div>
                    <div class="uk-margin uk-text-center">
                        <button class="uk-button uk-button-primary" @click="login()" :disabled='loading'>Login</button>
                    </div>
                </form>
            </div>
            <div>
                <h2>Auth Check</h2>
                <div class="uk-container uk-text-center">
                    <p>
                        <span v-if="auth" uk-icon="icon: check; ratio: 4"></span>
                        <span v-else='auth' uk-icon="icon: close; ratio: 4"></span>
                    </p>
                    <p>
                        <button class="uk-button uk-button-primary" @click="checkAuth()" :disabled='loading'>Check Authentication</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>