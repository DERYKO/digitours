<template>
    <div id="app">
        <app-content v-if="isLoggedIn" />
        <router-view v-if="!isLoggedIn" />
    </div>
</template>


<script>
    import AppContent from './views/layout/content';
    export default {
        components: { AppContent },
        computed: {
            isLoggedIn() {
                return this.$store.getters['profile/loggedIn'];
            },
        }
    };
</script>
