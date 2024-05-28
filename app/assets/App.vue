<script setup>
import NavBar from './components/NavBar.vue'
</script>

<template>
    <NavBar />
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
