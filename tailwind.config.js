/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}", 
            "./views/home/*.php",
            "./views/*.php",
            "./views/user/*.php",
            "./views/contact/*.php",
            "./views/search/*.php",
            "./views/profile/*.php",
            "./views/includes/*.php",
          ],
  theme: {
    extend: {
      colors: {
        footer: '#004930',
        DDDDDD: '#DDDDDD',
        subfooter: '#33B133',
        DDD: '#D9D9D9',
      },
    },
  },
  plugins: [],
};
