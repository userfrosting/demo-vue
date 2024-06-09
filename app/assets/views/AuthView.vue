<script setup>
import LayoutPage from '../layouts/LayoutPage.vue'
import AuthCheck from '../components/Auth/AuthCheck.vue'
import Login from '../components/Auth/AuthLogin.vue'
import Logout from '../components/Auth/AuthLogout.vue'
import { useAuthStore } from '../stores/auth'
const auth = useAuthStore()
</script>

<template>
    <LayoutPage>
        <h1 class="uk-heading-divider">Authentication Test</h1>
        <div class="uk-grid-divider uk-child-width-expand@s" uk-grid>
            <div v-if="auth.isAuth">
                <Logout />
            </div>
            <div v-else>
                <Login />
            </div>
            <div>
                <AuthCheck />
            </div>
        </div>
    </LayoutPage>
</template>
