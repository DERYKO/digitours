<template>
    <div>
        <loader listen="travel_destinations/list">
            <el-tabs type="border-card" v-model="activeTab">
                <el-tab-pane v-for="item in packages" :key="item.id" :label="item.description" :name="item.id">
                    <div class="col-sm-12">
                        <span style="font-size: 18px;font-weight: bold">  {{
                                item.travel_destination.name
                            }}</span>
                        <br/>
                        <el-tabs type="border-card" v-model="activeInnerTab">
                            <el-tab-pane label="Package Cost" name="Package Cost">
                                <div class="col-sm-12">
                                    <div class="col-sm-5">
                                        <img :src="item.cover_photo" style="width: 120px;height: 120px"
                                             alt="Cover Photo">
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="col-sm-6">
                                        <p>{{ item.description }}</p>
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Cost</th>
                                                <th>Minimum Deposit</th>
                                                <th>Persons/Group/Company Count</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="cost in item.package_cost" :key="cost.id">
                                                <td>{{ cost.description }}</td>
                                                <td>{{ cost.cost }}</td>
                                                <td>{{ cost.minimum_deposit }}</td>
                                                <td><input type="number" min="1" placeholder="1" v-model="cost.quantity"
                                                           class="form-control"/></td>
                                                <td>
                                                    <button @click="bookPackageCost(cost,item.package_policy)"
                                                            class="btn btn-success" type="button">Book Now
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr v-if="!item.package_cost.length">
                                                <td class="text-xl-center" colspan="5">
                                                    No package costs yet.
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </el-tab-pane>
                            <el-tab-pane label="Itinerary" name="Itinerary">
                                <p v-if="item.package_itinerary" v-html="item.package_itinerary.itinerary">
                                </p>
                                <p v-if="!item.package_itinerary">
                                    No itinerary yet!.
                                </p>
                            </el-tab-pane>
                            <el-tab-pane label="Package Inclusive" name="Inclusive">
                                <p v-if="item.package_inclusive" v-html="item.package_inclusive.inclusive">
                                </p>
                                <p v-if="!item.package_inclusive">
                                    No package inclusive yet!.
                                </p>
                            </el-tab-pane>
                            <el-tab-pane label="Package Exclusive" name="Exclusive">
                                <p v-if="item.package_exclusive" v-html="item.package_exclusive.exclusive">
                                </p>
                                <p v-if="!item.package_exclusive">
                                    No package exclusive yet!.
                                </p>
                            </el-tab-pane>
                            <el-tab-pane label="Package Requirements" name="Requirements">
                                <p v-if="item.package_requirement" v-html="item.package_requirement.requirements">
                                </p>
                                <p v-if="!item.package_requirement">
                                    No package requirements yet!.
                                </p>
                            </el-tab-pane>
                            <el-tab-pane label="Package Policy" name="Policy">
                                <p v-if="item.package_policy" v-html="item.package_policy.policy">
                                </p>
                                <p v-if="!item.package_policy">
                                    No package policy yet!.
                                </p>
                            </el-tab-pane>
                        </el-tabs>
                    </div>
                </el-tab-pane>
            </el-tabs>
        </loader>
    </div>
</template>
<script>
import {mapGetters, mapActions} from 'vuex';

export default {
    created() {
        this.getPackages({travel_destination_id: this.$route.params.id}).then(() => {
            if (this.packages.length) {
                this.activeTab = this.packages[0].id;
            }
        });
    },
    data() {
        return {
            activeTab: null,
            activeInnerTab: 'Package Cost'
        }
    },
    computed: {
        ...mapGetters({
            user: 'profile/user',
            packages: 'packages/packages'
        })
    },
    methods: {
        ...mapActions({
            getPackages: 'packages/getPackages'
        }),
        handleClick(tab) {
            console.log(tab);
        },
        bookPackageCost(cost, policy) {
            if (policy) {
                this.$confirm(policy.policy, 'Accept Terms And Conditions', {
                    dangerouslyUseHTMLString: true,
                    confirmButtonText: 'Continue',
                    cancelButtonText: 'Cancel',
                }).then(() => {
                    this.$router.push({
                        path: '/package/payments/' + cost.id + '/units/' + cost.quantity ?? 1
                    })
                    this.$router.push()
                }).catch(() => {
                    this.$message({
                        type: 'info',
                        message: 'Booking canceled'
                    });
                });
            }
        }
    }
}
</script>
