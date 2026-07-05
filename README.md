# PentraAI — Agen Pengujian Penetrasi Otomatis Berbasis AI

## Gambaran Umum

PentraAI merupakan agen pengujian penetrasi (*penetration testing*) berbasis kecerdasan buatan yang dirancang untuk membantu pengembang, startup, dan tim keamanan dalam mengidentifikasi serta memvalidasi kerentanan keamanan pada aplikasi web dan API secara otomatis.

Berbeda dengan alat pemindai kerentanan konvensional yang hanya menampilkan daftar potensi masalah, PentraAI menerapkan siklus keamanan yang lebih komprehensif:

**Temukan → Uji → Validasi → Laporkan → Rekomendasikan → Verifikasi**

Melalui pendekatan ini, pengguna tidak hanya memperoleh informasi mengenai kerentanan yang ditemukan, tetapi juga rekomendasi perbaikan serta verifikasi ulang setelah perbaikan diterapkan.

PentraAI ditujukan secara khusus untuk pengujian keamanan pada sistem yang dimiliki pengguna atau telah memperoleh izin resmi untuk diuji.

## Latar Belakang Masalah

Keamanan aplikasi menjadi salah satu tantangan utama dalam pengembangan perangkat lunak modern. Namun, tidak semua organisasi memiliki sumber daya atau tenaga ahli keamanan yang memadai untuk melakukan pengujian penetrasi secara berkala.

Di sisi lain, banyak alat pemindai keamanan menghasilkan *false positive* yang tinggi dan tidak memberikan panduan yang jelas mengenai langkah perbaikan yang harus dilakukan.

Akibatnya, proses identifikasi dan penanganan kerentanan sering kali memakan waktu, biaya, dan tenaga yang tidak sedikit.

## Solusi yang Ditawarkan

PentraAI menggabungkan kemampuan AI Agent dengan proses pengujian keamanan otomatis untuk membantu pengguna melakukan asesmen keamanan secara lebih cepat dan efisien.

Sistem mampu:

* Menganalisis aplikasi web dan API secara otomatis.
* Mengidentifikasi permukaan serangan (*attack surface*).
* Membuat skenario pengujian penetrasi secara dinamis.
* Menjalankan pengujian keamanan berdasarkan skenario yang dihasilkan.
* Memvalidasi temuan untuk mengurangi *false positive*.
* Menghasilkan laporan keamanan yang mudah dipahami.
* Memberikan rekomendasi perbaikan yang dapat ditindaklanjuti.
* Melakukan pengujian ulang setelah perbaikan diterapkan.

## Fitur Utama

### 1. Pemetaan Permukaan Serangan Otomatis

Sistem secara otomatis mengidentifikasi halaman, endpoint API, teknologi yang digunakan, serta potensi titik masuk serangan.

### 2. Generasi Skenario Pengujian Berbasis AI

AI akan menyusun skenario pengujian yang relevan berdasarkan hasil analisis target.

### 3. Validasi Kerentanan

Setiap temuan akan divalidasi kembali untuk meningkatkan akurasi hasil dan meminimalkan laporan yang tidak relevan.

### 4. Laporan Keamanan Otomatis

Pengguna memperoleh laporan yang mencakup:

* Tingkat risiko
* Dampak kerentanan
* Bukti temuan
* Langkah mitigasi dan perbaikan

### 5. Verifikasi Pasca Perbaikan

Setelah pengguna menerapkan perbaikan, sistem dapat melakukan pengujian ulang untuk memastikan kerentanan telah berhasil ditangani.

## Target Pengguna

* Pengembang perangkat lunak
* Startup teknologi
* Tim Quality Assurance (QA)
* Tim DevSecOps
* Konsultan keamanan siber
* Organisasi yang membutuhkan asesmen keamanan berkala

## Teknologi yang Digunakan

* Next.js
* TypeScript
* Node.js
* TestSprite CLI
* OpenAI API
* PostgreSQL
* Docker

## Alur Kerja AI Agent

1. Menganalisis target aplikasi.
2. Mengidentifikasi permukaan serangan.
3. Membuat skenario pengujian keamanan.
4. Menjalankan pengujian penetrasi.
5. Memvalidasi hasil temuan.
6. Menghasilkan laporan keamanan.
7. Memberikan rekomendasi perbaikan.
8. Melakukan pengujian ulang untuk verifikasi.

## Kesesuaian dengan Tema Hackathon

PentraAI menerapkan konsep *Loop Engineering* melalui siklus berkelanjutan:

**Temukan → Uji → Analisis → Perbaiki → Verifikasi**

Pendekatan ini menunjukkan bagaimana AI Agent dapat membantu mengotomatisasi proses keamanan aplikasi secara berulang dan terukur, sehingga meningkatkan kualitas dan keamanan perangkat lunak secara berkelanjutan.

## Disclaimer

PentraAI hanya boleh digunakan untuk melakukan pengujian keamanan pada sistem yang dimiliki sendiri atau telah memperoleh izin resmi dari pemilik sistem. Penggunaan terhadap target tanpa izin merupakan tanggung jawab pengguna dan tidak didukung oleh aplikasi ini.

## UI/UX Flow (Draft)

**Login/Register**

**Prompt page**
* Header
  * User
  * Menu
  * Navbar
    * Overview
    * User
    * Profile
* Sidebar / History
  * history prompt
* Center
  * input url atau tulisan

**Report**
* Header
  * User
  * Menu
  * Navbar
    * Overview
    * User
    * Profile
* Center
  * Output 
    * deskripsi vulnerability 
    * pie chart
  * Export PDF
