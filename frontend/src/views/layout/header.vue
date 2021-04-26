<template>
    <div  class="nk-header nk-header-fixed nk-header-fluid is-light">
        <div class="container-fluid">
            <div class="nk-header-wrap">
                <div class="nk-menu-trigger d-xl-none ml-n1">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                        class="icon ni ni-menu"></em></a>
                </div>
                <div class="nk-header-brand d-xl-none">
                    <router-link to="/dashboard" class="logo-link">
                        <img class="logo-light logo-img" src="../../assets/favicon.png" srcset="../../assets/favicon.png 2x"
                             alt="logo">
                        <img class="logo-dark logo-img" src="../../assets/favicon.png" srcset="../../assets/favicon.png 2x" alt="logo-dark">
                    </router-link>
                </div><!-- .nk-header-brand -->
                <div class="nk-header-search ml-3 ml-xl-0">
                    <em class="icon ni ni-search"></em>
                    <input v-model="search" type="text" class="form-control border-transparent form-focus-none"
                           placeholder="Search anything">
                </div><!-- .nk-header-news -->
                <div class="nk-header-tools">
                    <ul class="nk-quick-nav">
                        <li class="dropdown chats-dropdown hide-mb-xs">
                            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                <div class="icon-status icon-status-na"><em class="icon ni ni-comments"></em></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                <div class="dropdown-head">
                                    <span class="sub-title nk-dropdown-title">Recent Chats</span>
                                    <a href="#">Setting</a>
                                </div>
                                <div class="dropdown-foot center">
                                    <a>View All</a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown notification-dropdown">
                            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                <div class="dropdown-head">
                                    <span class="sub-title nk-dropdown-title">Notifications</span>
                                    <a href="#">Mark All as Read</a>
                                </div>
                                <div class="dropdown-foot center">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                                <div class="user-toggle">
                                    <div class="user-avatar sm">
                                        <em class="icon ni ni-user-alt"></em>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <div class="dropdown-inner user-card-wrap bg-lighter">
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            <span>DC</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="lead-text">{{profile.name}}</span>
                                            <span class="sub-text">{{profile.email}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li>
                                            <router-link to="/profile"><em class="icon ni ni-user-alt"></em><span>View Profile</span>
                                            </router-link>
                                        </li>
                                        <li>
                                            <router-link to="/account-setting"><em
                                                class="icon ni ni-setting-alt"></em><span>Account Setting</span>
                                            </router-link>
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a @click="logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- .nk-header-wrap -->
        </div><!-- .container-fliud -->
    </div>
</template>
<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {
        data() {
            return {
                search: ''
            };
        },
        watch: {
            search(val) {
                this.$emit('onSearch', val);
            }
        },
        methods: {
            ...mapActions({
                logout: 'profile/logout',
            }),
        },
        computed: {
            ...mapGetters({
                profile: 'profile/user',
            }),
        },
    };
</script>
