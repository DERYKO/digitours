export default [
    {
        path: '/package/payments/:id',
        name: 'payments',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/payments/payments'),
        },
        meta: {
            guest: true,auth: true
        },
    }
];
