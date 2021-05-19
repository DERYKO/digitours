import store from '../../data/store';
const adminMiddleware = (to, next) => {
    // const user = store.getters['profile/user'];
    // if (user.id && !user.isAdmin) {
    //     window.location.href = '/home';
    //     return next(false);
    // }
    const loading = store.state.loading['profile/user'];
    if (loading === undefined) {
        // wait for profile to load
        setTimeout(() => {
            adminMiddleware(to, next);
        }, 1000);
        return;
    }
    return next();
};
export default adminMiddleware;
