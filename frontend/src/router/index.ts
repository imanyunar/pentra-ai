import { createRouter, createWebHistory } from 'vue-router'
import PromptView from '../views/PromptView.vue'
import LoginView from '../views/LoginView.vue'
import ReportView from '../views/ReportView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/',
      name: 'prompt',
      component: PromptView
    },
    {
      path: '/report',
      name: 'report',
      component: ReportView
    }
  ]
})

export default router
