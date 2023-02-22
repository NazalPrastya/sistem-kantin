/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            backgroundImage: {
                wave: "url('/img/login/wave.svg)",
            },
            container: {
                center: true,
                padding: "36px",
            },
            screens: {
                "2xl": "1320px",
            },
            colors: {
                primary: "rgb(250 204 21);",
                oren: "#FFAA29",
            },

            keyframes: {
                wiggle: {
                    "0%, 100%": { transform: "rotate(-3deg)" },
                    "50%": { transform: "rotate(3deg)" },
                },
            },
            animation: {
                wiggle: "wiggle 3s ease-in-out infinite",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
