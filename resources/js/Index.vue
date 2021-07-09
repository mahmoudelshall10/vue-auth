<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-white border-bottom navbar-light">
            <router-link class="navbar-brand mr-auto" :to="{ name: 'home' }"
                >LaravelBnb</router-link
            >

            <ul class="navbar-nav">
                <!-- <li class="nav-item" v-if="isLoggedIn">
                    <router-link :to="{ name: 'register' }" class="nav-link">
                        Register
                    </router-link>
                </li> -->

                <li class="nav-item" v-if="!isLoggedIn">
                    <router-link :to="{ name: 'register' }" class="nav-link">
                        Register
                    </router-link>
                </li>
                <li class="nav-item" v-if="!isLoggedIn">
                    <router-link class="nav-link" :to="{ name: 'login' }">
                        Sign-In
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link
                        class="btn nav-button"
                        :to="{ name: 'basket' }"
                    >
                        Basket
                        <span
                            v-if="itemsInBasket"
                            class="badge badge-secondary"
                            >{{ itemsInBasket }}</span
                        >
                    </router-link>
                </li>
                <li class="nav-item" v-if="isLoggedIn">
                    <a href="#" class="nav-link" @click.prevent="logout"
                        >Logout</a
                    >
                </li>
            </ul>
        </nav>

        <div class="container mt-4 mb-4 pt-4 pl-4">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapState } from "vuex";

export default {
    data() {
        return {
            lastSearch: this.$store.state.LastSearch
        };
    },
    computed: {
        ...mapState({
            // lastSearchComputed: state => state.LastSearch,
            lastSearchComputed: "lastSearch",
            isLoggedIn: "isLoggedIn"
        }),
        ...mapGetters({
            itemsInBasket: "itemsInBasket"
        })
    },
    methods: {
        async logout() {
            try {
                axios.post("/logout");
                this.$store.dispatch("logout");
            } catch (error) {
                this.$store.dispatch("logout");
            }
        }
    }
};
</script>
