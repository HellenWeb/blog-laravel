import { createRouter, createWebHashHistory } from 'vue-router'
import MyHome from '@/views/Home'
import MyAbout from '@/views/About'

// Routes

const routes = [
  { path: '/', name: 'MyHome', component: MyHome },
  { path: '/about', name: 'MyAbout', component: MyAbout }
]

// Router

const router = createRouter({
  history: createWebHashHistory,
  routes
})

export default router
