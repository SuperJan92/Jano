/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    '**/*.twig',
  ],
  theme: {
    fontFamily: {
      Filson: ["Filson", "sans-serif"],
      Roboto: ["Roboto", "sans-serif"],
    },
    extend: {
      colors: {
        'Orange':'#ff9d21',
      },
      fontSize: {
        'h1': '70px',
        'h2': '36px',
        'h3': '30px',
        'h4': '24px',
        'h5': '20px',
        'h6': '16px',
      },
      typography: {
        p: {
          fontFamily: ["Roboto", "sans-serif"],
        },
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}

