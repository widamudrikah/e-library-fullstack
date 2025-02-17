import defaultTheme from 'tailwindcss/defaultTheme';

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
                primary: '#5352ED',
                secondary: '#FF7F56',
                background: '#F4F6FD'
              },
              fontFamily: {
                playfair: "Playfair Display",
                roboto: "Roboto",
                rubik: "Rubik",
              },
        },
    },
    plugins: [],
};
