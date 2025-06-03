HealthMap

  Website ini merupakan sistem pemantauan gizi anak pada tingkat kabupaten. Website ini terintegrasi
  dengan website pemantauan gizi anak di tingkat posyandu/puskesmas (NutrTrack). HealthMap mendukung
  adanya efisiensi pelaporan, pengambilan keputusan berbasis data, dan dukungan untuk anak-anak stunting di
  tingkat kabupaten.

## Features


- **Autentikasi dan Otorisasi**: Pengguna dapat melakukan registrasi, login, dan logout untuk mengakses sistem.
- **Visualisasi Gizi Anak**:
  - Pie chart: Menampilkan proporsi anak dengan gizi buruk dan anak yang memenuhi asupan gizi.
  - Bar chart: Menampilkan jumlah anak bergizi buruk per kecamatan.
- **Dashboard**: Sistem memberikan alert terkait data gizi buruk terbaru.
- **Notifikasi**:
  - Menampilkan jumlah wilayah dengan data gizi terbaru.
  - Menampilkan data anak gizi buruk terbaru tiap posyandu.
- **Detail Data**:
  - Menampilkan detail seluruh data anak.
  - Menampilkan informasi detail setiap kecamatan.
 
  
## Technologies Used

- Framework : Laravel 11, Bootstrap
- Otorisasi dan Autentikasi : Laravel Sanctum dan Spatie
- Arsitektur API : Postman
- Bahasa Pemrograman : PHP, HTML, CSS, JS, Chart.js
- Database: MySQL
- UI/UX : Figma
- Tools General : Draw.io, Google tools, Github, VSCode

## Penggunaan

### Mendaftar dan Login

1. Buka halaman utama HealthMap.
2. Apbila belum terdaftar, klik tombol **"Sign Up"** untuk membuat akun baru.
3. Apabila sudah memiliki akun, login menggunakan akun yang sudah terdaftar untuk mengakses sistem.

### Melihat dan Menganalisis Dashboard

1. Masuk ke dashboard utama setelah login.
2. Gunakan visualisasi (pie chart & bar chart) untuk memahami distribusi data gizi.
3. Lihat alert terbaru yang ada pada dashboard untuk melihat update data terbaru. 
4. Cek notifikasi untuk update data terbaru terkait gizi buruk.
5. Klik pada kecamatan atau posyandu tertentu untuk melihat detail data.
6. Analisis data untuk pengambilan keputusan berbasis wilayah.

### Memantau data terbaru

1. Cek detail notifikasi untuk melihat update data terbaru terkait gizi buruk tiap posyandu.
2. Klik pada tombol lihat data untuk melihat update data anak pada suatu posyandu
3. kecamatan atau posyandu tertentu untuk melihat detail data.
4. Analisis data untuk pengambilan keputusan berbasis wilayah.

### Melihat Data Anak
1. Klik pada tombol 'Data Anak' pada side bar untuk melihat data anak di satu kabupaten
2. Klik pada tombol 'Lihat Detail' untuk melihat data gizi pada seorang anak

### Melihat Data Kecamatan
1. Klik pada tombol 'Data Kecamatan' pada side bar untuk melihat data kecamatan di satu kabupaten

## Rencana Pengembangan Mendatang

- Integrasi dengan layanan notifikasi (email/SMS) untuk pengingat atau laporan berkala.
- Dashboard admin untuk analisis mendalam dan pengelolaan pengguna/data.
- Visualisasi tren data per tahun atau per bulan.
- Sistem pelacakan intervensi dan dampaknya terhadap gizi anak.
- Integrasi sistem pengambilan keputusan berbasis AI untuk rekomendasi tindakan.
- Fitur pemberian bantuan kepada suatu kecamatan dengan anak gizi buruk terbanyak

## Kontribusi

Untuk berkontribusi pada proyek ini dapat dilakukan langkah-langkah sebagai berikut:

1. Fork repositori ini
2. Buat branch baru untuk fitur/bug (`git checkout -b fitur-baru`)
3. Commit perubahan Anda (`git commit -m 'Menambahkan fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request ke branch `main`

