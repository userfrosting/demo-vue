<script setup>
import axios from 'axios'
import { ref } from 'vue'

// Variables
const resources = ref([])
const loading = ref(false)

// Methods 
function getList() {
    loading.value = true
    axios.get('/api').then((response) => {
        resources.value = response.data
        loading.value = false
    })
}

// Initial load
getList()
</script>

<template>
    <ul class="uk-list">
        <li v-for="item in resources">
            <a class="uk-button uk-button-default" :href="item.url">#{{ item.number }} - {{ item.title }}</a>
        </li>
    </ul>
    <button class="uk-button uk-button-primary" @click="getList()" :disabled='loading'>Reload Resources</button>
</template>