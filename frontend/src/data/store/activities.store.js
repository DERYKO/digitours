import api from "../api";
export default {
    namespaced: true,
    state: {
        activities: []
    },
    getters: {
        activities: state => state.activities
    },
    mutations: {
        setActivities(state, activities) {
            state.activities = activities;
        }
    },
    actions: {
        async getActivities({commit}, filters) {
            try {
                const response = await api.getActivities(filters);
                commit('setActivities', response);
            } catch (e) {
                this._vm.$message.error('Error getting activities!');
            }
        },
        async deleteActivities({dispatch},activity){
            try {
                await api.deleteActivities(activity);
                this._vm.$message.success('Success deleting activity!');
                dispatch('getActivities');
            }catch (e) {
                this._vm.$message.error('Error deleting activity!');
            }
        }
    }
}
