import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import SignInView from '../views/SignInView'
import SignUpView from '../views/SignUpView'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  
  {
    path: '/signIn',
    name: 'signIn',
    component: SignInView
  },
  {
    path: '/signUp',
    name: 'signUp',
    component: SignUpView
  },
 
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
