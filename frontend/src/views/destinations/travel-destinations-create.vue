<template>
    <div>
        <form action="#" class="gy-3">
            <el-steps :active="step">
                <el-step title="Set up" icon="el-icon-edit">
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
            </div>
            <div v-show="step === 1">
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
        <div class="row g-3">
            <div class="col-lg-7">
                <div class="form-group mt-2">
                    <el-button style="margin-top: 12px;" type="success" v-show="step!==0" @click="previous">Previous
                    </el-button>
                    <el-button style="margin-top: 12px;" type="primary" @click="next">{{step === 1 ? 'Submit' : 'Next Step'}}</el-button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import {mapActions,mapGetters} from 'vuex';
    import CKEditor from 'ckeditor4-vue';
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
        components: {
            vueDropzone: vue2Dropzone,
            ckeditor: CKEditor.component
        },
        created() {
            if (this.$route.params.id) {
                this.getTravelDestination(this.$route.params.id).then(() => {
                    this.form = this.travel_destination;
                    this.form.policy = this.travel_destination.policy ?  this.travel_destination.policy.policy : '';
                    let file = {size: 123, name: "Icon", type: "image/jpeg"};
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
              travel_destination: 'travel_destinations/travel_destination'
          })
        },
        methods: {
            ...mapActions({
                updateTravelDestination: 'travel_destinations/updateTravelDestination',
                createTravelDestination: 'travel_destinations/createTravelDestination',
                getTravelDestination: 'travel_destinations/getTravelDestination',
            }),
            next() {
                if (this.step!==1){
                    this.step++
                }else{
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
        }
    }
</script>
