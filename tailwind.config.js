/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/css/**/*.scss",
  ],
  theme: {
    extend: {
      colors: {
        'background': '#1e1e2a',
        'foreground': '#f4f4f8',
        'card': '#393950',
        'popover': '#1e1e2a',
        'primary': '#8727b5',
        'secondary': '#6b1f8f',
        'muted': '#2b2f3e',
        'accent': '#2b2f3e',
        'destructive': '#e04a4a',
        'border': '#2b2f3e',
        'input': '#2b2f3e',
        'ring': '#6b1f8f',
        'chart-1': '#3498db',
        'chart-2': '#2c6e6f',
        'chart-3': '#f5b842',
        'chart-4': '#9b4d8a',
        'chart-5': '#d84a5a',
      },
    },
    plugins: [],
  }
}
