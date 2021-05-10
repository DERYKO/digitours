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
                                             data-toggle="dropdown" to="/users/create/"><em
                                    class="icon ni ni-plus"></em></router-link>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- .toggle-wrap -->
        </div>
        <br/>users
        <loader first-time-only listen="users/list">
            <div class="card card-bordered card-preview">
                <table class="table table-tranx table-responsive-sm">
                    <thead>
                    <tr class="tb-tnx-head">
                        <th>#ID</th>
                        <th>COVER</th>
                        <th>NAME</th>
                        <th>PHONE</th>
                        <th>EMAIL</th>
                        <th>CREATED AT</th>
                        <th>ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user in users.data" :key="user.id" class="tb-tnx-item">
                        <td>
                            {{user.id}}
                        </td>
                        <td>
                            <img class="user-avatar" :src="user.photo" :srcset="user.photo"
                                 alt="logo">
                        </td>
                        <td>
                            {{user.name}}
                        </td>
                        <td>
                            {{user.phone}}
                        </td>
                        <td>
                            {{user.email}}
                        </td>
                        <td>
                            {{user.created_at}}
                        </td>
                        <td class="tb-tnx-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                                    class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li>
                                            <router-link
                                                :to="{path: '/users/create/'+user.id}">
                                                Edit
                                            </router-link>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td
                            v-if="users.data.length === 0"
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
            this.getUsers({});
        },
        computed: {
            ...mapGetters({
                users: 'profile/users'
            })
        },
        methods: {
            ...mapActions({
                getUsers: 'profile/getUsers',
                deleteUsers: 'profile/deleteUsers'
            }),
            removeActivity(user) {
                this.deleteUsers(user);
            }

        }
    }
</script>
