import Vue from 'vue'
import App from './App.vue'
import router from './routes'
import store from './data/store'
import './views/components';

Vue.config.productionTip = false;
import {
    Pagination,
    Message,
    Loading,
    Table,
    TableColumn,
    MessageBox,
    Button,
    Input,
    Form,
    FormItem,
    Select,
    Option,
    Image,
    Icon,
    Carousel,
    CarouselItem,
    Steps,
    Step,
    Dialog
} from 'element-ui';

Vue.use(Pagination);
Vue.component(Table.name, Table);
Vue.component(TableColumn.name, TableColumn);
Vue.component(Button.name, Button);
Vue.component(Input.name, Input);
Vue.component(Form.name, Form);
Vue.component(FormItem.name, FormItem);
Vue.component(Select.name, Select);
Vue.component(Option.name, Option);
Vue.component(Image.name,Image);
Vue.component(Icon.name,Icon);
Vue.component(Carousel.name,Carousel);
Vue.component(CarouselItem.name,CarouselItem);
Vue.component(Steps.name,Steps);
Vue.component(Step.name,Step);
Vue.component(Dialog.name,Dialog);
Vue.prototype.$message = Message;
Vue.use(Loading.directive);
Vue.prototype.$loading = Loading.service;
Vue.prototype.$ELEMENT = {size: 'medium', zIndex: 3000};

Vue.prototype.$confirm = MessageBox.confirm;

import 'element-ui/lib/theme-chalk/index.css';
import lang from 'element-ui/lib/locale/lang/en'
import locale from 'element-ui/lib/locale'
import {VueMasonryPlugin} from 'vue-masonry';

// or using CJS
// const VueMasonryPlugin = require('vue-masonry').VueMasonryPlugin

Vue.use(VueMasonryPlugin);

locale.use(lang);

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
