<template>
    <div>
<!--        <div class="row">-->
<!--            <p><el-button @click="filters_visible=true" type="primary" size="small"><i class="icon ni ni-filter-alt"/></el-button></p>-->
<!--        </div>-->
<!--        <div v-show="filters_visible===true" class="row">-->
<!--            <form>-->
<!--                <button class="btn btn-primary">Filter</button>-->
<!--            </form>-->
<!--        </div>-->
        <div v-show="filters_visible===false" v-masonry transition-duration="0.3s" item-selector=".item" :origin-top="true" :horizontal-order="false">
            <div class="row">
                <div v-masonry-tile class="col-sm-3" :key="item.id" v-for="item in travel_destinations">
                    <div class="card m-4" style="width: 350px">
                        <el-carousel :interval="5000" arrow="always">
                            <el-carousel-item v-for="i in item.gallery" :key="i.id">
                                <img class="card-img-top" :src="i.file_path" style="width: 350px; height: 250px"
                                     alt="Card image cap">
                            </el-carousel-item>
                        </el-carousel>
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ item.name }}</strong></h5>
                            <p><em class="icon ni ni-map-pin"></em> {{ item.address ? item.address : 'Unknown' }}</p>
                                <el-tag style="margin: 0.2%" v-for="tag in item.tags" :key="tag.id">
                                    {{ tag.activity.name }}
                                </el-tag>
                            <br/>
                            <br/>
                            <p style="align-content: center">
                                <el-button type="success">View Packages</el-button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapActions, mapGetters} from 'vuex';

export default {
    created() {
        this.getSubActivities({});
        this.getTravelDestinations({});
    },
    data() {
        return {
            filters: {},
            filters_visible: false
        }
    },
    computed: {
        ...mapGetters({
            sub_activities: 'activities/sub_activities',
            travel_destinations: 'travel_destinations/travel_destinations'
        })
    },
    methods: {
        ...mapActions({
            getSubActivities: 'activities/getSubActivities',
            getTravelDestinations: 'travel_destinations/getTravelDestinations',
        })
    }

}
</script>
