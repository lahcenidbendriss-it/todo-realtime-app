<template>
  <form @submit.prevent="submitTask">
    <div>
      <label for="title">Titre :</label>
      <input id="title" v-model="title" required />
    </div>
    <div>
      <label for="description">Description :</label>
      <textarea id="description" v-model="description" required></textarea>
    </div>
    <button type="submit">Créer la tâche</button>
  </form>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'

const title = ref('')
const description = ref('')

const submitTask = async () => {
  try {
    const token = localStorage.getItem('token')
    const response = await axios.post('http://localhost:8000/api/tasks', {
      title: title.value,
      description: description.value
    }, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    })

    alert('✅ Tâche créée avec succès')
    title.value = ''
    description.value = ''
  } catch (error) {
    console.error(error)
    alert('❌ Erreur lors de la création de la tâche')
  }
}
</script>

<style scoped>
form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

input, textarea {
  padding: 0.5rem;
  font-size: 1rem;
}
</style>
