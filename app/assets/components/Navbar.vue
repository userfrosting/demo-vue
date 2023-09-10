<script setup>
import { RouterLink } from 'vue-router'
defineProps({
    title: {
        type: String,
        required: true
    }
})
</script>

<template>
    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
        <div class="uk-navbar-container tm-navbar-container">
            <div class="uk-container uk-container-expand">
                <nav class="uk-navbar" uk-navbar>
                    <div class="uk-navbar-left">
                        <a href="/" class="uk-navbar-item uk-logo">{{ title }}</a>
                        <ul class="uk-navbar-nav">
                            <li>
                                <RouterLink to="/">Home</RouterLink>
                            </li>
                            <li>
                                <RouterLink to="/about">About</RouterLink>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>