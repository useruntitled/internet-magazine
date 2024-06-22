/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],
    safelist: [
        {
            pattern: /w-(100|200|300)]/,
        },
    ],
    theme: {
        extend: {},
    },
    darkMode: "selector",
    plugins: [],
};
