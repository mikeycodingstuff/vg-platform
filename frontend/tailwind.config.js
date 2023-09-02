/** @type {import('tailwindcss').Config} */
/*eslint-env node*/
module.exports = {
  content: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  theme: {
    extend: {
      colors: {
        main: 'var(--color-main)',
        text: 'var(--color-text)',
        background: 'var(--color-background)',
        sub: 'var(--color-sub)',
        'sub-alt': 'var(--color-sub-alt)',
      },
    },
  },
  plugins: [],
};