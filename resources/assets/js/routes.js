import VueRouter from 'vue-router';
import Home from './components/home.vue';
import Login from './components/auth/login.vue';
import Register from './components/auth/register.vue';
import TermsOfService from './components/terms-of-service.vue';
import PrivacyPolicy from './components/privacy-policy.vue';
import About from './components/about.vue';
import CodeOfConduct from './components/code-of-conduct.vue';
import CocReport from './components/report.vue';
import Venue from './components/venue.vue';
import Nashville from './components/nashville.vue';
import Speakers from './components/speakers.vue';
import Sponsors from './components/sponsors.vue';
import Diversity from './components/diversity.vue';
import EmailSignups from './components/admin/signups.vue';
import AdminSponsors from './components/admin/sponsors.vue';
import auth from './auth.js';

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
    path: '/register',
    component: Register,
    name: 'Register',
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
    path: '/diversity',
    component: Diversity,
    name: 'Diversity',
  },
  {
    path: '/venue',
    component: Venue,
    name: 'Venue',
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
      requiresAuth: true,
    }
  },
  {
    path: '/admin/sponsors',
    component: AdminSponsors,
    name: 'AdminSponsors',
    meta: {
      requiresAuth: true,
    }
  },
];

const router = new VueRouter({
  routes,
  hashbang: false,
  linkActiveClass: 'active',
  mode: 'history',
});


router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth) && auth.user.authenticated === false) {
    console.log('hello world');
    next({ path: '/login', query: { redirect: to.fullPath }});
  } else {
    next();
  }
});

export default router;