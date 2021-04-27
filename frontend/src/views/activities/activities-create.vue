<template>
    <div>
        {{activity}}
    </div>
</template>
<script>
    export default {
        props: ['activity'],
        mounted() {
            console.log(this.activity);
        }
    }

</script>
