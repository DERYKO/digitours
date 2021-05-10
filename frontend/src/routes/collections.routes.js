export default [
    {
        path: '/collections',
        name: 'collections',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/collections/collections'),
        },
        meta: {
             auth: true,admin: true,
        },
    },
];
