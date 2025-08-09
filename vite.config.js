import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/booking-detail.js',
                'resources/js/doctor-page.js',
                'resources/js/payment.js',
                'resources/js/bootstrap.js',
            ],
            refresh: true,
        }),
    ],
});
