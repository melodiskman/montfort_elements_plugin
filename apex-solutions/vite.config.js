import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

// Dev server must accept the sandbox preview host (its id rotates), so allow all hosts.
export default defineConfig({
  plugins: [react()],
  server: {
    host: true,
    port: 5173,
    strictPort: true,
    allowedHosts: true,
  },
})
