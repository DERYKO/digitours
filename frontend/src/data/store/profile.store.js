import api from '../api';

export default {
    namespaced: true,
    state: {
        user: {},
        users: {data: [], current_page: 1, total: 0, per_page: 50}
    },
    getters: {
        loggedIn() {
            return !!localStorage.getItem('digitours@ke');
        },
        user: state => state.user,
        users: state => state.users
    },
    mutations: {
        setUser(state, user) {
            state.user = user;
        },
        setUsers(state, users) {
            state.users = users;
        }
    },
    actions: {
        async authenticate({commit}, credentials) {
            try {
                const response = await api.login(credentials);
                await localStorage.setItem('digitours@ke', response.token);
                commit('setUser', response.user);
                window.location.href = '/dashboard'
            } catch (e) {
                this._vm.$message.error(e.response.data.message);
            }
        },
        async getProfile({commit}, filters = {}) {
            try {
                const response = await api.getProfile(filters);
                commit('setUser', response);
            } catch (e) {
                this._vm.$message.error('Error fetching profile');
            }
        },
        async logout(context, filters = {}) {
            await api.logout(filters);
            localStorage.removeItem('sat_token');
            window.location.href = '/login';
        },
        async sendResetPasswordLink(context, credentials) {
            try {
                await api.sendResetPasswordLink(credentials);
            } catch (e) {
                alert(e.response.data.message);
            }
        },
        async getUsers({commit}, filters) {
            try {
                commit('activateLoading', 'users/list', {root: true});
                const response = await api.getUsers(filters);
                commit('setUsers', response);
                commit('deactivateLoading', 'users/list', {root: true});
            } catch (e) {
                this._vm.$message.error('Error fetching users');
                commit('deactivateLoading', 'users/list', {root: true});
            }
        }
    }
};
