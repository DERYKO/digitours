import camelCase from 'lodash/camelCase';
import upperFirst from 'lodash/upperFirst';
import path from 'path';
import Vue from 'vue';
const requireComponent = require.context('./', true, /\.vue$/);
requireComponent.keys().forEach((fileName) => {
    const componentConfig = requireComponent(fileName);
    const componentName = upperFirst(camelCase(path.basename(fileName, '.vue')));
    Vue.component(componentName, componentConfig.default || componentConfig);
});
