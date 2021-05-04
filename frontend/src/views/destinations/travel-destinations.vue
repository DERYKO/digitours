<template>
    <div class="col-sm-12">
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu" href="#"><em
                    class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li><a class="btn btn-white btn-outline-light" href="#"><em
                            class="icon ni ni-download-cloud"></em><span>Export</span></a></li>
                        <li class="nk-block-tools-opt">
                            <div class="dropdown">
                                <router-link class="dropdown-toggle btn btn-icon btn-primary"
                                             data-toggle="dropdown" to="/destinations/create/"><em
                                    class="icon ni ni-plus"></em></router-link>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- .toggle-wrap -->
        </div>
        <br/>
        <loader first-time-only listen="travel_destinations/list">
            <div class="card card-bordered card-preview">
                <table class="table table-tranx table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>LOGO</th>
                        <th>NAME</th>
                        <th>WEBSITE</th>
                        <th>DATE</th>
                        <th>CONTACTS</th>
                        <th>GALLERY</th>
                        <th>PACKAGES</th>
                        <th>ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="travel_destination in travel_destinations" :key="travel_destination.id">
                        <td>
                            {{travel_destination.id}}
                        </td>
                        <td>
                            <img class="user-avatar" :src="travel_destination.logo" :srcset="travel_destination.logo"
                                 alt="logo">
                        </td>
                        <td>
                            {{travel_destination.name}}
                        </td>
                        <td>
                            {{travel_destination.website}}
                        </td>
                        <td>
                            {{travel_destination.created_at}}
                        </td>
                        <td>
                            <router-link :to="{path: '/destination-contacts/'+travel_destination.id}">
                            <el-button  size="small" type="default"><i class="el-icon-phone el-icon-right"></i> Contacts</el-button>
                            </router-link>
                        </td>
                        <td>
                            <router-link :to="{path: '/destination-gallery/'+travel_destination.id}">
                            <el-button  size="small" type="default"><i class="el-icon-picture el-icon-right"></i> Gallery</el-button>
                            </router-link>
                        </td>
                        <td>
                            <router-link :to="{path: '/destination-packages/'+travel_destination.id}">
                            <el-button  size="small" type="default"><i class="el-icon-goods el-icon-right"></i> Packages</el-button>
                            </router-link>
                        </td>
                        <td class="tb-tnx-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                                    class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li>
                                            <router-link
                                                :to="{path: '/destinations/create/'+travel_destination.id}">
                                                Edit
                                            </router-link>
                                        </li>
                                        <li><a @click="removeTravelDestination(travel_destination)">Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </loader>
    </div>
</template>
<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {
        created() {
            this.getTravelDestinations({});
        },
        computed: {
            ...mapGetters({
                travel_destinations: 'travel_destinations/travel_destinations'
            })
        },
        methods: {
            ...mapActions({
                getTravelDestinations: 'travel_destinations/getTravelDestinations',
                deleteTravelDestinations: 'travel_destinations/deleteTravelDestinations'
            }),
            removeTravelDestination(travel_destination) {
                this.deleteTravelDestinations(travel_destination);
            }

        }
    }
</script>
