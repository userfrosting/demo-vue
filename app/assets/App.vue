<script setup>
import { MainContent } from '@userfrosting/theme-pink-cupcake/Content'
import {
    NavBar,
    NavBarItem,
    NavBarUserCard,
    NavBarUserCardButton
} from '@userfrosting/theme-pink-cupcake/NavBar'
import { useAuthStore } from './stores/auth.js'
const auth = useAuthStore()
</script>

<template>
    <NavBar title="Userfrosting">
        <NavBarItem to="/" label="Home" />
        <NavBarItem to="/about" label="About" />
        <NavBarItem to="/resources" label="Api Test" />
        <NavBarItem to="/auth" label="Login Test" />
        <NavBarUserCard
            v-if="auth.auth"
            :username="auth.user.full_name"
            :avatar="auth.user.avatar"
            :meta="auth.user.user_name">
            <NavBarUserCardButton label="Logout" @click="auth.logout()" />
        </NavBarUserCard>
    </NavBar>
    <MainContent>
        <RouterView />
    </MainContent>
</template>
