const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // para crear tonalidades semitransparentes para una ventana modal
                'smoke-darkest': 'rgba(0, 0, 0, 0.9)',
                'smoke-darker': 'rgba(0, 0, 0, 0.75)',
                'smoke-dark': 'rgba(0, 0, 0, 0.6)',
                'smoke': 'rgba(0, 0, 0, 0.5)',
                'smoke-light': 'rgba(0, 0, 0, 0.4)',
                'smoke-lighter': 'rgba(0, 0, 0, 0.25)',
                'smoke-lightest': 'rgba(0, 0, 0, 0.1)',
                'enlaces': '#E9571E',
            },
            backgroundColor: {
                'cabecera': "#333333",
                'fondo': "#444344",
            },
            height: {
                "10v": "10vh",
                "15v": "15vh",
                "65v": "65vh",
                "20v": "20vh",
                "30v": "30vh",
                "40v": "40vh",
                "50v": "50vh",
                "60v": "60vh",
                "70v": "70vh",
                "80v": "80vh",
                "90v": "90vh",
                "100v": "100vh",
            },
            width : {
                "10v": "10vh",
                "15v": "15vh",
                "65v": "65vh",
                "20v": "20vh",
                "30v": "30vh",
                "40v": "40vh",
                "50v": "50vh",
                "60v": "60vh",
                "70v": "70vh",
                "80v": "80vh",
                "90v": "90vh",
                "100v": "100vh",
            },

        },

    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
