const mix = require("laravel-mix");

mix
  .js("src/js/app.js", "public/js/ih-gdpr-public.js")
  .sass("src/scss/main.scss", "public/css/ih-gdpr-public.css");
