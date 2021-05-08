import api from "../api";
import router from "../../routes";
export default {
    namespaced: true,
    state: {
        travel_destinations: [],
        travel_destination: {},
    },
    getters: {
        travel_destinations: state => state.travel_destinations,
        travel_destination: state => state.travel_destination,
    },
    mutations: {
        setTravelDestinations(state, travel_destinations) {
            state.travel_destinations = travel_destinations;
        },
        setTravelDestination(state, travel_destination) {
            state.travel_destination = travel_destination;
        }
    },
    actions: {
        async getTravelDestinations({commit}, filters) {
            try {
                commit('activateLoading', 'travel_destinations/list', {root: true});
                const response = await api.getTravelDestinations(filters);
                commit('setTravelDestinations', response);
                commit('deactivateLoading', 'travel_destinations/list', {root: true});
            } catch (e) {
                commit('deactivateLoading', 'travel_destinations/list', {root: true});
                this._vm.$message.error('Error getting travel_destinations!');
            }
        },
        async getTravelDestination({commit}, id) {
            try {
                commit('activateLoading', 'travel_destinations/edit', {root: true});
                const response = await api.getTravelDestination(id);
                commit('setTravelDestination', response);
                commit('deactivateLoading', 'travel_destinations/edit', {root: true});
            } catch (e) {
                commit('deactivateLoading', 'travel_destinations/edit', {root: true});
                this._vm.$message.error('Error getting travel_destinations!');
            }
        },
        async deleteTravelDestinations({dispatch, commit}, travel_destination) {
            try {
                commit('activateLoading', 'travel_destinations/list', {root: true});
                await api.deleteTravelDestinations(travel_destination);
                this._vm.$message.success('Success deleting travel_destination!');
                dispatch('getTravelDestinations');
                commit('deactivateLoading', 'travel_destinations/list', {root: true});
            } catch (e) {
                commit('deactivateLoading', 'travel_destinations/list', {root: true});
                this._vm.$message.error('Error deleting travel_destination!');
            }
        },
        async createTravelDestination(context, form) {
            try {
                await api.createTravelDestination(form);
                await router.push('/destinations');
            } catch (e) {
                this._vm.$message.error('Error creating travel_destination!');
            }
        },
        async updateTravelDestination(context, form) {
            try {
                await api.updateTravelDestination(form);
                await router.push('/destinations');
            } catch (e) {
                this._vm.$message.error('Error creating travel_destination!');
            }
        },
        async deleteTravelDestinationGallery({dispatch},image){
            try {
                await api.deleteTravelDestinationGallery(image);
                this._vm.$message.success('Deleted succesfully!');
                dispatch('getTravelDestination',image.travel_destination_id);
            } catch (e) {
                this._vm.$message.error('Error uploading travel_destination! gallery');
            }
        },
        async createTravelDestinationContact({dispatch},contact){
            try {
                await api.createTravelDestinationContact(contact);
                this._vm.$message.success('Created succesfully!');
                dispatch('getTravelDestination',contact.travel_destination_id);
            } catch (e) {
                console.log(e);
                this._vm.$message.error('Error creating travel destination contact');
            }
        },
        async updateTravelDestinationContact({dispatch},contact){
            try {
                await api.updateTravelDestinationContact(contact);
                this._vm.$message.success('Updated succesfully!');
                dispatch('getTravelDestination',contact.travel_destination_id);
            } catch (e) {
                this._vm.$message.error('Error updating travel destination contact');
            }
        }
    }
}
