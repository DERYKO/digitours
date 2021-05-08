import api from "../api";
export default {
    namespaced: true,
    state: {
        contact_types: []
    },
    getters: {
        contact_types: state => state.contact_types
    },
    mutations: {
        setContactTypes(state,types){
            state.contact_types = types;
        }
    },
    actions: {
        async getContactTypes({commit},filters){
            try {
                const response = await api.getContactTypes(filters);
                commit('setContactTypes',response);
            }catch (e) {
                this._vm.$message.error('Error fetching contact types');
            }
        }
    }
}
