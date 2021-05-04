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
                                             data-toggle="dropdown" to="/activities/create/"><em
                                    class="icon ni ni-plus"></em></router-link>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- .toggle-wrap -->
        </div>
        <br/>
        <loader first-time-only listen="activities/list">
        <div class="card card-bordered card-preview">
            <table class="table table-tranx">
                <thead>
                <tr class="tb-tnx-head">
                    <th>#ID</th>
                    <th>COVER</th>
                    <th>NAME</th>
                    <th>CREATED AT</th>
                    <th>ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="activity in activities" :key="activity.id" class="tb-tnx-item">
                    <td>
                        {{activity.id}}
                    </td>
                    <td>
                        <img class="user-avatar" :src="activity.cover_photo" :srcset="activity.cover_photo"
                             alt="logo">
                    </td>
                    <td>
                        {{activity.name}}
                    </td>
                    <td>
                        {{activity.created_at}}
                    </td>
                    <td class="tb-tnx-action">
                        <div class="dropdown">
                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                                class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                <ul class="link-list-plain">
                                    <li>
                                        <router-link
                                            :to="{path: '/activities/create/'+activity.id}">
                                            Edit
                                        </router-link>
                                    </li>
                                    <li><a @click="removeActivity(activity)">Remove</a></li>
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
            this.getActivities({});
        },
        computed: {
            ...mapGetters({
                activities: 'activities/activities'
            })
        },
        methods: {
            ...mapActions({
                getActivities: 'activities/getActivities',
                deleteActivities: 'activities/deleteActivities'
            }),
            removeActivity(activity) {
                this.deleteActivities(activity);
            }

        }
    }
</script>
