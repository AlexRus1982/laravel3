
   
window.Vue = require('vue').default;
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  { path: '/', component: require('./components/Contacts.vue').default },
  { path: '/user', component: require('./components/Moscow.vue').default }
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