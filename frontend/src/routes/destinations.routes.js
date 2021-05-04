export default [
    {
        path: '/destinations',
        name: 'destinations',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/destinations/travel-destinations'),
        },
        meta: {
            auth: true,
        },
    },
    {
        path: '/destinations/create/:id?',
        name: 'destinations-create',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/destinations/travel-destinations-create'),
        },
        meta: {
            auth: true,
        },
    },
    {
        path: '/destination-contacts/:id',
        name: 'destination-contacts',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/destinations/travel-destination-contacts'),
        },
        meta: {
            auth: true,
        },
    },
    {
        path: '/destination-gallery/:id',
        name: 'destination-gallery',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/destinations/travel-destination-gallery'),
        },
        meta: {
            auth: true,
        },
    },
    {
        path: '/destination-packages/:id',
        name: 'destination-packages',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/packages/packages'),
        },
        meta: {
            auth: true,
        },
    }
];
