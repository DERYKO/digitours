import Vue from 'vue'
import Router from 'vue-router'
import auth from './auth.routes';
import dashboard from './dashbord.routes';
import authMiddleware from './middlewares/auth-middleware';

Vue.use(Router);
const router = new Router({
    mode: 'history',
    routes: [
        ...auth,
        ...dashboard,
        {
            path: '*',
            redirect: '/home',
        },
    ],
});

router.beforeEach((to, from, next) => {
    let result = next();
    if (to.meta.auth === true) {
        result = authMiddleware(to, next);
    }
    return result;
});


export default router;
