// store.js
import { defineStore } from "pinia";
import axios from "axios";

export const useAuthStore = defineStore("auth", {
    state: () => {
        return {
            loading: false,
            user: null,
            error: null,
        };
    },
    getters: {
        auth: (state) => state.user !== null,
    },
    actions: {
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
                    this.user = null;
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
                })
                .finally(() => {
                    this.loading = false;
                });
        },
    },
});
