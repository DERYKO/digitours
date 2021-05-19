<template>
    <div id="app">
        <app-content v-if="isLoggedIn && $route.path!=='/home'"/>
        <home-content v-if="isLoggedIn && $route.path==='/home'"/>
        <router-view v-if="!isLoggedIn"/>

    </div>
</template>
<script>
import AppContent from './views/layout/content';
import HomeContent from './views/layout/home-content';
export default {
    components: {AppContent,HomeContent},
    computed: {
        isLoggedIn() {
            return this.$store.getters['profile/loggedIn'];
        },
    }
};
</script>
