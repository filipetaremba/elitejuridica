/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.php",
    "./app/Views/**/*.html",
    "./public/assets/js/**/*.js",
  ],

  theme: {
    extend: {
      colors: {
        brand: "#373737",
        dark: "#111111",
        mid: "#555555",
        soft: "#999999",
        border: "#E5E5E5",
        offwhite: "#F7F7F7",
      },

      fontFamily: {
        sans: ['"Antonio"', "sans-serif"],
      }
    }
  },

  plugins: [],
}