require('./bootstrap');
import router from './routes';

let token = localStorage.getItem('id_token');

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth) && !token) {
    next({ path: '/login', query: { redirect: to.fullPath }});
  } else {
    next();
  }
});

const app = new Vue({
    el: '#app',
    router,
});
