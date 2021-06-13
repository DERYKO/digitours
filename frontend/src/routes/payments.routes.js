export default [
    {
        path: '/package/payments/:id/units/:unit_count',
        props: true,
        name: 'payments',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/payments/payments'),
        },
        meta: {
            guest: true,auth: true
        },
    }
];
