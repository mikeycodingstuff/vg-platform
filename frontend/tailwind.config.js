/** @type {import('tailwindcss').Config} */
/*eslint-env node*/
module.exports = {
  content: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  theme: {
    extend: {
      colors: {
        theme: {
          main: 'var(--color-main)',
          text: 'var(--color-text)',
          bg: 'var(--color-bg)',
          sub: 'var(--color-sub)',
          'sub-alt': 'var(--color-sub-alt)',
        },
      },
    },
  },
  plugins: [],
};
