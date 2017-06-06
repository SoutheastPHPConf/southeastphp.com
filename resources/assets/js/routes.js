import VueRouter from 'vue-router';
import Home from './components/home.vue';
import About from './components/about.vue';
import EmailSignups from './components/admin/signups.vue';

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
  },
  {
    path: '/admin/emails',
    component: EmailSignups,
    name: 'EmailSignups',
  }
];

export default new VueRouter({
  routes,
});