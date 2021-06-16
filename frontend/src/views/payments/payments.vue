<template>
    <el-tabs type="border-card">
        <el-tab-pane>
            <span slot="label"><i class="el-icon-mpe"></i> MPESA</span>
            <img style="height: 30px;width: 100px"
                 src="https://seeklogo.com/images/M/mpesa-logo-AE44B6F8EB-seeklogo.com.png">
            <br/>
            <h6>{{ package_cost.package.description }} - {{ package_cost.description }} -
                count of <span style="color: red"> {{ $route.params.unit_count }}</span></h6>
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
                                <input v-model="booking.amount"
                                       :min="package_cost.minimum_deposit * $route.params.unit_count" type="text"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-center">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <span>You will receive an stk push on the {{booking.phone}} when you press PAY WITH MPESA</span>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-lg-7">
                        <div class="form-group mt-2">
                            <button @click="initiativeLipaNaMpesa" type="button" class="btn btn-lg btn-success">PAY WITH
                                MPESA
                            </button>
                        </div>
                    </div>
                </div>
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
        this.booking.amount = this.package_cost.cost * this.$route.params.unit_count;
    },
    props: {
        unit_count: {
            default: 1
        }
    },
    data() {
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
            getPackageCost: 'packages/getPackageCost',
            lipaNaMPESA: 'payments/initiativeLipaNaMpesa'
        }),
        initiativeLipaNaMpesa() {
            this.lipaNaMPESA({
                user_id: this.user.id,
                package_cost_id: this.package_cost.id,
                ...this.booking
            });
        }

    }
}
</script>
