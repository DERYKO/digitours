import api from "../api";
import router from "../../routes";

export default {
    namespaced: true,
    state: {
        packages: [],
        travel_destination_package: null
    },
    getters: {
        packages: state => state.packages,
        travel_destination_package: state => state.travel_destination_package
    },
    mutations: {
        setPackages(state, packages) {
            state.packages = packages;
        },
        setTravelDestinationPackage(state,item){
            state.travel_destination_package = item;
        }
    },
    actions: {
        async getPackages({commit}, filters) {
            try {
                commit('activateLoading', 'travel_destinations/list', {root: true});
                const response = await api.getPackages(filters);
                commit('setPackages', response);
                commit('deactivateLoading', 'travel_destinations/list', {root: true});
            } catch (e) {
                this._vm.$message.error('Error fetching packages');
                commit('deactivateLoading', 'travel_destinations/list', {root: true});
            }
        },
        async createTravelDestinationPackage(context,item_package){
            try {
                await api.createTravelDestinationPackage(item_package);
                this._vm.$message.success('Package created successfully!');
                await router.push('/destination-packages/'+item_package.travel_destination_id)
            }catch (e) {
                this._vm.$message.error('Error creating package');
            }
        },
        async updateTravelDestinationPackage(context,item_package){
            try {
                await api.updateTravelDestinationPackage(item_package);
                this._vm.$message.success('Package updated successfully!');
                await router.push('/destination-packages/'+item_package.travel_destination_id)
            }catch (e) {
                this._vm.$message.error('Error updating package');
            }
        },
        async getTravelDestinationPackage({commit},id){
            try {
                commit('activateLoading', 'packages/edit', {root: true});
                const response = await api.getTravelDestinationPackage(id);
                commit('setTravelDestinationPackage', response);
                commit('deactivateLoading', 'packages/edit', {root: true});
            } catch (e) {
                this._vm.$message.error('Error fetching package');
                commit('deactivateLoading', 'packages/edit', {root: true});
            }
        },
        async deletePackages({dispatch},filters){
            try {
                await api.deletePackages(filters.id);
                dispatch('getPackages',filters);
                this._vm.$message.success('Package deleted successfully!');
            }catch (e) {
                console.log(e);
                this._vm.$message.error('Error removing package');
            }
        }
    }
}
