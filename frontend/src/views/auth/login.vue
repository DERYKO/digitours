<template>
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-split nk-split-page nk-split-md">
                    <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                        <div class="nk-block nk-block-middle nk-auth-body">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <img class="logo-dark" src="../../assets/favicon.png" srcset="../../assets/favicon.png" alt="logo">
                                    <h5 class="nk-block-title">DigiTours</h5>
                                </div>
                            </div><!-- .nk-block-head -->
                            <form @submit.prevent="login">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Email</label>
                                    </div>
                                    <input v-model="email" type="text" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address or username" required>
                                </div><!-- .foem-group -->
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Password</label>
                                        <router-link class="link link-primary link-sm" tabindex="-1" to="/reset">Forgot Code?</router-link>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input v-model="password" type="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode" required>
                                    </div>
                                </div><!-- .foem-group -->
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block">Welcome back</button>
                                </div>
                            </form><!-- form -->
                        </div><!-- .nk-block -->
                        <div class="nk-block nk-auth-footer">
                            <div class="mt-3">
                                <p>&copy; {{new Date().toDateString()}} Tours and Travel</p>
                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .nk-split-content -->
                    <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                        <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                            <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                <div class="slider-item">
                                    <div class="nk-feature nk-feature-center">
                                        <div class="nk-feature-img">
                                            <img class="round" src="../../assets/sample2.jpg" srcset="../../assets/sample2.jpg 2x" alt="">
                                        </div>
                                        <div class="nk-feature-content py-4 p-sm-5">
                                            <h4>DigiTours</h4>
                                            <p>We provide rafting for beginners in front of the campsite. You will be guided through many different activities and build up new skills! This rafting is not only for beginners, but also perfect for a team building activity, as it allows you to work together with your peers to achieve a common goal.</p></div>
                                    </div>
                                </div><!-- .slider-item -->
                            </div><!-- .slider-init -->
                        </div>
                    </div><!-- .nk-split-content -->
                </div><!-- .nk-split -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
</template>
<script>
    import {mapActions} from 'vuex';

    export default {
        created() {
          this.$message.success('Welcome back');
        },
        data() {
            return {
                email: 'derrick@digitours.co.ke',
                password: 'password',
            }
        },
        methods: {
            ...mapActions({
                authenticate: 'profile/authenticate'
            }),
            login() {
                this.authenticate({
                    email: this.email,
                    password: this.password
                })
            }
        }
    }
</script>
