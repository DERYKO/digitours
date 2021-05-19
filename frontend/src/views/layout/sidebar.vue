<template>
    <div class="nk-sidebar is-light " data-content="sidebarMenu">
        <div class="nk-sidebar-element nk-sidebar-head">
            <div class="nk-apps-brand">
                <router-link to="/dashboard" class="logo-link">
                    <img src="../../assets/favicon.png"
                         srcset="../../assets/favicon.png 2x" alt="logo-dark">
                </router-link>
            </div>
            <div class="nk-menu-trigger mr-n2">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
                <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                   data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
        </div><!-- .nk-sidebar-element -->
        <div class="nk-sidebar-element" data-simplebar="">
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-menu" data-simplebar>
                    <ul class="nk-menu">
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Navigation</h6>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <router-link to="/dashboard" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                <span class="nk-menu-text">Dashboard</span>
                            </router-link>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <router-link to="/activities" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-task"></em></span>
                                <span class="nk-menu-text">Activities</span>
                            </router-link>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <router-link to="/sub-activities" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-b-safari"></em></span>
                                <span class="nk-menu-text">Sub Activities</span>
                            </router-link>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <router-link to="/destinations" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-umbrela"></em></span>
                                <span class="nk-menu-text">Travel Destinations</span>
                            </router-link>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Settings</h6>
                        </li><!-- .nk-menu-heading -->
                        <li class="nk-menu-item">
                            <router-link to="/users" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                <span class="nk-menu-text">Users</span>
                            </router-link>
                        </li><!-- .nk-menu-item -->
                    </ul>
                </div>
            </div><!-- .nk-sidebar-content -->
        </div><!-- .nk-sidebar-element -->
    </div>

</template>
<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {
        data() {
            return {}
        },
        computed: {
            ...mapGetters({
                profile: 'profile/user',
            })
        },
        methods: {
            ...mapActions({
                logout: 'profile/logout',
            }),
        }
    }
</script>
