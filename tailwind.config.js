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
                "modal-btn": "#FBFBFB",
            },

            borderRadius: {
                10: "0.625rem",
                11: "0.688rem",
            },

            borderColor: {
                "secondary-border": "#B0B0B0",
            },
        },
    },
    plugins: [],
};
