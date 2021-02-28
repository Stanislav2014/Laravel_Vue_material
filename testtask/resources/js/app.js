require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueMaterial from 'vue-material';
import 'vue-material/dist/vue-material.min.css';
import 'vue-material/dist/theme/default.css';

Vue.use(VueRouter);
Vue.use(VueMaterial);

import MemberCreate from './components/member/MemberCreate';
import MemberList from './components/member/MemberList';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'create',
            component: MemberCreate
        },
        {
            path: '/list',
            name: 'list',
            component: MemberList,
        },
    ],
});

const app = new Vue({ router }).$mount('#app')
