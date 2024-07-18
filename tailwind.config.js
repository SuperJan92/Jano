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
      },
      fontSize: {
        'h1': '48px',
        'h2': '36px',
        'h3': '30px',
        'h4': '24px',
        'h5': '20px',
        'h6': '16px',
      },
    },
  },
  plugins: [],
}

