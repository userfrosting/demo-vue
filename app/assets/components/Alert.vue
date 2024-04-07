<script setup>
const props = defineProps({
    alert: Object
})
</script>

<template>
    <div class="uk-alert-danger" uk-alert v-if="alert !== null">
        <a class="uk-alert-close" uk-close @click="alert = null"></a>
        <h3>{{ alert.title }}</h3>
        <p v-html="alert.description"></p>
    </div>
</template>