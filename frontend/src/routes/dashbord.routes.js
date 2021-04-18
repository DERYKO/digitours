export default  [
    {
        path: '/dashboard',
        name: 'dashboard',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/dashboard/dashboard'),
        },
        meta: {
            auth: true,
        },
    },
    {
        path: '/home',
        name: 'home',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/dashboard/dashboard'),
        },
        meta: {
            guest: true,
        },
    },
];
