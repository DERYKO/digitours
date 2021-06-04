<template>
    <div id="app">
        <app-content v-if="isLoggedIn && $route.meta.admin"/>
        <home-content v-if="isLoggedIn && $route.meta.guest"/>
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
