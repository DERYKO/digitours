export default [
    {
        path: '/login',
        name: 'login',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/auth/login'),
        },
        meta: {
            guest: true,
        },
    },
    {
        path: '/reset',
        name: 'reset',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/auth/reset'),
        },
        meta: {
            guest: true,
        },
    }
];
