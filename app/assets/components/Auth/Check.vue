<script setup>
import { useAuthStore } from '../../stores/auth.js'
const auth = useAuthStore()
auth.check()
</script>

<template>
    <h2>Auth Check</h2>
    <div class="uk-container uk-text-center">
        <p style="font-size: 100px;">
            <font-awesome-icon class="uk-text-success" v-if="auth.auth" :icon="['fas', 'circle-check']" />
            <font-awesome-icon class="uk-text-danger" v-else="auth.auth" :icon="['fas', 'circle-xmark']" />
        </p>
        <p v-if="auth.auth">
            <img :src="auth.user.avatar" class="uk-margin-right" width="50" height="50">
            <span class="uk-text-middle"><strong>Username:</strong> {{ auth.user.user_name }}</span>
        </p>
        <p>
            <button class="uk-button uk-button-primary" @click="auth.check()" :disabled='auth.loading'>
                Check Authentication
            </button>
        </p>
    </div>
</template>