<template>
    <div id="app">
        <top></top>
        <article>
            <div id="vue-web" class="container">
                <!--<keep-alive>-->
                    <router-view></router-view>
                <!--</keep-alive>-->
            </div>
        </article>
        <bottom></bottom>
    </div>
</template>

<script>
    import Top from './top.vue';
    import Bottom from './bottom.vue';
    export default {
        components: {
            Top,
            Bottom
        },
    }
</script>

<style scoped>

</style>