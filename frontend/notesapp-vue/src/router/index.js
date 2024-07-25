import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginView from '../views/LoginView.vue'
import SignupView from '../views/SignupView.vue'
import CreateView from '@/views/CreateView.vue'
import EditView from '@/views/EditView.vue'
import ArchivedNotesView from '@/views/ArchivedNotesView.vue'
import CreateCategoryView from '@/views/CreateCategoryView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/login',
      name: 'Login',
      component: LoginView
    },
    {
      path: '/signup',
      name: 'Signup',
      component: SignupView
    },
    {
      path: '/create',
      name: 'create',
      component: CreateView
    },
    {
      path: '/edit/:id',
      name: 'edit',
      component: EditView
    },
    {
      path: '/archived-notes',
      name: 'archived',
      component: ArchivedNotesView
    },
    {
      path: '/create-category',
      name: 'create-category',
      component: CreateCategoryView
    }
  ]
})

export default router
