import Vue from 'vue'
import Vuex from 'vuex'
import profile from './profile.store';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        autoSave: true,
        loading: {}
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
    },
    modules: {
        profile
    }
})
