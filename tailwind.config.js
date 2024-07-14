/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "primary-main": "#DAA520",
                "secondary-btn": "#DEDEDE",
            },

            borderRadius: {
                11: "11px",
            },

            borderColor: {
                "secondary-border": "#B0B0B0",
            },
        },
    },
    plugins: [],
};
