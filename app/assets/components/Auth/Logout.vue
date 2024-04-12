<script setup>
import { useAuthStore } from '../../stores/auth.js'
const auth = useAuthStore()
</script>

<template>
    <div class="uk-margin uk-text-center">
        <button class="uk-button uk-button-default" @click="auth.logout()" :disabled="auth.loading">
            Logout
        </button>
    </div>
</template>
