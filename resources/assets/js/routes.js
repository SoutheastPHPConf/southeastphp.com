import VueRouter from 'vue-router';
import Home from './components/Home.vue';
import About from './components/about.vue';

const routes = [
  {
    path: '/',
    component: Home,
    name: 'Home',
  },
  {
    path: '/about',
    component: About,
    name: 'About',
  }
];

export default new VueRouter({
  routes,
});