<script setup>
import { useLogoutApi } from '../../composables/logoutApi'
import { useAuthStore } from '../../stores/auth'

// Logout API variables
const auth = useAuthStore()
const { loading, logout } = useLogoutApi(auth)
</script>

<template>
    <div class="uk-margin uk-text-center">
        <button class="uk-button uk-button-default" @click="logout()" :disabled="loading">
            Logout
        </button>
    </div>
</template>
