import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    // Cette ligne est la clé : elle permet d'activer le mode sombre
    // via une classe CSS pilotée par ton bouton JavaScript.
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            // Tu peux ajouter ici des personnalisations de couleurs
            // si tu souhaites un sombre plus spécifique à l'avenir.
        },
    },

    plugins: [forms],
};
