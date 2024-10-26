const colors = require('tailwindcss/colors')

import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */

module.exports = {
    darkMode: 'class', // This specifies that Tailwind should look at Class elements to determine dark mode
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    colors: {
        'blue': '#1fb6ff',
        'pink': '#ff49db',
        'orange': '#ff7849',
        'green': '#13ce66',
        'gray-dark': '#273444',
        'gray': '#8492a6',
        'gray-light': '#d3dce6',
        'whitesmoke': '#151515',
        'reddy': '#FF0000'
    },
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
            },
            fontFamily: {
                'garamond': ["Garamond"],
                'greatvibes': ["Great Vibes"],
                'roboto': ["Roboto"]
            }
        },
    },
    plugins: [],
};
