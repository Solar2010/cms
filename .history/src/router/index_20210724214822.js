import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../components/Login.vue'
import Home from '../components/Home.vue';
import Welcome from '../components/Welcome.vue'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    redirect: '/login'
  },
  {
    path: '/login',
    component: Login
  },
  {
    path: '/home',
    component: Home,
    redirect: '/welcome',
    children: {
      path: '/welcome',
      component: Welcome
    }
  }
]

const router = new VueRouter({
  routes
})
console.log(router)
  

export default router
