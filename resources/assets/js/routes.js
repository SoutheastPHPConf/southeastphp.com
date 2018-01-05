import VueRouter from 'vue-router';
import Home from './components/home.vue';
import Login from './components/auth/login.vue';
import TermsOfService from './components/terms-of-service.vue';
import PrivacyPolicy from './components/privacy-policy.vue';
import About from './components/about.vue';
import CodeOfConduct from './components/code-of-conduct.vue';
import CocReport from './components/report.vue';
import Nashville from './components/nashville.vue';
import Speakers from './components/speakers.vue';
import Sponsors from './components/sponsors.vue';
import EmailSignups from './components/admin/signups.vue';
import AdminSponsors from './components/admin/sponsors.vue';

const routes = [
  {
    path: '/',
    component: Home,
    name: 'Home',
  },
  {
    path: '/login',
    component: Login,
    name: 'Login',
  },
  {
    path: '/terms-of-service',
    component: TermsOfService,
    name: 'TermsOfService',
  },
  {
    path: '/privacy-policy',
    component: PrivacyPolicy,
    name: 'PrivacyPolicy',
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
    path: '/report',
    component: CocReport,
    name: 'CocReport',
  },
  {
    path: '/nashville',
    component: Nashville,
    name: 'Nashville',
  },
  {
    path: '/speakers',
    component: Speakers,
    name: 'Speakers',
  },
  {
      path: '/sponsors',
      component: Sponsors,
      name: 'Sponsors',
  },
  {
    path: '/admin/emails',
    component: EmailSignups,
    name: 'EmailSignups',
    meta: {
      requireAuth: true,
    }
  },
  {
    path: '/admin/sponsors',
    component: AdminSponsors,
    name: 'AdminSponsors',
    meta: {
      requireAuth: true,
    }
  },
];

const router = new VueRouter({
  routes,
  hashbang: false,
  linkActiveClass: 'active',
  mode: 'history',
});

export default router;