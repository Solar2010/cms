import Vue from 'vue'
import App from './App.vue'
import router from './router'
import './plugins/element.js'
import './assets/css/global.css'
import axios from 'axios'
import './assets/fonts/iconfont.css'
import TreeTable from 'vue-table-with-tree-grid'
import VueQuillEditor from 'vue-quill-editor'
import 'quill/dist/quill.core.css' // import styles
import 'quill/dist/quill.snow.css' // for snow theme
import 'quill/dist/quill.bubble.css' // for bubble theme
import 'element-ui/lib/theme-chalk/index.css';

Vue.prototype.$http = axios
axios.defaults.baseURL = 'http://www.cms-server.localhost.com/api/'
axios.interceptors.request.use(config => {
  console.log(config.header.status)
  config.headers.Token = window.sessionStorage.getItem('token')
  return config
})
axios.interceptors.response.use(config => {
  console.log(config.header.status)
})
axios.interceptors.response
Vue.config.productionTip = false
Vue.component('tree-table', TreeTable)
Vue.use(VueQuillEditor)
Vue.filter('dateFormat', function(val) {
  const dt = new Date(val)
  const y = dt.getFullYear()
  const m = (dt.getMonth() + 1 + '').padStart(2, '0')
  const d = (dt.getDate() + '').padStart(2, 0)

  const h = (dt.getHours() + '').padStart(2, 0)
  const i = (dt.getMinutes() + '').padStart(2, 0)
  const s = (dt.getSeconds() + '').padStart(2, 0)

  return y + '-' + m + '-' + d + ' ' + h + ':' + i + ':' + s
})

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')