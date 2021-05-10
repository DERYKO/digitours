export default [
    {
        path: '/users',
        name: 'users',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/users/users'),
        },
        meta: {
             auth: true,admin: true,
        },
    },
    {
        path: '/users/create/:id?',
        name: 'users-create',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/users/users-create'),
        },
        meta: {
             auth: true,admin: true,
        },
    }
];
