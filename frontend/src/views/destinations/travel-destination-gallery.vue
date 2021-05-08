<template>
    <div class="container">
        <loader first-time-only listen="travel_destinations/edit">

        <div class="row">
          <div class="col-sm-12">
              <span style="font-size: 18px;font-weight: bold"><img :src="travel_destination.logo" style="height: 30px;width: 30px"/>  {{travel_destination.name}}</span>
              <vue-dropzone class="card" @vdropzone-success="onFileUploadSuccess" ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
          </div>
          <div v-masonry transition-duration="0.3s" item-selector=".item" :origin-top="true" :horizontal-order="false">
              <div class="row">
                  <div v-masonry-tile class="col-sm-4" :key="image.id" v-for="image in travel_destination.gallery">
                      <div class="card m-4" style="width: 350px;">
                          <el-image
                              fit="fill"
                              style="width: 350px; height: 300px"
                              :src="image.file_path"
                              :preview-src-list="[image.file_path]">
                          </el-image>
                      </div>
                      <div class="card-body">
                          <el-button @click="removeTravelDestinationGallery(image)" size="small" type="danger"><i class="el-icon-delete el-icon-right"></i> Delete</el-button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        </loader>
    </div>
</template>
<script>
    import {mapActions,mapGetters} from 'vuex';
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
        components: {
            vueDropzone: vue2Dropzone,
        },
        created() {
            if (this.$route.params.id) {
                this.getTravelDestination(this.$route.params.id);
            }
        },
        data() {
            return {
                response: "",
                dropzoneOptions: {
                    maxFilesize: 10,
                    maxFiles: 6,
                    url: '/api/destination-gallery?travel_destination_id=' + this.$route.params.id,
                    // autoProcessQueue: false,
                    thumbnailWidth: 150,
                    headers: {"My-Awesome-Header": "header value"},
                    addRemoveLinks: true
                }
            }
        },
        computed: {
            ...mapGetters({
                travel_destination: 'travel_destinations/travel_destination'
            })
        },
        methods: {
            ...mapActions({
                getTravelDestination: 'travel_destinations/getTravelDestination',
                uploadDestinationGallery: 'travel_destinations/uploadDestinationGallery',
                deleteTravelDestinationGallery: 'travel_destinations/deleteTravelDestinationGallery'
            }),
            removeTravelDestinationGallery(image){
                this.deleteTravelDestinationGallery(image);
            },
            onFileUploadSuccess(file,response){
                this.response = response;
                this.$refs.myVueDropzone.removeFile(file);
                this.getTravelDestination(this.$route.params.id);
            }
        }

    }
</script>
