<script setup>
import { MainContent } from '@userfrosting/theme-pink-cupcake/Content'
import { NavBar } from '@userfrosting/theme-pink-cupcake/NavBar'
import { NavBarItem } from '@userfrosting/theme-pink-cupcake/NavBar'
</script>

<template>
    <NavBar title="Userfrosting">
        <NavBarItem to="/" label="Home" />
        <NavBarItem to="/about" label="About" />
        <NavBarItem to="/resources" label="Api Test" />
        <NavBarItem to="/auth" label="Login Test" />
    </NavBar>
    <MainContent>
        <RouterView />
    </MainContent>
</template>

