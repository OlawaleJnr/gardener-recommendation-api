const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
    fontFamily: {
      sans: ['Karla', 'san-serif']
    }
  },
  plugins: [
    require('daisyui')
  ],
  daisyui: {
    styled: true,
    themes: [
      'cupcake',
      {
        mytheme: {
          "primary": "#3505c4",
          "secondary": "#43f971",
          "success": "#0C6A41",
          "error": "#FA0A16",
          "info": "#79D0E2",
          "neutral": "#281D30",
          "warning": "#D8B118"
        }
      }
    ],
    base: true,
    utils: true,
    logs: true,
    rtl: false
  }
}
