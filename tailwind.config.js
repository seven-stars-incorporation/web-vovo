/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme');
// const colors = require('tailwindcss/colors');

module.exports = {
  content: [
    "./src/*.{html,js,php}",
    "./src/*/*.{html,js,php}",
    "./src/views/*.{html,js,php}",
    "./src/views/layouts/*.{html,js,php}",
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Outfit', ...defaultTheme.fontFamily.sans],
      }
    },
    // colors: {
    //   ...colors
    // }
  },
  plugins: [
    require('@tailwindcss/aspect-ratio'),
  ],
}
