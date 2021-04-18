import store from '../../data/store';

const aclMiddleware = (to, next) => {
    const loggedIn = store.getters['profile/loggedIn'];
    if (!loggedIn) {
        window.location.href = '/login';
        return next(false);
    }
    return next();
};
export default aclMiddleware;
