import api from '../api';
export default {
    namespaced: true,
    state: {
        countries: [],
        regions: []
    },
    getters: {
        countries: state => state.countries,
        regions: state => state.regions
    },
    mutations: {
        setCountries(state,countries){
            state.countries= countries;
        },
        setRegions(state,regions){
            state.regions = regions;
        }
    },
    actions: {
        async getCountries({commit},filters){
            try {
                commit('activateLoading', 'countries/list', {root: true});
                const response = await api.getCountries(filters);
                commit('setCountries', response);
                commit('deactivateLoading', 'countries/list', {root: true});
            } catch (e) {
                commit('deactivateLoading', 'countries/list', {root: true});
                this._vm.$message.error('Error getting countries!');
            }
        },
        async getRegions({commit},filters){
            try {
                commit('activateLoading', 'regions/list', {root: true});
                const response = await api.getRegions(filters);
                commit('setRegions', response);
                commit('deactivateLoading', 'regions/list', {root: true});
            } catch (e) {
                commit('deactivateLoading', 'regions/list', {root: true});
                this._vm.$message.error('Error getting regions!');
            }
        }
    }
}
