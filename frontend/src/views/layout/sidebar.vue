<template>
    <!--    <div class="nk-sidebar" data-content="sidebarMenu">-->
    <!--        <div class="nk-sidebar-bar">-->
    <!--            <div class="nk-apps-brand">-->
    <!--                <router-link to="/dashboard" class="logo-link">-->
    <!--                    <img src="../../assets/favicon.png"-->
    <!--                         srcset="../../assets/favicon.png 2x" alt="logo-dark">-->
    <!--                </router-link>-->
    <!--            </div>-->
    <!--            <div class="nk-sidebar-element">-->
    <!--                <div class="nk-sidebar-body">-->
    <!--                    <div class="nk-sidebar-content" data-simplebar>-->
    <!--                        <div class="nk-sidebar-menu">-->
    <!--                            &lt;!&ndash; Menu &ndash;&gt;-->
    <!--                            <ul class="nk-menu apps-menu">-->
    <!--                                <li class="nk-menu-item active">-->
    <!--                                    <a href="#" class="nk-menu-link nk-menu-switch" data-target="navDashboards"-->
    <!--                                       title="Dashboard">-->
    <!--                                        <span class="nk-menu-icon"><img src="https://icons.iconarchive.com/icons/awicons/vista-artistic/256/chart-icon.png"></span>-->
    <!--                                    </a>-->
    <!--                                </li>-->
    <!--                                <li class="nk-menu-item">-->
    <!--                                    <a href="#" class="nk-menu-link nk-menu-switch" data-target="navApps"-->
    <!--                                       title="Activities">-->
    <!--                                        <span class="nk-menu-icon"><img src="https://icons.iconarchive.com/icons/webalys/kameleon.pics/256/Clipboard-Plan-icon.png"></span>-->
    <!--                                    </a>-->
    <!--                                </li>-->
    <!--                                <li class="nk-menu-item">-->
    <!--                                    <a href="#" class="nk-menu-link nk-menu-switch" data-target="navPages"-->
    <!--                                       title="Travel Destinations">-->
    <!--                                        <span class="nk-menu-icon"><img src="https://icons.iconarchive.com/icons/itzikgur/my-seven/256/Travel-Baloon-icon.png"></span>-->
    <!--                                    </a>-->
    <!--                                </li>-->
    <!--                                <li class="nk-menu-item">-->
    <!--                                    <a href="#" class="nk-menu-link nk-menu-switch" data-target="navMisc"-->
    <!--                                       title="Collections">-->
    <!--                                        <span class="nk-menu-icon"><img src="https://icons.iconarchive.com/icons/hopstarter/sleek-xp-basic/256/Money-icon.png"></span>-->
    <!--                                    </a>-->
    <!--                                </li>-->
    <!--                                <li class="nk-menu-item">-->
    <!--                                    <a href="#" class="nk-menu-link nk-menu-switch" data-target="surveys"-->
    <!--                                       title="Surveys">-->
    <!--                                        <span class="nk-menu-icon"><img src="https://icons.iconarchive.com/icons/custom-icon-design/flatastic-9/256/Surveys-icon.png"></span>-->
    <!--                                    </a>-->
    <!--                                </li>-->
    <!--                                <li class="nk-menu-item">-->
    <!--                                    <router-link to="/customers" class="nk-menu-link nk-menu-switch" data-target="promotions" title="Promotions">-->
    <!--                                        <span class="nk-menu-icon"><img src="https://icons.iconarchive.com/icons/uiconstock/christmas-clipart/256/discount-tag-icon.png"></span>-->
    <!--                                    </router-link>-->
    <!--                                </li>-->
    <!--                            </ul>-->
    <!--                        </div>-->
    <!--                        <div class="nk-sidebar-footer">-->
    <!--                            <ul class="nk-menu nk-menu-md apps-menu">-->
    <!--                                <li class="nk-menu-item">-->
    <!--                                    <router-link to="/users" class="nk-menu-link" title="Users" data-target="users">-->
    <!--                                        <span class="nk-menu-icon"><img src="https://icons.iconarchive.com/icons/icons-land/vista-people/256/Groups-Meeting-Dark-icon.png"></span>-->
    <!--                                    </router-link>-->
    <!--                                </li>-->
    <!--                            </ul>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="nk-sidebar-main is-light">-->
    <!--            <div class="nk-sidebar-inner" data-simplebar>-->
    <!--                <div class="nk-menu-content menu-active" data-content="navDashboards">-->
    <!--                    <h5 class="title">Dashboard</h5>-->
    <!--                    <img src="../../assets/favicon.png" srcset="../../assets/favicon.png 2x" alt="logo-dark">-->
    <!--                </div>-->
    <!--                <div class="nk-menu-content" data-content="navApps">-->
    <!--                    <h5 class="title">Apps</h5>-->
    <!--                    <ul class="nk-menu">-->
    <!--                        <li class="nk-menu-item">-->
    <!--                            <router-link to="/activities" class="nk-menu-link">-->
    <!--                                <span class="nk-menu-icon"><em class="icon ni ni-inbox-fill"></em></span>-->
    <!--                                <span class="nk-menu-text">Activities</span>-->
    <!--                            </router-link>-->
    <!--                        </li>-->
    <!--                        <li class="nk-menu-item">-->
    <!--                            <router-link to="/sub-activities" class="nk-menu-link">-->
    <!--                                <span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span>-->
    <!--                                <span class="nk-menu-text">Sub Activities</span>-->
    <!--                            </router-link>-->
    <!--                        </li>-->
    <!--                    </ul>&lt;!&ndash; .nk-menu &ndash;&gt;-->
    <!--                </div>-->
    <!--                <div class="nk-menu-content" data-content="navPages">-->
    <!--                    <h5 class="title">Travel Destinations</h5>-->
    <!--                    <ul class="nk-menu">-->
    <!--                        <li class="nk-menu-item">-->
    <!--                            <router-link to="/destinations" class="nk-menu-link">-->
    <!--                                <span class="nk-menu-icon"><em class="icon ni ni-inbox-fill"></em></span>-->
    <!--                                <span class="nk-menu-text">Travel Destinations</span>-->
    <!--                            </router-link>-->
    <!--                        </li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--                <div class="nk-menu-content" data-content="navMisc">-->
    <!--                    <h5 class="title">Collections</h5>-->
    <!--                    <li class="nk-menu-item">-->
    <!--                        <router-link to="/collections" class="nk-menu-link">-->
    <!--                            <span class="nk-menu-icon"><em class="icon ni ni-inbox-fill"></em></span>-->
    <!--                            <span class="nk-menu-text">Collections</span>-->
    <!--                        </router-link>-->
    <!--                    </li>-->
    <!--                </div>-->
    <!--                <div class="nk-menu-content" data-content="surveys">-->
    <!--                    <h5 class="title">Surveys</h5>-->
    <!--                    <ul class="nk-menu">-->
    <!--                        <li class="nk-menu-item">-->
    <!--                            <router-link to="/product-categories" class="nk-menu-link"><span-->
    <!--                                class="nk-menu-text">Surveys</span></router-link>-->
    <!--                        </li>-->
    <!--                        <li class="nk-menu-item">-->
    <!--                            <router-link to="/product-brands" class="nk-menu-link"><span-->
    <!--                                class="nk-menu-text">Survey Responses</span></router-link>-->
    <!--                        </li>-->
    <!--                        <li class="nk-menu-item">-->
    <!--                            <router-link to="/products" class="nk-menu-link"><span-->
    <!--                                class="nk-menu-text">Survey Questions</span></router-link>-->
    <!--                        </li>-->
    <!--                        <li class="nk-menu-item">-->
    <!--                            <router-link to="/product-skus" class="nk-menu-link"><span-->
    <!--                                class="nk-menu-text">Survey Choices</span></router-link>-->
    <!--                        </li>-->
    <!--                    </ul>&lt;!&ndash; .nk-menu &ndash;&gt;-->
    <!--                </div>-->
    <!--                <div class="nk-menu-content" data-content="promotions">-->
    <!--                    <h5 class="title">Promotions</h5>-->
    <!--                    <ul class="nk-menu">-->
    <!--                        <li class="nk-menu-item">-->
    <!--                            <router-link to="/promotion-types" class="nk-menu-link"><span-->
    <!--                                class="nk-menu-text">Promotion Types</span></router-link>-->
    <!--                        </li>-->
    <!--                        <li class="nk-menu-item">-->
    <!--                            <router-link to="/promotions" class="nk-menu-link"><span-->
    <!--                                class="nk-menu-text">Promotions</span></router-link>-->
    <!--                        </li>-->
    <!--                    </ul>&lt;!&ndash; .nk-menu &ndash;&gt;-->
    <!--                </div>-->
    <!--                <div class="nk-menu-content" data-content="users">-->
    <!--                    <h5 class="title">Users</h5>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
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
                aa
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
