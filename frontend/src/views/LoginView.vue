<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const isLogin = ref(true)
const email = ref('')
const password = ref('')

const toggleMode = () => {
  isLogin.value = !isLogin.value
}

const handleSubmit = (e: Event) => {
  e.preventDefault()
  // Simulate login
  setTimeout(() => {
    router.push('/')
  }, 500)
}
</script>

<template>
  <div class="login-container flex-center">
    <div class="background-elements">
      <div class="blob blob-1"></div>
      <div class="blob blob-2"></div>
    </div>
    
    <div class="login-card glass-panel animate-fade-in">
      <div class="card-header">
        <h1 class="logo-text">Pentra<span class="logo-accent">AI</span></h1>
        <p class="subtitle">{{ isLogin ? 'Welcome back' : 'Create an account' }}</p>
      </div>

      <form @submit="handleSubmit" class="login-form">
        <div class="form-group">
          <label>Email Address</label>
          <input 
            type="email" 
            v-model="email" 
            class="input-field" 
            placeholder="you@example.com" 
            required 
          />
        </div>
        
        <div class="form-group">
          <label>Password</label>
          <input 
            type="password" 
            v-model="password" 
            class="input-field" 
            placeholder="••••••••" 
            required 
          />
        </div>

        <button type="submit" class="btn-primary submit-btn">
          {{ isLogin ? 'Sign In' : 'Sign Up' }}
        </button>
      </form>

      <div class="card-footer">
        <p class="toggle-text">
          {{ isLogin ? "Don't have an account?" : "Already have an account?" }}
          <button type="button" class="text-btn" @click="toggleMode">
            {{ isLogin ? 'Sign up' : 'Log in' }}
          </button>
        </p>
      </div>
    </div>
  </div>
</template>

<style scoped>
.login-container {
  min-height: 100vh;
  position: relative;
  overflow: hidden;
}

.background-elements {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 0;
  pointer-events: none;
}

.blob {
  position: absolute;
  border-radius: 50%;
  filter: blur(80px);
  opacity: 0.5;
  animation: float 10s infinite alternate ease-in-out;
}

.blob-1 {
  top: -10%;
  left: -10%;
  width: 50vw;
  height: 50vw;
  background: var(--accent);
}

.blob-2 {
  bottom: -20%;
  right: -10%;
  width: 60vw;
  height: 60vw;
  background: #3b82f6;
  animation-delay: -5s;
}

@keyframes float {
  0% { transform: translate(0, 0) scale(1); }
  100% { transform: translate(5%, 10%) scale(1.1); }
}

.login-card {
  width: 100%;
  max-width: 420px;
  padding: 40px;
  position: relative;
  z-index: 1;
}

.card-header {
  text-align: center;
  margin-bottom: 32px;
}

.logo-text {
  font-size: 2rem;
  font-weight: 800;
  margin-bottom: 8px;
}

.logo-accent {
  color: var(--accent);
}

.subtitle {
  color: var(--text-muted);
  font-size: 0.95rem;
}

.login-form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.form-group label {
  font-size: 0.85rem;
  font-weight: 500;
  color: var(--text-muted);
}

.submit-btn {
  margin-top: 12px;
  height: 48px;
  font-size: 1rem;
}

.card-footer {
  margin-top: 24px;
  text-align: center;
}

.toggle-text {
  color: var(--text-muted);
  font-size: 0.9rem;
}

.text-btn {
  color: var(--accent);
  font-weight: 600;
  margin-left: 4px;
}

.text-btn:hover {
  text-decoration: underline;
}

@media (max-width: 480px) {
  .login-card {
    padding: 32px 24px;
    margin: 16px;
  }
}
</style>
