import VueRoute from 'vue-router'
import Home from './components/Mobile/index.vue'

let routes = [
    {
        path:'/',
        component:Home
    },
]

export default new VueRoute({
    mode: 'history',
    routes
});