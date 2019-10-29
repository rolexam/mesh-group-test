<template>
    <li>
        <router-link :class="{'is-active': item.id == $route.params.id}" :to="'/directions/'+item.id">{{ item.name }}</router-link>
        <ul class="menu-list">
            <menu-item
                v-for="dir in item.children"
                :item="dir"
                :key="dir.id"
                ></menu-item>
        </ul>
    </li>
</template>

<script>
    export default {
        name: "menu-item",
        props: ['item']
    }
</script>

<style scoped>

</style>
