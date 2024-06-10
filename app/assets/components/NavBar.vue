<script setup>
import { useLogoutApi } from '../composables/logoutApi'
import { useAuthStore } from '../stores/auth'

// Logout API variables
const auth = useAuthStore()
const { logout } = useLogoutApi(auth)
</script>

<template>
    <UFNavBar title="Userfrosting">
        <UFNavBarItem :to="{ name: 'home' }" label="Home" />
        <UFNavBarItem :to="{ name: 'about' }" label="About" />
        <UFNavBarItem to="/alert" label="Alert" />
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
