<script setup lang="ts">
import { ref } from 'vue'
import { MessageSquare, Clock, Plus, Search } from 'lucide-vue-next'

const prompts = ref([
  { id: 1, text: "SQL Injection check on login", time: "2h ago" },
  { id: 2, text: "XSS vulnerability in search", time: "5h ago" },
  { id: 3, text: "CSRF token validation", time: "1d ago" },
  { id: 4, text: "Scan api/v1/users endpoint", time: "2d ago" },
])
</script>

<template>
  <aside class="history-sidebar glass-panel">
    <div class="sidebar-header">
      <button class="btn-primary new-chat-btn">
        <Plus :size="18" />
        <span>New Prompt</span>
      </button>
    </div>

    <div class="search-box">
      <Search :size="16" class="search-icon" />
      <input type="text" placeholder="Search history..." class="input-field search-input" />
    </div>

    <div class="history-list">
      <div class="list-title">
        <Clock :size="14" />
        <span>Recent Prompts</span>
      </div>
      
      <div v-for="prompt in prompts" :key="prompt.id" class="history-item">
        <MessageSquare :size="16" class="item-icon" />
        <div class="item-content">
          <p class="item-text">{{ prompt.text }}</p>
          <span class="item-time">{{ prompt.time }}</span>
        </div>
      </div>
    </div>
  </aside>
</template>

<style scoped>
.history-sidebar {
  width: 280px;
  height: calc(100vh - 100px);
  margin: 0 0 16px 16px;
  display: flex;
  flex-direction: column;
  border-radius: 12px;
  overflow: hidden;
}

.sidebar-header {
  padding: 20px 16px;
  border-bottom: 1px solid var(--glass-border);
}

.new-chat-btn {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
}

.search-box {
  padding: 16px;
  position: relative;
  border-bottom: 1px solid var(--glass-border);
}

.search-icon {
  position: absolute;
  left: 28px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--text-muted);
}

.search-input {
  padding-left: 40px;
  border: none;
  background: rgba(255, 255, 255, 0.05);
  font-size: 0.9rem;
}

.history-list {
  padding: 16px;
  overflow-y: auto;
  flex: 1;
}

.history-list::-webkit-scrollbar {
  width: 4px;
}
.history-list::-webkit-scrollbar-thumb {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 4px;
}

.list-title {
  display: flex;
  align-items: center;
  gap: 8px;
  color: var(--text-muted);
  font-size: 0.8rem;
  font-weight: 600;
  text-transform: uppercase;
  margin-bottom: 12px;
  padding-left: 8px;
}

.history-item {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  padding: 12px;
  border-radius: 8px;
  cursor: pointer;
  transition: background 0.2s;
}

.history-item:hover {
  background: rgba(255, 255, 255, 0.08);
}

.item-icon {
  color: var(--text-muted);
  margin-top: 2px;
}

.item-content {
  flex: 1;
  overflow: hidden;
}

.item-text {
  font-size: 0.9rem;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  margin-bottom: 4px;
}

.item-time {
  font-size: 0.75rem;
  color: var(--text-muted);
}
</style>
