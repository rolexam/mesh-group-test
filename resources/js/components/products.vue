<template>
    <div>


    </div>
</template>

<script>
    export default {
        name: "products",
        props: ['items-prop'],
        data() {
            return {
                products: null
            }
        },
        beforeMount() {
            console.log(this.props);
        }
    }
</script>

<style scoped>

</style>
