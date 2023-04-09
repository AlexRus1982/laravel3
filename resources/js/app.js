
   
window.Vue = require('vue').default;
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  { path: '/', component: require('./components/All.vue').default },
  { path: '/Moscow', component: require('./components/Moscow.vue').default },
  { path: '/SanctPeterburg', component: require('./components/SanctPeterburg.vue').default },
  { path: '/Sklad', component: require('./components/Sklad.vue').default },
  { path: '/Contacts', component: require('./components/Contacts.vue').default },
  { path: '/Requisites', component: require('./components/Requisites.vue').default },
]

const router = new VueRouter({
  routes 
})

const app = new Vue({
    data: {
        
     },
     methods: {
        toggle: function() {
         /* const list = document.querySelectorAll('.panel__table  li')
          console.log(list);
           list.forEach(item =>{ 
                 item.addEventListener('click',function(){
                 
                  list.forEach(el=>{ el.classList.remove('active'); });
                  item.classList.add('active')
              
           })})*/
        }
    },
  router
}).$mount('#app')