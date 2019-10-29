<template>
    <div class="box">
        <article class="media">
            <div class="media-left">
                <figure class="image">
                    <img :src="product.image" alt="Image">
                </figure>
            </div>
            <div class="media-content">
                <div class="content">
                    <h2 class="subtitle">{{ product.name }}</h2>
                    <p>{{ product.description }}</p>
                </div>
            </div>
        </article>
    </div>
</template>

<script>
    export default {
        name: "product",
        props: ['product']
    }
</script>

<style lang="scss">
    .image {
        img {
            width: 150px;
        }
    }
</style>
