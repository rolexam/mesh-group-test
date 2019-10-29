import VueRouter from 'vue-router';

import home from './pages/home'
import direction from './pages/direction'

const routes = [
    {
        path: '/',
        component: home
    },
    {
        path: '/directions/:id',
        name: "directions",
        component: direction
    }
];

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes
});

export default router
