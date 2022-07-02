import { createRouter, createWebHashHistory } from 'vue-router'
import MyHome from '@/views/Home'
import MyAbout from '@/views/About'
import MyReg from '@/views/Register'

// Routes

const routes = [
  { path: '/', name: 'MyHome', component: MyHome },
  { path: '/about', name: 'MyAbout', component: MyAbout },
  { path: '/register', name: 'MyReg', component: MyReg }
]

// Router

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
