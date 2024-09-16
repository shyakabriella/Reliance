// vite.config.js

import { defineConfig } from 'vite';

async function setupViteConfig() {
  const laravel = (await import('laravel-vite-plugin')).default;

  return defineConfig({
    plugins: [
      laravel({
        input: ['resources/css/app.css', 'resources/js/app.js'],
        refresh: true,
      }),
    ],
    build: {
      outDir: 'public/build',
    }
  });
}

export default setupViteConfig();
