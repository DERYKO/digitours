import api from "../api";
import router from "../../routes";
export default {
    namespaced: true,
    state: {
        activities: [],
        activity: {},
        sub_activities: [],
        sub_activity: {}
    },
    getters: {
        activities: state => state.activities,
        activity: state => state.activity,
        sub_activities: state => state.sub_activities,
        sub_activity: state => state.sub_activity
    },
    mutations: {
        setActivities(state, activities) {
            state.activities = activities;
        },
        setActivity(state,activity){
            state.activity = activity;
        },
        setSubActivities(state, sub_activities) {
            state.sub_activities = sub_activities;
        },
        setSubActivity(state,sub_activity){
            state.sub_activity = sub_activity;
        }
    },
    actions: {
        async getActivities({commit}, filters) {
            try {
                commit('activateLoading', 'activities/list', {root: true});
                const response = await api.getActivities(filters);
                commit('setActivities', response);
                commit('deactivateLoading', 'activities/list', {root: true});
            } catch (e) {
                commit('deactivateLoading', 'activities/list', {root: true});
                this._vm.$message.error('Error getting activities!');
            }
        },
        async getActivity({commit},id){
            try {
                commit('activateLoading', 'activities/edit', {root: true});
                const response = await api.getActivity(id);
                commit('setActivity', response);
                commit('deactivateLoading', 'activities/edit', {root: true});
            } catch (e) {
                commit('deactivateLoading', 'activities/edit', {root: true});
                this._vm.$message.error('Error getting activities!');
            }
        },
        async deleteActivities({dispatch,commit},activity){
            try {
                commit('activateLoading', 'activities/list', {root: true});
                await api.deleteActivities(activity);
                this._vm.$message.success('Success deleting activity!');
                dispatch('getActivities');
                commit('deactivateLoading', 'activities/list', {root: true});
            }catch (e) {
                commit('deactivateLoading', 'activities/list', {root: true});
                this._vm.$message.error('Error deleting activity!');
            }
        },
        async createActivity(context,form){
            try {
                await api.createActivity(form);
                await router.push('/activities');
            }catch (e) {
                this._vm.$message.error('Error creating activity!');
            }
        },
        async updateActivity(context,form){
            try {
                await api.updateActivity(form);
                await router.push('/activities');
            }catch (e) {
                this._vm.$message.error('Error creating activity!');
            }
        },
        async getSubActivities({commit}, filters) {
            try {
                commit('activateLoading', 'sub_activities/list', {root: true});
                const response = await api.getSubActivities(filters);
                commit('setSubActivities', response);
                commit('deactivateLoading', 'sub_activities/list', {root: true});
            } catch (e) {
                commit('deactivateLoading', 'sub_activities/list', {root: true});
                this._vm.$message.error('Error getting sub activities!');
            }
        },
        async getSubActivity({commit},id){
            try {
                commit('activateLoading', 'sub_activities/edit', {root: true});
                const response = await api.getSubActivity(id);
                commit('setSubActivity', response);
                commit('deactivateLoading', 'sub_activities/edit', {root: true});
            } catch (e) {
                commit('deactivateLoading', 'sub_activities/edit', {root: true});
                this._vm.$message.error('Error getting sub activities!');
            }
        },
        async deleteSubActivities({dispatch,commit},sub_activity){
            try {
                commit('activateLoading', 'sub_activities/list', {root: true});
                await api.deleteSubActivities(sub_activity);
                this._vm.$message.success('Success deleting sub activity!');
                dispatch('getSubActivities');
                commit('deactivateLoading', 'sub_activities/list', {root: true});
            }catch (e) {
                commit('deactivateLoading', 'sub_activities/list', {root: true});
                this._vm.$message.error('Error deleting sub activity!');
            }
        },
        async createSubActivity(context,form){
            try {
                await api.createSubActivity(form);
                await router.push('/sub-activities');
            }catch (e) {
                this._vm.$message.error('Error creating sub activity!');
            }
        },
        async updateSubActivity(context,form){
            try {
                await api.updateSubActivity(form);
                await router.push('/sub-activities');
            }catch (e) {
                this._vm.$message.error('Error creating sub activity!');
            }
        },

    }
}
