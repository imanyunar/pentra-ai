<script setup lang="ts">
import { ref } from 'vue'
import { Menu, User, Settings, LayoutDashboard } from 'lucide-vue-next'

const menuOpen = ref(false)

const toggleMenu = () => {
  menuOpen.value = !menuOpen.value
}
</script>

<template>
  <header class="app-header glass-panel">
    <div class="header-left">
      <button @click="toggleMenu" class="icon-btn">
        <Menu />
      </button>
      <div class="logo">
        <span class="logo-text">Pentra<span class="logo-accent">AI</span></span>
      </div>
    </div>
    
    <nav class="navbar" :class="{ 'nav-open': menuOpen }">
      <router-link to="/" class="nav-link">
        <LayoutDashboard :size="18" />
        Overview
      </router-link>
      <router-link to="/report" class="nav-link">
        <User :size="18" />
        User
      </router-link>
      <router-link to="/login" class="nav-link">
        <Settings :size="18" />
        Profile
      </router-link>
    </nav>

    <div class="header-right">
      <div class="user-profile">
        <div class="avatar">
          <User :size="20" />
        </div>
      </div>
    </div>
  </header>
</template>

<style scoped>
.app-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 24px;
  margin: 16px;
  position: sticky;
  top: 16px;
  z-index: 100;
  border-radius: 12px;
}

.header-left {
  display: flex;
  align-items: center;
  gap: 16px;
}

.icon-btn {
  color: var(--text);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 8px;
  border-radius: 8px;
  transition: background 0.2s;
}

.icon-btn:hover {
  background: rgba(255, 255, 255, 0.1);
}

.logo-text {
  font-size: 1.25rem;
  font-weight: 700;
  letter-spacing: -0.5px;
}

.logo-accent {
  color: var(--accent);
}

.navbar {
  display: flex;
  gap: 8px;
}

.nav-link {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 8px 16px;
  border-radius: 8px;
  font-size: 0.9rem;
  font-weight: 500;
  color: var(--text-muted);
  transition: all 0.2s;
}

.nav-link:hover, .router-link-active {
  color: white;
  background: rgba(255, 255, 255, 0.1);
}

.router-link-active {
  color: var(--accent);
  background: rgba(139, 92, 246, 0.1);
}

.user-profile {
  display: flex;
  align-items: center;
}

.avatar {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: var(--accent);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
  cursor: pointer;
  transition: transform 0.2s;
}

.avatar:hover {
  transform: scale(1.05);
}

@media (max-width: 768px) {
  .navbar {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    flex-direction: column;
    background: var(--glass-bg);
    backdrop-filter: blur(12px);
    padding: 16px;
    border-radius: 12px;
    margin-top: 8px;
    border: 1px solid var(--glass-border);
  }
  
  .navbar.nav-open {
    display: flex;
  }
}
</style>
