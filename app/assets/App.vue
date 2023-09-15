<script setup>
import UIkit from 'uikit'
import Icons from 'uikit/dist/js/uikit-icons'
import Navbar from '@/components/Navbar.vue'

UIkit.use(Icons);
</script>

<template>
    <header>
        <Navbar title="Userfrosting" />
    </header>
    <RouterView />
</template>

<style lang="less">
@import "less/uf-theme.less";
</style>
