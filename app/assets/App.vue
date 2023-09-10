<script setup>
import UIkit from 'uikit'
import Icons from 'uikit/dist/js/uikit-icons'
import Navbar from './components/Navbar.vue'

UIkit.use(Icons);
</script>

<template>
    <header>
        <Navbar title="Website Title" />
    </header>
    <RouterView />
</template>

<style lang="less">
@import "uikit/src/less/uikit.theme.less";
</style>
