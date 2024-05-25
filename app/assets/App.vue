<script setup>
import { useAuthStore } from './stores/auth.js'
const auth = useAuthStore()
</script>

<template>
    <UFNavBar title="Userfrosting">
        <UFNavBarItem to="/" label="Home" />
        <UFNavBarItem to="/about" label="About" />
        <UFNavBarItem to="/resources" label="Api Test" />
        <UFNavBarItem to="/auth" label="Login Test" />
        <UFNavBarUserCard
            v-if="auth.auth"
            :username="auth.user.full_name"
            :avatar="auth.user.avatar"
            :meta="auth.user.user_name">
            <UFNavBarUserCardButton label="Logout" @click="auth.logout()" />
        </UFNavBarUserCard>
    </UFNavBar>
    <UFMainContent>
        <RouterView />
    </UFMainContent>
    <UFFooterContent>
        Copyright 2024 - <a href="https://www.userfrosting.com">Created by UserFrosting</a> | Built
        with
        <a href="http://getuikit.com" title="Visit UIkit 3 site" target="_blank" data-uk-tooltip
            ><span data-uk-icon="uikit"></span
        ></a>
    </UFFooterContent>
</template>
