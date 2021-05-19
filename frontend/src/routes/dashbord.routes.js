export default  [
    {
        path: '/dashboard',
        name: 'dashboard',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/dashboard/dashboard'),
        },
        meta: {
             auth: true,admin: true,
        },
    },
    {
        path: '/home',
        name: 'home',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/dashboard/home'),
        },
        meta: {
            guest: true,
        },
    },
];
