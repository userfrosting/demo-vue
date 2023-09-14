<script setup>
const resources = [
    {
        url: 'https://getbootstrap.com/docs/5.3/getting-started/introduction/',
        title: 'Bootstrap quick start guide'
    },
    {
        url: 'https://getbootstrap.com/docs/5.3/getting-started/webpack/',
        title: 'Bootstrap Webpack guide'
    },
    {
        url: 'https://getbootstrap.com/docs/5.3/getting-started/parcel/',
        title: 'Bootstrap Parcel guide'
    },
    {
        url: 'https://getbootstrap.com/docs/5.3/getting-started/vite/',
        title: 'Bootstrap Vite guide'
    },
    {
        url: 'https://getbootstrap.com/docs/5.3/getting-started/contribute/',
        title: 'Contributing to Bootstrap'
    },
]
</script>

<template>
    <ul class="uk-list">
        <li v-for="item in resources">
            <a class="uk-button uk-button-default" :href="item.url">{{ item.title }}</a>
        </li>
    </ul>
</template>