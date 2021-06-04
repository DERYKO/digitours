<template>
    <div>
        <div class="row">
            <p>
                <el-button @click="filters_visible=!filters_visible" type="warning" size="small"><i
                    class="icon ni ni-filter-alt"/></el-button>
            </p>
        </div>
        <div v-show="filters_visible===true" class="row">
            <div class="col-sm-12">
                <form class="gy-3">
                    <div class="row g-3 align-start">
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label class="form-label" for="counties">Counties</label>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            {{regions}}
                            <div class="form-group">
                                <el-checkbox-group id="counties" v-model="filters.regions">
                                    <el-checkbox-button v-for="region in regions" :label="region.id"
                                                        :key="region.id">{{ region.name }}
                                    </el-checkbox-button>
                                </el-checkbox-group>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-start">
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label class="form-label" for="activities">Activities</label>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <el-checkbox-group id="activities" v-model="filters.sub_activities">
                                    <el-checkbox-button v-for="activity in sub_activities" :label="activity.id"
                                                        :key="activity.id">{{ activity.name }}
                                    </el-checkbox-button>
                                </el-checkbox-group>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-start">
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label class="form-label" for="rating">Rating</label>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <el-rate id="rating" v-model="filters.rating"></el-rate>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-start">
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label class="form-label" for="price">Price</label>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <el-slider
                                        id="price"
                                        v-model="filters.price"
                                        range
                                        show-stops
                                        :max="20000">
                                    </el-slider>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <button @click="filterDestinations" class="btn btn-primary col-sm-12 justify-content-center"
                                type="button">Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <loader listen="travel_destinations/list">
            <div v-show="filters_visible===false" v-masonry transition-duration="0.3s" item-selector=".item"
                 :origin-top="true" :horizontal-order="false">
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
                                <p><em class="icon ni ni-map-pin"></em> {{ item.address ? item.address : 'Unknown' }}
                                </p>
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
        </loader>
    </div>
</template>
<script>
import {mapActions, mapGetters} from 'vuex';

export default {
    created() {
        this.getTravelDestinations({});
        this.getSubActivities({});
        this.getCountries({});
        this.getRegions({});
    },
    data() {
        return {
            filters: {
                rating: 2,
                sub_activities: [],
            },
            filters_visible: false
        }
    },
    computed: {
        ...mapGetters({
            countries: 'locations/countries',
            regions: 'locations/regions',
            sub_activities: 'activities/sub_activities',
            travel_destinations: 'travel_destinations/travel_destinations'
        })
    },
    methods: {
        ...mapActions({
            getCountries: 'locations/getCountries',
            getRegions: 'locations/getRegions',
            getSubActivities: 'activities/getSubActivities',
            getTravelDestinations: 'travel_destinations/getTravelDestinations',
        }),
        async filterDestinations() {
            this.filters_visible = false;
            await this.getTravelDestinations(this.filters);
        }
    }

}
</script>
