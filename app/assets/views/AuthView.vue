<script setup>
import AuthCheck from '../components/Auth/Check.vue'
import Login from '../components/Auth/Login.vue'
import Logout from '../components/Auth/Logout.vue'
import { useAuthStore } from '../stores/auth.js'
const auth = useAuthStore()
</script>

<template>
    <div class="uk-container">
        <h1 class="uk-heading-divider">Authentication Test</h1>
        <div class="uk-grid-divider uk-child-width-expand@s" uk-grid>
            <div v-if="auth.auth">
                <Logout />
            </div>
            <div v-else="auth.auth">
                <Login />
            </div>
            <div>
                <AuthCheck />
            </div>
        </div>
    </div>
</template>