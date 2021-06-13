import api from "../api";

export default {
    namespaced: true,
    state: {
        loading: true
    },
    mutations: {
        setLoading(state, status) {
            state.loading = status;
        }
    },
    actions: {
        async initiativeLipaNaMpesa({commit}, filters) {
            try {
                commit('setLoading', true);
                await api.initiativeLipaNaMpesa(filters);
                commit('setLoading', false);
            } catch (e) {
                commit('setLoading', false);
            }
        }
    }
}
