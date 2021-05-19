<template>
    <div>
        <form action="#" class="gy-3">
            <div class="row g-3">
                <div class="col-lg-7">
                    <div class="form-group mt-2">
                        <el-button style="margin-top: 12px;" type="success" v-show="step!==0" @click="previous"><i
                            class="el-icon-arrow-left"/> Previous
                        </el-button>
                        <el-button style="margin-top: 12px;" type="primary" @click="next">
                            {{ step === 2 ? "Submit" : "Next Step" }} <i class="el-icon-arrow-right"/>
                        </el-button>
                    </div>
                </div>
            </div>
            <el-steps :active="step">
                <el-step title="Set up" icon="el-icon-edit">
                </el-step>
                <el-step title="Activities" icon="el-icon-dish">
                </el-step>
                <el-step title="Policy" icon="el-icon-notebook-2"></el-step>
            </el-steps>
            <div v-show="step === 0">
                <div class="row g-3 align-center">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label" for="name">Name</label>
                            <span class="form-note">Specify the name of the destination.</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input v-model="form.name" type="text" class="form-control" id="name" required>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <label class="form-label">Main Website</label>
                            <span class="form-note">Specify the URL if your main website is external.</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input v-model="form.website" type="text" class="form-control" name="site-url">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-center">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label">Tags</label>
                            <span class="form-note">E.g. Nature,Water,Mall.</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <el-select
                                    v-model="form.tags"
                                    multiple
                                    collapse-tags
                                    style="width: 100%"
                                    placeholder="Select">
                                    <el-option
                                        v-for="activity in activities"
                                        :key="activity.id"
                                        :label="activity.name"
                                        :value="activity.id">
                                    </el-option>
                                </el-select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-center">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label">Location</label>
                            <span class="form-note">Map Address</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <vue-google-autocomplete
                            id="map"
                            classname="form-control"
                            placeholder="Start typing"
                            v-on:placechanged="getAddressData"
                            country="ke"
                        >
                        </vue-google-autocomplete>
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
                                        <label :for="''+sub_activity.id"> {{ sub_activity.name }}</label>
                                        <input class="form-control align-start" type="checkbox" :id="''+sub_activity.id"
                                               :value="sub_activity.id" v-model="form.sub_activities">
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
                            <label class="form-label" for="name">Policy</label>
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
    </div>
</template>
<script>
import {mapActions, mapGetters} from 'vuex';
import CKEditor from 'ckeditor4-vue';
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
import VueGoogleAutocomplete from 'vue-google-autocomplete'

export default {
    components: {
        vueDropzone: vue2Dropzone,
        ckeditor: CKEditor.component,
        VueGoogleAutocomplete: VueGoogleAutocomplete
    },
    created() {
        this.getSubActivities({});
        this.getActivities({});
        if (this.$route.params.id) {
            this.getTravelDestination(this.$route.params.id).then(() => {
                this.form = this.travel_destination;
                this.form.sub_activities = this.travel_destination.sub_activities.map(i => i.sub_activity_id);
                this.form.tags = this.travel_destination.tags.map(i => i.activity_id);
                this.form.policy = this.travel_destination.policy ? this.travel_destination.policy.policy : '';
                let file = {size: 123, name: "Icon", type: "sub_activity/jpeg"};
                let url = this.form.logo;
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
                sub_activities: []
            }
        }
    },
    computed: {
        ...mapGetters({
            sub_activities: 'activities/sub_activities',
            activities: 'activities/activities',
            travel_destination: 'travel_destinations/travel_destination'
        })
    },
    methods: {
        ...mapActions({
            getSubActivities: 'activities/getSubActivities',
            getActivities: 'activities/getActivities',
            updateTravelDestination: 'travel_destinations/updateTravelDestination',
            createTravelDestination: 'travel_destinations/createTravelDestination',
            getTravelDestination: 'travel_destinations/getTravelDestination',
        }),
        next() {
            if (this.step !== 2) {
                this.step++
            } else {
                if (this.form.id) {
                    this.updateTravelDestination(this.form);
                } else {
                    this.createTravelDestination(this.form);
                }
            }
        },
        previous() {
            this.step--
        },
        sendingFile(file) {
            this.form.logo = file;
        },
        getAddressData(addressData, placeResultData, id) {
            this.form.address = placeResultData.formatted_address;
            this.form.latitude = addressData.latitude;
            this.form.longitude = addressData.latitude;
            this.form.map_label = id;
            this.form.country = addressData.country;
            this.form.region = addressData.administrative_area_level_1
            this.form.locality = addressData.locality
            this.form.route = addressData.route
        }
    }
}
</script>
