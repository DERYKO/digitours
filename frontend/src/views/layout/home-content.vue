<template>
    <div>
        <div class="nk-main">
            <app-header/>
            <div class="nk-content">
                <div class="container-fluid">
                        <router-view/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import AppHeader from './header.vue';
import {mapActions} from "vuex";

export default {
    components: {AppHeader},
    methods: {
        ...mapActions({
            getProfile: 'profile/getProfile',
        }),
    },
    created() {
        this.getProfile();
    },
}
</script>
