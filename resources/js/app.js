require("./bootstrap");

import Vue from "vue";
import Vuex from "vuex";
import moment from "momnet";
import VueRouter from "vue-router";
import router from "./routes";
import Index from "./Index";
import StarRating from "./shared/components/StarRating";
import FatalError from "./shared/components/FatalError";
import ValidationErrors from "./shared/components/ValidationErrors";
import Success from "./shared/components/Success";
import storeDefinition from "./store";

window.Vue = Vue;
Vue.use(VueRouter);
Vue.use(Vuex);

// filter globally
Vue.filter("fromNow", value => moment(value).fromNow());
// globlly registration
Vue.component("star-rating", StarRating);
Vue.component("fatal-error", FatalError);
Vue.component("v-errors", ValidationErrors);
Vue.component("success", Success);

const store = new Vuex.Store(storeDefinition);

window.axios.interceptors.response.use(
    response => response,
    error => {
        if (401 === error.response.status) {
            store.dispatch("store");
        }
        return Promise.reject(error);
    }
);

const app = new Vue({
    el: "#app",
    router,
    store,
    components: {
        index: Index
    },
    async beforeCreate() {
        this.$store.dispatch("loadStoredState");
        this.$store.dispatch("loadUser");
    }
});
