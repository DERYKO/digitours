<template>
    <div>
        <div class="col-sm-12 d-flex justify-content-center" v-if="loading" :class="loaderClasses">
            <img style="width: 250px; height: 250px" class="u-block opacity-50 u-mr-small" src="../../../assets/loading.gif">
        </div>
        <slot v-if="!loading"/>
    </div>
</template>

<script>
    export default {
        name: '',
        props: {
            listen: {
                type: String,
                required: true,
            },
            loaderClass: {
                type: String,
                default: '',
            },
            size: {
                type: String,
                default: '3x',
            },
            firstTimeOnly: {
                type: Boolean,
                default: false,
            },
            left: {
                type: Boolean,
                default: false,
            },
            right: {
                type: Boolean,
                default: false,
            },
        },
        data() {
            return {
                alreadyRan: false,
            };
        },
        computed: {
            loading() {
                return this.$store.state.loading[this.listen] && !(this.alreadyRan && this.firstTimeOnly);
            },
            iconClass() {
                return [`fal-${this.size}`];
            },
            loaderClasses() {
                let classes = 'align-items-center justify-content-center';

                if (this.left) {
                    classes = 'align-items-start justify-content-start';
                }

                if (this.right) {
                    classes = 'align-items-end justify-content-end';
                }

                return `${classes} ${this.loaderClass}`;
            },
        },
        watch: {
            loading() {
                if (this.loading) {
                    this.alreadyRan = true;
                }
            },
        },
    };
</script>
