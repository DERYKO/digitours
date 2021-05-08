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
                                <button class="dropdown-toggle btn btn-icon btn-primary" @click="addNewContact"><em
                                    class="icon ni ni-plus"></em></button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- .toggle-wrap -->
        </div>
        <br/>
        <el-dialog title="Contact Form"  :visible.sync="dialogVisible" @before-close="this.$store.commit('openModal',false)">
            <form @submit.prevent="saveContact">
                <div class="form-group">
                    <label class="form-label" for="contact_type">Type</label>
                    <div class="form-control-wrap">
                        <select v-model="contact.contact_type_id" id="contact_type"
                                class="form-select form-control" data-search="on" required>
                            <option v-for="type in contact_types" :key="type.id" :value="type.id">
                                {{type.name}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="value">Contact Value</label>
                    <div class="form-control-wrap">
                        <input v-model="contact.value" type="text" class="form-control" id="value" required>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary">Save Contact</button>
                </div>
            </form>
        </el-dialog>
        <loader first-time-only listen="travel_destinations/edit">
            <span style="font-size: 18px;font-weight: bold"><img :src="travel_destination.logo" style="height: 30px;width: 30px"/>  {{travel_destination.name}}</span>
            <div class="card card-bordered card-preview">
                <table class="table table-tranx">
                    <thead>
                    <tr class="tb-tnx-head">
                        <th>#ID</th>
                        <th>TYPE</th>
                        <th>VALUE</th>
                        <th>CREATED AT</th>
                        <th>ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="contact in travel_destination.contacts" :key="contact.id" class="tb-tnx-item">
                        <td>
                            {{contact.id}}
                        </td>
                        <td>
                            {{contact.contact_type.name}}
                        </td>
                        <td>
                            {{contact.value}}
                        </td>
                        <td>
                            {{contact.created_at}}
                        </td>
                        <td class="tb-tnx-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                                    class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li>
                                            <a @click="editContact(contact)">Edit</a>
                                        </li>
                                        <li><a @click="removeSubActivity(contact)">Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td
                            v-if="travel_destination.contacts.length === 0"
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
                this.getContactTypes({});
                this.getTravelDestination(this.$route.params.id);
            }
        },
        data() {
            return {
                contact: {}
            }
        },
        computed: {
            ...mapGetters({
                dialogVisible: 'dialogVisible',
                contact_types: 'contact_types/contact_types',
                travel_destination: 'travel_destinations/travel_destination'
            })
        },
        methods: {
            ...mapActions({
                getContactTypes: 'contact_types/getContactTypes',
                getTravelDestination: 'travel_destinations/getTravelDestination',
                createTravelDestinationContact: 'travel_destinations/createTravelDestinationContact',
                updateTravelDestinationContact: 'travel_destinations/updateTravelDestinationContact'
            }),
            addNewContact() {
                this.$store.commit('openModal', true);
            },
            editContact(contact) {
                this.$store.commit('openModal', true);
                this.contact = Object.assign({}, this.contact, contact);
            },
            saveContact() {
                this.contact.travel_destination_id = this.$route.params.id;
                if (this.contact.id) {
                    this.updateTravelDestinationContact(this.contact).then(()=>{
                        this.$store.commit('openModal',false)
                    });
                } else {
                    this.createTravelDestinationContact(this.contact).then(()=>{
                        this.$store.commit('openModal',false)
                    });
                }
            }
        }

    }
</script>
