<script setup>
import NavBar from '../components/NavBar.vue'
import FooterContent from '../components/FooterContent.vue'
</script>

<template>
    <NavBar />
    <UFMainContent>
        <slot></slot>
    </UFMainContent>
    <FooterContent />
</template>
