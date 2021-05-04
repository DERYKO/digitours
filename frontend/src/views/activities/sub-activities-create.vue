<template>
    <div>
        <loader first-time-only listen="sub_activities/edit">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="title nk-block-title">Sub Activities</h4>
                        <div class="nk-block-des">
                            <p>Kindly fill the form below to create/update an sub_activity.</p>
                        </div>
                    </div>
                </div>
                <div class="card card-bordered">
                    <div class="card-inner">
                        <form @submit.prevent="submitForm" class="gy-3">
                            <div class="row g-1 align-center">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Name</label>
                                        <span class="form-note">Sub Activity name</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input v-model="form.name" type="text" class="form-control" id="site-name"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-1 align-center">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Activity</label>
                                        <span class="form-note">link to an activity</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-control-wrap">
                                        <select v-model="form.activity_id" class="form-select form-control" data-search="on" required>
                                            <option v-for="activity in activities" :key="activity.id" :value="activity.id">{{activity.name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-1 align-center">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Cover Photo</label>
                                        <span class="form-note">Upload a cover photo for the sub activity</span>
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
                            <div class="row g-3">
                                <div class="col-lg-7">
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-lg btn-primary">{{form.id ? 'Update Sub Activity' : 'Create Sub Activity'}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- card -->
            </div>
        </loader>
    </div>
</template>
<script>
    import {mapActions, mapGetters} from 'vuex';
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
        components: {
            vueDropzone: vue2Dropzone
        },
        created() {
            this.getActivities({});
            if (this.$route.params.id) {
                this.getSubActivity(this.$route.params.id).then(() => {
                    this.form = this.sub_activity;
                    let file = {size: 123, name: "Icon", type: "image/jpeg"};
                    let url = this.sub_activity.cover_photo;
                    this.$refs.myVueDropzone.manuallyAddFile(file, url);
                });
            }
        },
        data() {
            return {
                dropzoneOptions: {
                    maxFilesize: 5,
                    maxFiles: 1,
                    url: 'api/sample-image-upload',
                    autoProcessQueue: false,
                    thumbnailWidth: 150,
                    headers: {"My-Awesome-Header": "Click to upload an image"},
                    addRemoveLinks: true
                },
                form: {}
            }
        },
        computed: {
            ...mapGetters({
                sub_activity: 'activities/sub_activity',
                activities: 'activities/activities'
            })
        },
        methods: {
            ...mapActions({
                getSubActivity: 'activities/getSubActivity',
                updateSubActivity: 'activities/updateSubActivity',
                createSubActivity: 'activities/createSubActivity',
                getActivities: 'activities/getActivities',
            }),
            sendingFile(file) {
                this.form.cover_photo = file;
            },
            submitForm() {
                if (this.form.id) {
                    this.updateSubActivity(this.form);
                } else {
                    this.createSubActivity(this.form);
                }
            }
        }
    }

</script>
