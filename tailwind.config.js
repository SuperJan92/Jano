/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    '**/*.twig',
  ],
  theme: {
    extend: {
      fontSize: {
        '6xl': '3.75rem',
      },
      colors: {
        'custom-orange': '#ff9d20',
        'custom-lightgray': '#797e86',
        'custom-darkgray': '#60666f',
        'custom-gray': '#bdbfc3',
      },
    },
      fontFamily: {
        'goldplay': ['goldplay', 'sans-serif'],
      },
      typography: {
        p: {
          fontFamily: ["Roboto", "sans-serif"],
        },
      },
    },
  }


