import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../components/Login.vue'
import Home from '../components/Home.vue';
import Welcome from 


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
      path: 
    }
  }
]

const router = new VueRouter({
  routes
})

// 挂载导航守卫
router.beforeEach((to, from, next) => {
  // 如果用户访问登录页，则直接放行
    if (to.path === '/login') return next()
    // 从sessionstorage中获取保存的token值
    const tokenStr = window.sessionStorage.getItem('token')
    // 如果没有token，强制跳转到登录页
    if (!tokenStr) return next('/login')
    next()
  })
  

export default router
