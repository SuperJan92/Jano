/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    '**/*.twig',
  ],
  theme: {
    fontFamily: {
      Square: ["Square", "sans-serif"],
      Roboto: ["Roboto", "sans-serif"],
    },
    extend: {
      colors: {
        'Orange':'#f3a932',
        'Lightgrey':'#ececec',
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

