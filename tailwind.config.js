const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    mode: "jit",
    purge: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        './resources/**/*.blade.php',  // broader to include all Blade views
        './resources/**/*.js',         // include Vue or other JS files
        './resources/**/*.vue',        // if you're using Vu
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Open Sans', 'Roboto', 'Helvetica', 'Arial', 'sans-serif'], // Set Open Sans as the first option
                poppins: ["Poppins"],
            },
            colors: {
                primary: "#222439",
            },
            boxShadow: {
                soft: "0 0 20px rgba(0, 0, 0, 0.08)",
            },
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },

    plugins: [require("@tailwindcss/forms"), require("daisyui")],

    daisyui: {
        styled: false,
    },
};
