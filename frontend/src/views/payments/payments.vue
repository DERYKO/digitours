<template>
    <el-tabs type="border-card">
        <el-tab-pane>
            <span slot="label"><i class="el-icon-mpe"></i> MPESA</span>
            <form action="#" class="gy-3">
                <div class="row g-3 align-center">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <span class="form-note">booking name</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input v-model="booking.name" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-center">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <span class="form-note">phone number</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input v-model="booking.phone" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-center">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label">Amount</label>
                            <span class="form-note">booking amount</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input v-model="booking.amount" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                {{package_cost}}
            </form>
        </el-tab-pane>
        <el-tab-pane>
            <span slot="label"><i class="el-icon-bank-card"></i> CARD</span>
            Route
        </el-tab-pane>
        <el-tab-pane>
            <span slot="label"><i class="el-icon-wallet"></i> WALLET</span>
            Route
        </el-tab-pane>
    </el-tabs>
</template>
<script>
import {mapActions, mapGetters} from 'vuex';

export default {
    created() {
        this.getPackageCost(this.$route.params.id);
        this.booking.name = this.user.name;
        this.booking.phone = this.user.phone;
        this.booking.amount = this.package_cost.amount;
    },
    data(){
      return {
          booking: {}
      }
    },
    computed: {
        ...mapGetters({
            user: 'profile/user',
            package_cost: 'packages/package_cost'
        })
    },
    methods: {
        ...mapActions({
            getPackageCost: 'packages/getPackageCost'
        })
    }
}
</script>
