/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#009A4B", // <- ini primary color
            },
        },
    },
    plugins: [require("preline/plugin")],

    darkMode: "class",
};
