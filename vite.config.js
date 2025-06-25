import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/animation.js',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/horizontal.js',
                'resources/js/info.js',
                'resources/js/magnetic.js',
                'resources/js/menu.js',
                'resources/js/mouse.js',
                'resources/js/myscript.js',
                'resources/js/passion.js',
                'resources/js/turn.min.js',
                'resources/js/voice.js',
            ],
            refresh: true,
        }),
    ],
});
