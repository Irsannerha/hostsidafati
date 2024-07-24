import { main } from "@popperjs/core";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            backgroundColor: {
                "main-bg": "#ECF0F4",
            },
            colors: {
                "primary-main": "#DAA520",
                "secondary-btn": "#DEDEDE",
                "modal-btn": "#FBFBFB",
                "danger-main": "#FA5246",
                "main-black": "#031E23",
                "main-white": "#FBFBFB",
                "input-border": "rgba(237, 188, 72, 0.40)",
                "input-focus": "#2E6171",
                "input-placeholder": "#9D9D9D",
            },

            borderWidth: {
                1: "0.063rem",
            },

            padding: {
                "1px": "0.063rem",
                "2px": "0.125rem",
                "3px": "0.188rem",
                "4px": "0.25rem",
                "5px": "0.313rem",
                "6px": "0.375rem",
                "8px": "0.5rem",
                "10px": "0.625rem",
                "12px": "0.75rem",
                "14px": "0.875rem",
                "16px": "1rem",
                "18px": "1.125rem",
                "20px": "1.25rem",
                "22px": "1.375rem",
                "24px": "1.5rem",
                "26px": "1.625rem",
                "28px": "1.75rem",
                "30px": "1.875rem",
                "32px": "2rem",
                "34px": "2.125rem",
                "36px": "2.25rem",
                "38px": "2.375rem",
                "40px": "2.5rem",
                "48px": "3rem",
            },

            margin: {
                "1px": "0.063rem",
                "2px": "0.125rem",
                "3px": "0.188rem",
                "4px": "0.25rem",
                "5px": "0.313rem",
                "6px": "0.375rem",
                "8px": "0.5rem",
                "10px": "0.625rem",
                "12px": "0.75rem",
                "14px": "0.875rem",
                "16px": "1rem",
                "18px": "1.125rem",
                "20px": "1.25rem",
                "22px": "1.375rem",
                "24px": "1.5rem",
                "26px": "1.625rem",
                "28px": "1.75rem",
                "30px": "1.875rem",
                "32px": "2rem",
                "34px": "2.125rem",
                "36px": "2.25rem",
                "38px": "2.375rem",
                "40px": "2.5rem",
                "48px": "3rem",
            },

            borderRadius: {
                5: "0.313rem",
                10: "0.625rem",
                11: "0.688rem",
            },

            borderColor: {
                "secondary-border": "#B0B0B0",
            },

            boxShadow: {
                "input-shadow": "1px 1px 8px 0px rgba(20, 33, 39, 0.20)",
            },

            width: {
                "normal-input": "32.5rem",
                "half-input": "15.5rem",
                // "half-input": "15.5rem",
                "file-input": "15rem",
                "primary-btn": "12.5rem",
            },

            height: {
                "normal-input": "3.188rem",
            },
        },
    },
    plugins: [],
};
