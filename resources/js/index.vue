<template>
    <div id="main">
        <nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <router-link to="/" class="navbar-item">Mesh Group Test</router-link>
                </div>
            </div>
        </nav>
        <div class="is-fullheight-with-navbar columns">
            <aside class="column is-2 is-fullheight section">
                <p class="menu-label">Categories</p>
                <ul class="menu-list">
                    <menu-item
                        v-for="dir in directions"
                        :item="dir"
                        :key="dir.id"
                    ></menu-item>
                </ul>
            </aside>
            <div class="container column is-10">
                <router-view :key="$route.fullPath"></router-view>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "index",
        data() {
            return {
                directions: {}
            }
        },
        beforeMount() {
            this.$http.get('/api/directions')
                .then(res => {
                    this.directions = res.body.data;
                }, err => {
                    console.log("Error index.vue", err);
                });
        }
    }
</script>

<style scoped>
    .title {
        margin-top: 30px;
    }
</style>
