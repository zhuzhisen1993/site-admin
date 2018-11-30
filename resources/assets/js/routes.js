import VueRoute from 'vue-router'
import Home from './components/Mobile/index.vue'
import goods from './components/Mobile/goods.vue'


let routes = [
    {
        path:'/',
        component:Home
    },
    {
        path:'/goods',
        component:goods
    },
]

export default new VueRoute({
    mode: 'history',
    routes
});