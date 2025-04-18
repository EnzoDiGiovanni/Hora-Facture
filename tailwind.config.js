import forms from "@tailwindcss/forms";
import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                fadeIn: {
                    "0%": { opacity: 0 },
                    "100%": { opacity: 1 },
                },
                slideIn: {
                    "0%": { transform: "translateY(20px)", opacity: 0 },
                    "100%": { transform: "translateY(0)", opacity: 1 },
                },
            },
            animation: {
                "fade-in": "fadeIn 0.5s ease-out forwards",
                "slide-in": "slideIn 0.5s ease-out forwards",
            },
        },
    },

    plugins: [forms],
};
