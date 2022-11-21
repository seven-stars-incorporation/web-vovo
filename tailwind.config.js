/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme');
// const colors = require('tailwindcss/colors');

module.exports = {
  content: [
    "./src/*.{html,php}",
    "./src/views/*.{html,php}",
    "./src/views/*/*.{html,php}",
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Outfit-Variable', ...defaultTheme.fontFamily.sans],
      }
    },
  },
  plugins:[
    require('@tailwindcss/aspect-ratio'),
  ]
}
