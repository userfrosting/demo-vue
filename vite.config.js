import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [vue()],
    server: {
        fs: {
            // Allow serving files from one level up to the project root.
            // Required for local testing, not required in normal project.
            allow: ['..']
        },
        cors: true,
        strictPort: true,
        port: 3000
    },
    root: 'app/assets/',
    build: {
        outDir: '../../public',
        emptyOutDir: true,
        manifest: true,
        rollupOptions: {
            input: {
                main: 'app/assets/main.ts'
            }
        }
    },

    // Add UIKit alias : https://stackoverflow.com/a/75264118/445757
    resolve: {
        alias: {
            '../../images/backgrounds': 'uikit/src/images/backgrounds',
            '../../images/components': 'uikit/src/images/components',
            '../../images/icons': 'uikit/src/images/icons'
        }
    }
})
