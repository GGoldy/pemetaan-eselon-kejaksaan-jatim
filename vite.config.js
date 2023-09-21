import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/sass/app.scss",
        "resources/js/app.js",
        "resources/css/app.css",
      ],
      refresh: true,
    }),
  ],
  // Use it when want to test in mobile device
  // run this in terminal 'php artisan serve --host your-local-ip-address'
  // and this 'npm run dev --host'
  // server: {
  //   host: "your-local-ipaddress",
  // },
});
