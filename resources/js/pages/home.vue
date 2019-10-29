<template>
    <div class="section">
        <h1 class="title">All Products</h1>
        <product v-for="prod in products.data"
                 :product="prod"
                 :key="prod.id"
        >
        </product>
        <div class="has-text-centered">
            <button @click="loadMore" class="button is-primary" :class="{'is-loading': isLoading}" v-if="products.links != undefined && products.links.next != null">Load More</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "home",
        data() {
            return {
                products: {},
                isLoading: false
            }
        },
        beforeMount() {
            this.$http.get('/api/products')
                .then(res => {
                    this.products = res.body;
                }, err => {
                    console.log("Error home.vue", err);
                })
        },
        methods: {
            loadMore() {
                if(this.products.links.next != null) {
                    this.isLoading = true;
                    this.$http.get(this.products.links.next)
                        .then(res => {
                            this.products.data = this.products.data.concat(res.body.data);
                            this.products.links = res.body.links;
                            this.products.meta = res.body.meta;
                            this.isLoading = false;
                            // console.log("Load more", res);
                        }, err => {
                            console.log("Error home.vue", err);
                        })
                }
            }
        }
    }
</script>

<style scoped>

</style>
