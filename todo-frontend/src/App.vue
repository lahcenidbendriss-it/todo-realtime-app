<template>
  <div class="container">
    <h1>📝 To-Do Real-Time App</h1>

    <nav>
      <router-link to="/tasks">📋 Tâches</router-link> |
      <router-link to="/notifications">🔔 Notifications</router-link>
    </nav>

    <!-- Composant de notifications (optionnel si utilisé dans une route) -->
    <Notifications />

    <!-- Vue liée à la route actuelle -->
    <router-view />
  </div>
</template>

<script setup>
import Notifications from './components/Notifications.vue'
</script>

<style>
.container {
  max-width: 600px;
  margin: auto;
  padding: 2rem;
  font-family: sans-serif;
}
</style>
