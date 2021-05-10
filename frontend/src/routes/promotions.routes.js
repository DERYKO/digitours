export default [
    {
        path: '/promotion-types',
        name: 'promotion-types',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/promotions/promotion-types'),
        },
        meta: {
            auth: true,admin: true,
        },
    },
    {
        path: '/promotion-types/create/:id?',
        name: 'promotion-types-create',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/promotions/promotion-types-create'),
        },
        meta: {
            auth: true,admin: true,
        },
    },
    {
        path: '/promotions',
        name: 'promotions',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/promotions/promotions'),
        },
        meta: {
            auth: true,admin: true,
        },
    },
    {
        path: '/promotions/create/:id?',
        name: 'promotion-create',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/promotions/promotions-create'),
        },
        meta: {
            auth: true,admin: true,
        },
    },
];
