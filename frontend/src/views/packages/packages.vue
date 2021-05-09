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
                                <router-link class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown" :to="'/packages/'+$route.params.id+'/create/'"><em
                                    class="icon ni ni-plus"></em></router-link>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- .toggle-wrap -->
        </div>
        <br/>
        <loader first-time-only listen="packages/list">
            <div class="card card-bordered card-preview">
                <table class="table">
                    <thead>
                    <tr class="tb-tnx-head">
                        <th>#ID</th>
                        <th>COVER</th>
                        <th>DESCRIPTION</th>
                        <th>CREATED AT</th>
                        <th>ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in packages" :key="item.id">
                        <td>
                            {{item.id}}
                        </td>
                        <td>
                            <img class="user-avatar" :src="item.cover_photo" :srcset="item.cover_photo"
                                 alt="logo">
                        </td>
                        <td>
                            {{item.description}}
                        </td>
                        <td>
                            {{item.created_at}}
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                                    class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li>
                                            <router-link
                                                :to="{path: '/packages/'+$route.params.id+'/create/'+item.id}">
                                                Edit
                                            </router-link>
                                        </li>
                                        <li><a @click="removePackage(item)">Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td
                            v-if="packages.length === 0"
                            class="text-center"
                            colspan="5"
                        >
                            No records
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </loader>
    </div>
</template>
<script>
    import {mapActions, mapGetters} from 'vuex';
    export default {
        created() {
            if (this.$route.params.id) {
                this.getPackages({travel_destination_id: this.$route.params.id});
            }
        },
        computed: {
            ...mapGetters({
                packages: 'packages/packages'
            })
        },
        methods: {
            ...mapActions({
                getPackages: 'packages/getPackages',
                deletePackages: 'packages/deletePackages'
            }),
            removePackage(item) {
                this.deletePackages({id: item.id,travel_destination_id: this.$route.params.id});
            }

        }
    }
</script>
