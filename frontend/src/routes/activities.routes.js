export default  [
    {
        path: '/activities',
        name: 'activities',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/activities/activities'),
        },
        meta: {
             auth: true,admin: true,
        },
    },
    {
        path: '/activities/create/:id?',
        name: 'activities-create',
        components: {
            default: () => import('../views/activities/activities-create')
        },
        props: true,
        meta: {
             auth: true,admin: true,
        }
    },
    {
        path: '/sub-activities',
        name: 'sub-activities',
        components: {
            default: () => import(/* webpackChunkName: "auth" */ '../views/activities/sub-activities'),
        },
        meta: {
             auth: true,admin: true,
        },
    },
    {
        path: '/sub-activities/create/:id?',
        name: 'sub-activities-create',
        components: {
            default: () => import('../views/activities/sub-activities-create')
        },
        meta: {
             auth: true,admin: true,
        }
    }
];
