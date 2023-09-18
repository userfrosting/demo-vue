/** Create App */
import { createApp } from 'vue'
import App from '@/App.vue'
const app = createApp(App)

/** Setup Pinia */
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)
app.use(pinia)

/** Setup FontAwesome */
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { fas } from "@fortawesome/free-solid-svg-icons";
import { fab } from "@fortawesome/free-brands-svg-icons";
import { far } from "@fortawesome/free-regular-svg-icons";
library.add(fas, fab, far);
app.component('font-awesome-icon', FontAwesomeIcon)

/** Setup Router */
import router from '@/router'
app.use(router)

// Done
app.mount('#app')