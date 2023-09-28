
# Pemetaan Pegawai pada Kejaksaan Tinggi Jawa Timur (E-Map Kejati Jatim)

Merupakan perangkat lunak berbasis web yang berbasis teknologi laravel. Fokus pengembangan aplikasi terletak pada pemetaan pegawai pada tiap - tiap satuan kerja dalam wilayah kerja Kejaksaan Tinggi Jawa Timur.



## Screenshots




## Tech Stack

**Client :** Bootstrap (CSS Framework), HTML, Javascript.

**Server :** Laravel (PHP Framework), Javascript.

**Library :** Leaflet (JS), Open Street Map (JS)


## Deployment

Untuk menggunakan proyek kalian bisa ikuti langkah dibawah ini :

Mulai dengan clone project dengan mengetikkan command berikut di terminal / Command Prompt.

```bash
  git clone https://github.com/GGoldy/pemetaan-eselon-kejaksaan-jatim.git
```

Setelah selesai clone project kalian bisa masuk ke proyek tersebut.
```bash
  cd pemetaan-eselon-kejaksaan-jatim
```

Jalankan XAMPP atau server yang kalian gunakan, pada pengembangan proyek ini dites menggunakan XAMPP dengan mengaktifkan server database (phpmyadmin) dam web server (apache)

Lalu lakukan import terhadap file sql 'kejati_jatim.sql' untuk ditaruh pada database kita (file tersebut sudah ada didalam folder proyek pada root folder), contoh yang digunakan pada proyek ini adalah XAMPP. Maka import file tersebut ke dalam phpmyadmin atau database yang kalian gunakan.

Untuk menjalankan project tersebut kalian bisa membuka 2 terminal yang berbeda di dalam folder proyek tersebut lalu ketikkan 2 perintah dibawah ini pada 2 terminal yang berbeda 
```bash
  php artisan serve
```
```bash
  npm run dev
```

Setelah berhasil menjalankan kedua perintah tersebut, kita bisa akses aplikasinya dengan mengetikkan alamat 'localhost:8000' pada broswser (tanpa tanda petik).

**Catatan : Untuk login sebagai admin kalian bisa mengisi dengan email "admin@admin" dan password "adminadmin"**

Selamat proyek berhasil dijalankan!
## FAQ

#### Library apa saja yang digunakan dalam proyek tersebut?

Kami menggunakan library leaflet untuk menampilkan MAP, serta bundle laravel default seperti vite.

#### Apakah boleh aplikasi digunakan secara umum?

Boleh, kalian bebas mengubah, menghapus, dan menambahkan kekurangan fitur yang ada selama proyek digunakan sebagai bahan pembelajaran dan bukan komersil.


## Authors

- [@GGoldy](https://github.com/GGoldy)

- [@BryaanF](https://github.com/BryaanF)