
   
window.Vue = require('vue').default;
import VueRouter from 'vue-router'
import Slider from './components/Slider.vue';
import All from './components/All.vue';
import Sklad from './components/Sklad.vue';

Vue.use(VueRouter)

/*const routes = [
  { path: '/',name:'home', component: require('./components/All.vue').default }, 

  { path: '/Moscow', component: require('./components/Moscow.vue').default },
  { path: '/SanctPeterburg', component: require('./components/SanctPeterburg.vue').default },
  { path: '/Sklad', component: require('./components/Sklad.vue').default },
  { path: '/Contacts', component: require('./components/Contacts.vue').default },
  { path: '/Requisites', component: require('./components/Requisites.vue').default },
]
export const router = new VueRouter({
  routes,
  linkExactActiveClass: "active"
})
*/
Vue.component('slider', require('./components/Slider.vue').default);
Vue.component('navigation1', require('./components/Navigation1.vue').default);
Vue.component('navigation2', require('./components/Navigation2.vue').default);


const router = new VueRouter({
  //Подставляет под корневой путь
 // mode: 'history',
 linkExactActiveClass: "active",
  routes: [
    { path: '/',
      // a single route can define multiple named components
      // which will be rendered into <router-view>s with corresponding names.
      components: {
        default: All,
        a: "",
       
      }
    },
    { path: '/Moscow', component: require('./components/Moscow.vue').default },
    { path: '/SanctPeterburg', component: require('./components/SanctPeterburg.vue').default },
    { path: '/Sklad', component: require('./components/Sklad.vue').default },
    { path: '/Contacts', component: require('./components/Contacts.vue').default },
    { path: '/Requisites', component: require('./components/Requisites.vue').default },
  ]
})

const app = new Vue({
  
     router
}).$mount('#app');

