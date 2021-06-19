import Vue from 'vue'
import Vuex from 'vuex'
import profile from './profile.store';
import activities from "./activities.store";
import travel_destinations from "./travel_destinations.store";
import contact_types from "./contact_types.store";
import packages from "./packages.store";
import locations from "./locations.store";
import payments from "./payments.store";
import wallets from "./wallets.store";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        autoSave: true,
        loading: {},
        dialogVisible: false
    },
    getters: {
        dialogVisible: state => state.dialogVisible
    },
    mutations: {
        activateLoading(state, key) {
            Vue.set(state.loading, key, true);
        },
        deactivateLoading(state, key) {
            Vue.set(state.loading, key, false);
        },
        setAutoSave(state, autoSave) {
            state.autoSave = autoSave;
        },
        openModal(state, status) {
            state.dialogVisible = status;
        }
    },
    modules: {
        profile,
        activities,
        travel_destinations,
        contact_types,
        packages,
        locations,
        payments,
        wallets
    }
})
