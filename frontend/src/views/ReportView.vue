<script setup lang="ts">
import { Download, AlertTriangle, ShieldCheck, FileText } from 'lucide-vue-next'
import AppHeader from '../components/AppHeader.vue'
import VulnerabilityChart from '../components/VulnerabilityChart.vue'

const exportPDF = () => {
  alert('Exporting PDF... (This is a UI placeholder)')
}
</script>

<template>
  <div class="layout">
    <AppHeader />
    
    <main class="report-area">
      <div class="report-container">
        <div class="report-header animate-fade-in">
          <div>
            <h1 class="report-title">Scan Report</h1>
            <p class="report-subtitle">Analysis for https://example.com • Completed just now</p>
          </div>
          <button class="btn-primary export-btn" @click="exportPDF">
            <Download :size="18" />
            Export PDF
          </button>
        </div>

        <div class="report-grid">
          <!-- Vulnerability Description -->
          <div class="card glass-panel animate-fade-in" style="animation-delay: 0.1s;">
            <div class="card-header-icon">
              <AlertTriangle class="text-danger" />
              <h2>Vulnerability Summary</h2>
            </div>
            <div class="card-body">
              <p class="description">
                Our analysis detected <strong>3 High-Risk</strong> vulnerabilities primarily related to Cross-Site Scripting (XSS) in the search parameters. Additionally, several medium-risk issues regarding missing security headers were found.
              </p>
              
              <div class="findings-list">
                <div class="finding-item critical">
                  <span class="severity-badge high">High</span>
                  <div class="finding-content">
                    <h4>Reflected XSS</h4>
                    <p>/search?q= parameter is vulnerable to script injection.</p>
                  </div>
                </div>
                <div class="finding-item">
                  <span class="severity-badge medium">Medium</span>
                  <div class="finding-content">
                    <h4>Missing CSP Header</h4>
                    <p>Content-Security-Policy header is not configured.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Chart Section -->
          <div class="card glass-panel animate-fade-in" style="animation-delay: 0.2s;">
            <div class="card-header-icon">
              <ShieldCheck class="text-success" />
              <h2>Risk Distribution</h2>
            </div>
            <div class="card-body">
              <VulnerabilityChart />
            </div>
          </div>
          
          <!-- Recommendations Section -->
          <div class="card glass-panel full-width animate-fade-in" style="animation-delay: 0.3s;">
            <div class="card-header-icon">
              <FileText class="text-accent" />
              <h2>Recommendations</h2>
            </div>
            <div class="card-body">
              <ul class="recommendation-list">
                <li>Implement strict input validation and output encoding for all user-supplied data in the search function.</li>
                <li>Configure a robust Content-Security-Policy (CSP) to mitigate XSS risks.</li>
                <li>Ensure all session cookies are marked with Secure and HttpOnly flags.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<style scoped>
.layout {
  display: flex;
  flex-direction: column;
  height: 100vh;
  overflow: hidden;
}

.report-area {
  flex: 1;
  overflow-y: auto;
  padding: 24px;
}

.report-container {
  max-width: 1200px;
  margin: 0 auto;
}

.report-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 32px;
}

.report-title {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 8px;
}

.report-subtitle {
  color: var(--text-muted);
}

.export-btn {
  display: flex;
  align-items: center;
  gap: 8px;
}

.report-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 24px;
}

@media (min-width: 992px) {
  .report-grid {
    grid-template-columns: 1.5fr 1fr;
  }
}

.card {
  padding: 24px;
  display: flex;
  flex-direction: column;
}

.full-width {
  grid-column: 1 / -1;
}

.card-header-icon {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 20px;
  border-bottom: 1px solid var(--glass-border);
  padding-bottom: 16px;
}

.card-header-icon h2 {
  font-size: 1.25rem;
  font-weight: 600;
}

.text-danger { color: #ef4444; }
.text-success { color: #10b981; }
.text-accent { color: var(--accent); }

.description {
  line-height: 1.6;
  margin-bottom: 24px;
}

.findings-list {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.finding-item {
  display: flex;
  gap: 16px;
  padding: 16px;
  background: rgba(255, 255, 255, 0.03);
  border-radius: 8px;
  border: 1px solid var(--glass-border);
}

.finding-item.critical {
  border-color: rgba(239, 68, 68, 0.3);
  background: rgba(239, 68, 68, 0.05);
}

.severity-badge {
  padding: 4px 8px;
  border-radius: 4px;
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  height: fit-content;
}

.severity-badge.high {
  background: rgba(239, 68, 68, 0.2);
  color: #f87171;
}

.severity-badge.medium {
  background: rgba(245, 158, 11, 0.2);
  color: #fbbf24;
}

.finding-content h4 {
  font-size: 1rem;
  margin-bottom: 4px;
}

.finding-content p {
  font-size: 0.9rem;
  color: var(--text-muted);
}

.recommendation-list {
  margin: 0;
  padding-left: 20px;
  color: var(--text-muted);
}

.recommendation-list li {
  margin-bottom: 12px;
  line-height: 1.5;
}

.recommendation-list li:last-child {
  margin-bottom: 0;
}

@media (max-width: 768px) {
  .report-header {
    flex-direction: column;
    gap: 16px;
  }
}
</style>
