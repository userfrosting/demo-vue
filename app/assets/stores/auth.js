// store.js
import { reactive } from "vue";
import axios from "axios";

export const auth = reactive({
    loading: false,
    auth: false,
    user: null,
    error: null,
    login(form) {
        this.loading = true;
        this.error = null;
        axios
            .post("/auth/login", form)
            .then(() => {
                this.check();
            })
            .catch((error) => {
                this.error = error.response.data;
            })
            .finally(() => {
                this.loading = false;
            });
    },
    logout() {
        this.loading = true;
        axios
            .get("/auth/logout")
            .then(() => {
                this.check();
            })
            .finally(() => {
                this.loading = false;
            });
    },
    check() {
        this.loading = true;
        axios
            .get("/auth/check")
            .then((response) => {
                this.user = response.data.user;
                this.auth = response.data.auth;
            })
            .finally(() => {
                this.loading = false;
            });
    },
});
