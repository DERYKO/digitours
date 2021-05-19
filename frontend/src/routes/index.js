import Vue from 'vue'
import Router from 'vue-router'
import auth from './auth.routes';
import dashboard from './dashbord.routes';
import activities from './activities.routes';
import collections from './collections.routes';
import destinations from './destinations.routes';
import promotions from './promotions.routes';
import surveys from './surveys.routes';
import users from './users.routes';
import authMiddleware from './middlewares/auth-middleware';
import adminMiddleware from './middlewares/admin-middleware';

Vue.use(Router);
const router = new Router({
    mode: 'history',
    routes: [
        ...auth,
        ...dashboard,
        ...activities,
        ...collections,
        ...destinations,
        ...promotions,
        ...surveys,
        ...users,
        {
            path: '*',
            redirect: '/home',
        },
    ],
});

router.beforeEach((to, from, next) => {
    let result = next();
    if (to.meta.admin) {
        result = adminMiddleware(to, next);
    }
    if (to.meta.auth) {
        result = authMiddleware(to, next);
    }
    return result;
});


export default router;
