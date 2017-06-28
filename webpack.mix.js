const { mix } = require('laravel-mix');

const production = process.env.NODE_ENV === 'production';

mix.js('resources/assets/js/app.js', 'public/js')
    .extract(['vue', 'axios', 'lodash', 'jquery', 'laravel-echo', 'pusher-js', 'moment', 'highlight.js'])
    .sass('resources/assets/sass/app.scss', 'public/css');

if (production) {
    mix.version();
}

