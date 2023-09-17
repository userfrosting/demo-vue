<script setup>
import { auth } from '../../stores/auth.js'
auth.check()
</script>

<template>
    <h2>Auth Check</h2>
    <div class="uk-container uk-text-center">
        <p>
            <span v-if="auth.auth" uk-icon="icon: check; ratio: 4"></span>
            <span v-else='auth.auth' uk-icon="icon: close; ratio: 4"></span>
        </p>
        <p v-if="auth.auth">
            <strong>Username:</strong> {{ auth.user.user_name }}
        </p>
        <p>
            <button class="uk-button uk-button-primary" @click="auth.check()" :disabled='auth.loading'>
                Check Authentication
            </button>
        </p>
    </div>
</template>