import './bootstrap';


import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');

// Inisialisasi Laravel Echo dengan Pusher
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.PUSHER_APP_KEY,
    cluster: process.env.PUSHER_APP_CLUSTER,
    forceTLS: true
});
