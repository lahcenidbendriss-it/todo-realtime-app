// src/router.js
import { createRouter, createWebHistory } from 'vue-router'
import TaskForm from './components/TaskForm.vue'
import Notifications from './components/Notifications.vue'


const routes = [
  { path: '/tasks', component: TaskForm },
  { path: '/notifications', component: Notifications },
]

export default createRouter({
  history: createWebHistory(),
  routes,
})
