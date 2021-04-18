<template>
    <div>
        <app-sidebar/>
        <div class="nk-main ">
            <div class="nk-wrap ">
                <app-header/>
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <router-view/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import AppHeader from './header.vue';
    import AppSidebar from "./sidebar.vue";
    import {mapActions} from "vuex";

    export default {
        components: {AppSidebar, AppHeader},
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
