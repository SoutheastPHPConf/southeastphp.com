import VueRouter from 'vue-router';
import Home from './components/home.vue';
import About from './components/about.vue';
import CodeOfConduct from './components/code-of-conduct.vue';
import Nashville from './components/nashville.vue';
import CallForPapers from './components/call-for-papers.vue';
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
    path: '/code-of-conduct',
    component: CodeOfConduct,
    name: 'CodeOfConduct',
  },
  {
    path: '/nashville',
    component: Nashville,
    name: 'Nashville',
  },
  {
    path: '/cfp',
    component: CallForPapers,
    name: 'CallForPapers',
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