/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    '**/*.twig',
  ],
  theme: {
    extend: {
      colors: {
        orange: {
          600: '#f3a932',
        },
      }
    },
  },
  plugins: [],
}

