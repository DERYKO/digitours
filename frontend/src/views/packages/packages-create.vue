<template>
    <div>
        <loader first-time-only listen="packages/edit">
            <form action="#" class="gy-3">
                <div class="row g-3">
                    <div class="col-lg-7">
                        <div class="form-group mt-2">
                            <el-button style="margin-top: 12px;" type="success" v-show="step!==0" @click="previous"><i
                                class="el-icon-arrow-left"/> Previous
                            </el-button>
                            <el-button style="margin-top: 12px;" type="primary" @click="next">
                                {{step === 7 ? "Submit" : "Next Step"}} <i class="el-icon-arrow-right"/>
                            </el-button>
                        </div>
                    </div>
                </div>
                <el-steps :active="step">
                    <el-step title="Package" icon="el-icon-edit">
                    </el-step>
                    <el-step title="Activities" icon="el-icon-dish">
                    </el-step>
                    <el-step title="Itinerary" icon="el-icon-dish">
                    </el-step>
                    <el-step title="Inclusive" icon="el-icon-edit">
                    </el-step>
                    <el-step title="Exclusive" icon="el-icon-edit">
                    </el-step>
                    <el-step title="Requirements" icon="el-icon-edit">
                    </el-step>
                    <el-step title="Costs" icon="el-icon-edit">
                    </el-step>
                    <el-step title="Policy" icon="el-icon-notebook-2"></el-step>
                </el-steps>
                <div v-show="step === 0">
                    <div class="row g-1 align-center">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label">Cover Photo</label>
                                <span class="form-note">Upload a cover photo for the activity</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"
                                                  @vdropzone-file-added="sendingFile"></vue-dropzone>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <span class="form-note">Kindly add a description </span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                <textarea placeholder="Description" class="form-control" cols="3" rows="5"
                                          v-model="form.description">
                                </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-show="step === 1">
                    <div class="row">
                        <div v-masonry transition-duration="0.3s" item-selector=".item" :origin-top="true"
                             :horizontal-order="false">
                            <div class="row">
                                <div v-masonry-tile class="col-sm-4" :key="sub_activity.id"
                                     v-for="sub_activity in sub_activities">
                                    <div class="card m-4" style="width: 350px;">
                                        <img class="card-img-top" :src="sub_activity.cover_photo"
                                             :srcset="sub_activity.cover_photo"
                                             style="width: 350px; height: 300px"
                                             alt="logo">
                                        <div class="card-body">
                                            <label :for="''+sub_activity.id"> {{sub_activity.name}}</label>
                                            <input class="form-control align-start" type="checkbox"
                                                   :id="''+sub_activity.id" :value="sub_activity.id"
                                                   v-model="form.sub_activities">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-show="step === 2">
                    <div class="row g-3 align-start">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label">Itinerary</label>
                                <span class="form-note">Paste the itinerary on the text editor or type</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <ckeditor v-model="form.itinerary"></ckeditor>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-show="step === 3">
                    <div class="row g-3 align-start">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label">Package Inclusive</label>
                                <span class="form-note">Paste the inclusive's on the text editor or type</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <ckeditor v-model="form.inclusive"></ckeditor>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-show="step === 4">
                    <div class="row g-3 align-start">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label">Exclusive</label>
                                <span class="form-note">Paste the exclusives's on the text editor or type</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <ckeditor v-model="form.exclusive"></ckeditor>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-show="step === 5">
                    <div class="row g-3 align-start">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label">Requirements</label>
                                <span class="form-note">Paste the requirements on the text editor or type</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <ckeditor v-model="form.requirements"></ckeditor>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-show="step === 6">
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">
                                        <div class="dropdown">
                                            <button type="button" @click="$store.commit('openModal',true)" class="dropdown-toggle btn btn-icon btn-primary"><em
                                                class="icon ni ni-plus"></em></button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .toggle-wrap -->
                    </div>
                    <br/>
                    <el-dialog title="Package Cost Form"  :visible.sync="dialogVisible" @before-close="$store.commit('openModal',false)">
                        <form @submit.prevent="saveCost">
                            <div class="form-group">
                                <label class="form-label" for="value">Description</label>
                                <div class="form-control-wrap">
                                    <input v-model="description" type="text" class="form-control" id="value" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="cost">Cost</label>
                                <div class="form-control-wrap">
                                    <input v-model="cost" type="number" class="form-control" id="cost" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="minimum_deposit">Minimum Deposit</label>
                                <div class="form-control-wrap">
                                    <input v-model="minimum_deposit" type="number" class="form-control" id="minimum_deposit" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary">Save Cost</button>
                            </div>
                        </form>
                    </el-dialog>
                    <div class="card card-bordered card-preview">
                    <table class="table table-tranx">
                        <thead>
                        <tr class="tb-tnx-head">
                            <th>DESCRIPTION</th>
                            <th>COST</th>
                            <th>DEPOSIT</th>
                            <th>ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(cost,index) in form.costs" :key="index" class="tb-tnx-item">
                            <td>
                                {{cost.description}}
                            </td>
                            <td>
                                {{cost.cost}}
                            </td>
                            <td>
                                {{cost.minimum_deposit}}
                            </td>
                            <td>
                                <button type="button" @click="removeCost(index)" class="btn btn-sm btn-danger">Remove</button>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td
                                v-if="form.costs.length === 0"
                                class="text-center"
                                colspan="4"
                            >
                                No records
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    </div>
                </div>
                <div v-show="step === 7">
                    <div class="row g-3 align-start">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label">Policy</label>
                                <span class="form-note">Paste the policy on the text editor or type</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <ckeditor v-model="form.policy"></ckeditor>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </loader>
    </div>
</template>
<script>
    import {mapActions, mapGetters} from 'vuex';
    import CKEditor from 'ckeditor4-vue';
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
        components: {
            vueDropzone: vue2Dropzone,
            ckeditor: CKEditor.component
        },
        created() {
            this.getSubActivities({});
            this.getActivities({});
            if (this.$route.params.id) {
                this.getTravelDestinationPackage(this.$route.params.id).then(() => {
                    this.form = this.travel_destination_package;
                    this.form.costs = this.travel_destination_package.package_cost;
                    this.form.sub_activities = this.travel_destination_package.package_sub_activity.map(i => i.sub_activity_id);
                    this.form.policy = this.travel_destination_package.package_policy ? this.travel_destination_package.package_policy.policy : '';
                    this.form.inclusive = this.travel_destination_package.package_inclusive ? this.travel_destination_package.package_inclusive.inclusive : '';
                    this.form.exclusive = this.travel_destination_package.package_exclusive ? this.travel_destination_package.package_exclusive.exclusive : '';
                    this.form.requirements = this.travel_destination_package.package_requirement ? this.travel_destination_package.package_requirement.requirements : '';
                    this.form.requirements = this.travel_destination_package.package_requirement ? this.travel_destination_package.package_requirement.requirements : '';
                    this.form.itinerary = this.travel_destination_package.package_itinerary ? this.travel_destination_package.package_itinerary.itinerary : '';
                    let file = {size: 123, name: "Icon", type: "image/jpeg"};
                    let url = this.form.cover_photo;
                    this.$refs.myVueDropzone.manuallyAddFile(file, url);
                });
            }
        },
        data() {
            return {
                step: 0,
                dropzoneOptions: {
                    maxFilesize: 5,
                    maxFiles: 1,
                    url: 'api/sample-sub_activity-upload',
                    autoProcessQueue: false,
                    thumbnailWidth: 150,
                    headers: {"My-Awesome-Header": "Click to upload an sub_activity"},
                    addRemoveLinks: true
                },
                form: {
                    sub_activities: [],
                    costs: []
                },
                cost:null,
                description: null,
                minimum_deposit: null
            }
        },
        computed: {
            ...mapGetters({
                dialogVisible: 'dialogVisible',
                sub_activities: 'activities/sub_activities',
                activities: 'activities/activities',
                travel_destination_package: 'packages/travel_destination_package'
            })
        },
        methods: {
            ...mapActions({
                getSubActivities: 'activities/getSubActivities',
                getActivities: 'activities/getActivities',
                updateTravelDestinationPackage: 'packages/updateTravelDestinationPackage',
                createTravelDestinationPackage: 'packages/createTravelDestinationPackage',
                getTravelDestinationPackage: 'packages/getTravelDestinationPackage',
            }),
            next() {
                if (this.step !== 7) {
                    this.step++
                } else {
                    this.form.travel_destination_id = this.$route.params.travel_destination_id;
                    if (this.form.id) {
                        this.updateTravelDestinationPackage(this.form);
                    } else {
                        this.createTravelDestinationPackage(this.form);
                    }
                }
            },
            previous() {
                this.step--
            },
            sendingFile(file) {
                this.form.cover_photo = file;
            },
            saveCost(){
                this.form.costs.push({cost: this.cost,minimum_deposit: this.minimum_deposit,description: this.description});
                this.form = {...this.form};
                this.cost = null;
                this.description = null;
                this.minimum_deposit = null;
                this.$store.commit('openModal',false);
            },
            removeCost(index){
                this.form.costs.splice(index,1);
                this.form = {...this.form};
            }
        }
    }
</script>
