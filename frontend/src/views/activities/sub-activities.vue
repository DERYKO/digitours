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
                                             data-toggle="dropdown" to="/sub-activities/create/"><em
                                    class="icon ni ni-plus"></em></router-link>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- .toggle-wrap -->
        </div>
        <br/>
        <loader first-time-only listen="sub_activities/list">
            <div class="card card-bordered card-preview">
                <table class="table table-tranx">
                    <thead>
                    <tr class="tb-tnx-head">
                        <th>#ID</th>
                        <th>COVER</th>
                        <th>NAME</th>
                        <th>ACTIVITY</th>
                        <th>CREATED AT</th>
                        <th>ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="sub_activity in sub_activities" :key="sub_activity.id" class="tb-tnx-item">
                        <td>
                            {{sub_activity.id}}
                        </td>
                        <td>
                            <img class="user-avatar" :src="sub_activity.cover_photo" :srcset="sub_activity.cover_photo"
                                 alt="logo">
                        </td>
                        <td>
                            {{sub_activity.name}}
                        </td>
                        <td>
                            {{sub_activity.activity ? sub_activity.activity.name: ''}}
                        </td>
                        <td>
                            {{sub_activity.created_at}}
                        </td>
                        <td class="tb-tnx-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                                    class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li>
                                            <router-link
                                                :to="{path: '/sub-activities/create/'+sub_activity.id}">
                                                Edit
                                            </router-link>
                                        </li>
                                        <li><a @click="removeSubActivity(sub_activity)">Remove</a></li>
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
            this.getSubActivities({});
        },
        computed: {
            ...mapGetters({
                sub_activities: 'activities/sub_activities'
            })
        },
        methods: {
            ...mapActions({
                getSubActivities: 'activities/getSubActivities',
                deleteSubActivities: 'activities/deleteSubActivities'
            }),
            removeSubActivity(sub_activity) {
                this.deleteSubActivities(sub_activity);
            }

        }
    }
</script>
