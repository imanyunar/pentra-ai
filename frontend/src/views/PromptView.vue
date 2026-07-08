<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { Send, Link as LinkIcon, Sparkles } from 'lucide-vue-next'
import AppHeader from '../components/AppHeader.vue'
import HistorySidebar from '../components/HistorySidebar.vue'

const router = useRouter()
const promptText = ref('')
const isAnalyzing = ref(false)

const analyzePrompt = () => {
  if (!promptText.value.trim()) return
  
  isAnalyzing.value = true
  
  // Simulate analysis delay
  setTimeout(() => {
    isAnalyzing.value = false
    router.push('/report')
  }, 1500)
}
</script>

<template>
  <div class="layout">
    <AppHeader />
    
    <div class="main-content">
      <HistorySidebar class="sidebar-desktop" />
      
      <main class="prompt-area">
        <div class="hero-section animate-fade-in">
          <div class="sparkle-icon">
            <Sparkles :size="32" />
          </div>
          <h1 class="hero-title">What would you like to analyze?</h1>
          <p class="hero-subtitle">Enter a URL or describe a specific vulnerability check</p>
        </div>

        <div class="input-container glass-panel animate-fade-in" style="animation-delay: 0.1s;">
          <div class="input-wrapper">
            <textarea 
              v-model="promptText"
              class="prompt-input"
              placeholder="e.g. Scan https://example.com for XSS vulnerabilities..."
              rows="3"
              @keydown.enter.exact.prevent="analyzePrompt"
            ></textarea>
            
            <div class="input-actions">
              <button class="icon-btn action-btn tooltip-wrapper">
                <LinkIcon :size="18" />
              </button>
              
              <button 
                class="btn-primary send-btn" 
                :class="{ 'is-loading': isAnalyzing }"
                @click="analyzePrompt"
                :disabled="!promptText.trim() || isAnalyzing"
              >
                <span v-if="!isAnalyzing" class="flex-center" style="gap: 8px;">
                  Analyze <Send :size="16" />
                </span>
                <span v-else class="loader"></span>
              </button>
            </div>
          </div>
        </div>
        
        <div class="suggestions animate-fade-in" style="animation-delay: 0.2s;">
          <button class="suggestion-chip">Check SQL Injection</button>
          <button class="suggestion-chip">Scan for CSRF</button>
          <button class="suggestion-chip">Full Domain Scan</button>
        </div>
      </main>
    </div>
  </div>
</template>

<style scoped>
.layout {
  display: flex;
  flex-direction: column;
  height: 100vh;
  overflow: hidden;
}

.main-content {
  display: flex;
  flex: 1;
  overflow: hidden;
}

.sidebar-desktop {
  display: none;
}

@media (min-width: 1024px) {
  .sidebar-desktop {
    display: flex;
  }
}

.prompt-area {
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 24px;
  overflow-y: auto;
  position: relative;
}

.hero-section {
  text-align: center;
  margin-bottom: 48px;
  max-width: 600px;
}

.sparkle-icon {
  color: var(--accent);
  margin-bottom: 16px;
  display: inline-block;
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0% { transform: scale(1); opacity: 0.8; }
  50% { transform: scale(1.1); opacity: 1; filter: drop-shadow(0 0 10px var(--accent)); }
  100% { transform: scale(1); opacity: 0.8; }
}

.hero-title {
  font-size: 2.5rem;
  font-weight: 700;
  margin-bottom: 12px;
  background: linear-gradient(to right, #fff, #a78bfa);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.hero-subtitle {
  font-size: 1.1rem;
  color: var(--text-muted);
}

.input-container {
  width: 100%;
  max-width: 768px;
  padding: 16px;
  transition: transform 0.3s, box-shadow 0.3s;
}

.input-container:focus-within {
  transform: translateY(-2px);
  box-shadow: 0 12px 40px rgba(139, 92, 246, 0.2);
  border-color: rgba(139, 92, 246, 0.5);
}

.input-wrapper {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.prompt-input {
  width: 100%;
  background: transparent;
  border: none;
  color: var(--text);
  font-size: 1.05rem;
  line-height: 1.5;
  resize: none;
  outline: none;
}

.prompt-input::placeholder {
  color: rgba(148, 163, 184, 0.5);
}

.input-actions {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-top: 1px solid rgba(255, 255, 255, 0.05);
  padding-top: 12px;
}

.action-btn {
  color: var(--text-muted);
}

.send-btn {
  min-width: 120px;
}

.send-btn:disabled {
  opacity: 0.5;
  cursor: not-allowed;
  transform: none;
}

.loader {
  width: 20px;
  height: 20px;
  border: 2px solid rgba(255, 255, 255, 0.3);
  border-radius: 50%;
  border-top-color: white;
  animation: spin 1s ease-in-out infinite;
  display: inline-block;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

.suggestions {
  display: flex;
  gap: 12px;
  margin-top: 32px;
  flex-wrap: wrap;
  justify-content: center;
}

.suggestion-chip {
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  color: var(--text-muted);
  padding: 8px 16px;
  border-radius: 20px;
  font-size: 0.9rem;
  transition: all 0.2s;
}

.suggestion-chip:hover {
  background: rgba(255, 255, 255, 0.1);
  color: var(--text);
  border-color: rgba(255, 255, 255, 0.2);
}

@media (max-width: 768px) {
  .hero-title {
    font-size: 1.8rem;
  }
}
</style>
