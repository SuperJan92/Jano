/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    '**/*.twig',
  ],
  theme: {
    fontFamily: {
      Square: ["Square", "sans-serif"],
    },

    extend: {
      colors: {
        'Orange':'#f3a932',
      }
    },
  },
  plugins: [],
}

