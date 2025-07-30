# ✅ To-Do Real-Time App

Une application Laravel + Vue.js avec tâches et notifications en temps réel.

##  Backend (Laravel)
```bash
cd todo-backend
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
 Frontend (Vue.js)
bash
Copy
Edit
cd todo-frontend
npm install
npm run dev
🔐 Authentification
Enregistrez un utilisateur via /api/auth/register

Connectez-vous via /api/auth/login

 Notifications
Les tâches créées déclenchent un événement en temps réel via Pusher
