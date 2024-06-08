<script setup>
import { useAuthStore } from '../stores/auth'
import { useLogoutApi } from '../composables/logoutApi'

const auth = useAuthStore()
const { logout } = useLogoutApi(auth)
</script>

<template>
    <UFNavBar title="Userfrosting">
        <UFNavBarItem to="/" label="Home" />
        <UFNavBarItem to="/about" label="About" />
        <UFNavBarItem to="/resources" label="Api Test" />
        <UFNavBarItem to="/auth" label="Login Test" />
        <UFNavBarUserCard
            v-if="auth.isAuth"
            :username="auth.user.full_name"
            :avatar="auth.user.avatar"
            :meta="auth.user.user_name">
            <UFNavBarUserCardButton label="Logout" @click="logout()" />
        </UFNavBarUserCard>
    </UFNavBar>
</template>
