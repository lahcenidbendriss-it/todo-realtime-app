<!-- src/pages/Notifications.vue -->
<template>
  <div>
    <h2>📢 Notifications reçues</h2>
    <ul>
      <li v-for="task in tasks" :key="task.id">
        ✅ Tâche créée : {{ task.title }}
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import echo from '../echo'

const tasks = ref([])

onMounted(() => {
  echo.channel('tasks')
    .listen('.task.created', (e) => {
      tasks.value.unshift(e.task)
    })
})
</script>
