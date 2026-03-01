// vite.config.js
import {defineConfig} from 'vite'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    base: './',
    plugins: [tailwindcss()],

    build: {
        manifest: false,
        outDir: 'dist',
        emptyOutDir: true,

        rollupOptions: {
            input: {
                style: './assets/css/style.css',
                main: './assets/js/main.js',
            },

            output: {
                entryFileNames: 'assets/[name].js',
                chunkFileNames: 'assets/[name].js',
                assetFileNames: 'assets/[name].[ext]',
            },
        },
    }

})