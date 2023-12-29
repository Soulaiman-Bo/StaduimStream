/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}", 
            "./views/home/*.php",
            "./views/*.php",
            "./views/user/*.php",
            
            "./views/search/*.php",
          ],
  theme: {
    extend: {},
  },
  plugins: [],
};
