# 📚 Authbook — Pengembangan Sistem Pengelolaan Data Buku

<p align="center">
  <strong>Aplikasi Pengelolaan Buku Berbasis Laravel dan Filament</strong><br>
  Praktikum Pemrograman Berbasis Web — Pertemuan 7
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?logo=php&logoColor=white" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/Filament-3-FDAE4B?logo=filament" alt="Filament">
  <img src="https://img.shields.io/badge/Database-SQLite-003B57?logo=sqlite" alt="SQLite">
  <img src="https://img.shields.io/badge/Project-Praktikum%207-blue" alt="Praktikum 7">
</p>

---

## 📋 Identitas Mahasiswa

| Keterangan | Informasi |
|---|---|
| Nama | Ridwan Odi Nugroho |
| NPM | 4524210089 |
| Program Studi | Teknik Informatika |
| Universitas | Universitas Pancasila |
| Mata Kuliah | Pemrograman Berbasis Web |
| Praktikum | Pertemuan 7 |
| Tugas | Tugas 2 |

## 📖 Deskripsi Proyek

**Authbook** merupakan aplikasi pengelolaan data buku yang dikembangkan menggunakan framework Laravel dan Filament. Proyek ini merupakan pengembangan dari aplikasi Authbook pada Praktikum 6 dengan penambahan fitur dan pengelolaan sistem yang lebih lanjut.

Pada Praktikum 7 Tugas 2, pengembangan aplikasi difokuskan pada empat bagian utama, yaitu:

1. Penambahan deskripsi pada data buku.
2. Penerapan Role-Based Access Control (RBAC) untuk membatasi hak akses pengguna.
3. Pembuatan dashboard statistik dan visualisasi data buku.
4. Penambahan kategori buku dengan relasi many-to-many.

Aplikasi menggunakan database SQLite untuk menyimpan data. Laravel Eloquent digunakan untuk mengelola model dan relasi antartabel, sedangkan Filament digunakan untuk membangun panel administrasi.

Dengan pengembangan ini, aplikasi Authbook tidak hanya berfungsi untuk mengelola data penulis dan buku, tetapi juga menyediakan pengaturan hak akses, informasi statistik, serta pengelompokan buku berdasarkan kategori.

## 🎯 Tujuan Praktikum

Tujuan pelaksanaan Praktikum Pertemuan 7 adalah:

1. Memahami pengembangan fitur pada aplikasi Laravel yang sudah dibuat sebelumnya.
2. Menambahkan atribut deskripsi pada tabel dan model Book.
3. Memahami penggunaan Textarea pada form Filament.
4. Memahami konsep Role-Based Access Control (RBAC).
5. Mengatur hak akses pengguna berdasarkan peran Admin, Staff, dan Viewer.
6. Memahami penggunaan Laravel Policy untuk mengatur otorisasi.
7. Membuat widget statistik pada dashboard Filament.
8. Menampilkan visualisasi data menggunakan ChartWidget.
9. Memahami relasi many-to-many antara Book dan Category.
10. Mengelola kategori buku melalui Filament Resource dan form.
11. Menguji fitur dan hak akses pengguna pada aplikasi.

## ✨ Fitur dan Komponen Utama

### 1. 📝 Penambahan Deskripsi Buku

Fitur deskripsi digunakan untuk menyimpan informasi tambahan mengenai buku.

Penambahan dilakukan dengan membuat migration baru pada tabel `books`.

Atribut yang ditambahkan:

| Atribut | Tipe Data | Keterangan |
|---|---|---|
| `description` | TEXT | Menyimpan deskripsi buku |

Kolom `description` dibuat nullable agar buku tetap dapat disimpan meskipun deskripsinya belum diisi.

Pada model `Book`, atribut `description` juga perlu dimasukkan ke dalam `$fillable`.

Form pengisian deskripsi menggunakan komponen Textarea dari Filament agar pengguna dapat memasukkan teks yang lebih panjang.

### 2. 🔐 Role-Based Access Control (RBAC)

RBAC merupakan mekanisme pengaturan hak akses berdasarkan peran pengguna.

Pada aplikasi Authbook, terdapat tiga peran pengguna:

| Role | Hak Akses |
|---|---|
| Admin | Melihat, menambahkan, mengubah, dan menghapus buku |
| Staff | Melihat, menambahkan, dan mengubah buku |
| Viewer | Hanya melihat data buku |

Pengaturan role disimpan pada kolom `role` di tabel `users`.

Laravel Policy digunakan untuk menentukan apakah pengguna diperbolehkan melakukan tindakan tertentu.

Policy utama yang digunakan adalah `BookPolicy`.

### 3. 📊 Dashboard Statistik

Dashboard statistik digunakan untuk menampilkan ringkasan informasi data buku dan penulis.

Widget statistik yang direncanakan meliputi:

| Statistik | Keterangan |
|---|---|
| Total Books | Jumlah seluruh buku |
| Total Authors | Jumlah seluruh penulis |
| Books Available | Jumlah buku yang tersedia |
| Books Borrowed | Jumlah buku yang sedang dipinjam |

Widget statistik dibuat menggunakan Filament StatsOverviewWidget.

### 4. 📈 Visualisasi Status Buku

Aplikasi menyediakan visualisasi data menggunakan Filament ChartWidget.

Grafik yang digunakan adalah Doughnut Chart untuk menampilkan perbandingan jumlah buku berdasarkan status.

Kategori data yang ditampilkan:

- Available: Buku yang tersedia.
- Borrowed: Buku yang sedang dipinjam.

Visualisasi ini membantu pengguna melihat distribusi status buku secara lebih mudah.

### 5. 🏷️ Pengelolaan Kategori Buku

Fitur kategori digunakan untuk mengelompokkan buku berdasarkan jenis atau topik tertentu.

Aplikasi menggunakan model `Category` dan tabel `categories`.

Atribut utama tabel kategori:

| Atribut | Keterangan |
|---|---|
| `id` | Identitas unik kategori |
| `name` | Nama kategori |
| `created_at` | Waktu data dibuat |
| `updated_at` | Waktu data diperbarui |

Hubungan antara buku dan kategori menggunakan relasi many-to-many karena satu buku dapat memiliki beberapa kategori dan satu kategori dapat digunakan oleh banyak buku.

Tabel pivot yang digunakan adalah `book_category`, yang menghubungkan `book_id` dan `category_id`.

### 6. 🔗 Relasi Database

Aplikasi menggunakan beberapa relasi antarmodel Laravel Eloquent.

**Relasi Author ke Book**

Satu penulis dapat memiliki banyak buku menggunakan `hasMany()`.

**Relasi Book ke Author**

Satu buku berhubungan dengan satu penulis menggunakan `belongsTo()`.

**Relasi Book ke Category**

Satu buku dapat memiliki beberapa kategori menggunakan `belongsToMany()`.

**Relasi Category ke Book**

Satu kategori dapat digunakan oleh beberapa buku menggunakan `belongsToMany()`.

## 🛠️ Teknologi yang Digunakan

| Teknologi | Fungsi |
|---|---|
| PHP | Bahasa pemrograman backend |
| Laravel 12 | Framework pengembangan aplikasi web |
| Composer | Mengelola dependensi PHP |
| Filament 3 | Membangun panel administrasi |
| SQLite | Basis data aplikasi |
| Laravel Eloquent ORM | Mengelola model dan relasi database |
| Laravel Policy | Mengatur otorisasi pengguna |
| Filament Widgets | Menampilkan statistik dan grafik |
| Git dan GitHub | Mengelola versi dan menyimpan kode proyek |

## 🧠 Konsep Pemrograman yang Diterapkan

### 1. Migration

Migration digunakan untuk mengatur perubahan struktur database melalui kode PHP.

Pada Tugas 2, migration digunakan untuk:

- Menambahkan kolom `description` pada tabel `books`.
- Menambahkan kolom `role` pada tabel `users`.
- Membuat tabel `categories`.
- Membuat tabel pivot `book_category`.

### 2. Mass Assignment

Properti `$fillable` digunakan untuk menentukan atribut model yang dapat diisi melalui mass assignment.

Pada model Book, atribut yang digunakan mencakup data buku dan deskripsinya.

Contoh:

```php
protected $fillable = [
    'isbn',
    'title',
    'description',
    'author_id',
    'publisher',
    'year',
    'cover',
    'status',
];
```

### 3. Role-Based Access Control

RBAC merupakan konsep pengaturan izin berdasarkan peran pengguna.

Dalam aplikasi ini, pengguna memiliki role Admin, Staff, atau Viewer. Setiap role memiliki hak akses yang berbeda.

### 4. Laravel Policy

Policy digunakan untuk mengatur otorisasi terhadap model tertentu.

Pada aplikasi Authbook, `BookPolicy` digunakan untuk mengatur izin melihat, membuat, mengubah, dan menghapus data buku berdasarkan role pengguna.

### 5. Dashboard Widget

Widget merupakan komponen yang digunakan untuk menampilkan informasi pada dashboard Filament.

Pada aplikasi ini, widget statistik digunakan untuk menampilkan jumlah buku, penulis, buku tersedia, dan buku dipinjam.

### 6. Chart Widget

ChartWidget digunakan untuk menampilkan data dalam bentuk grafik.

Pada proyek ini, Doughnut Chart digunakan untuk memperlihatkan perbandingan status buku Available dan Borrowed.

### 7. Relasi Many-to-Many

Relasi many-to-many merupakan hubungan antara dua tabel yang memungkinkan banyak data saling berhubungan.

Pada aplikasi Authbook:

- Satu buku dapat memiliki banyak kategori.
- Satu kategori dapat dimiliki oleh banyak buku.

Relasi tersebut menggunakan tabel pivot `book_category`.

## 🔄 Alur Kerja Pengembangan

Alur pengerjaan Praktikum 7 Tugas 2 adalah sebagai berikut:

```text
Mulai
  |
  v
Menyiapkan Project Authbook
  |
  v
Penambahan Deskripsi Buku
  |
  v
Mengatur Role Pengguna
  |
  v
Membuat Role-Based Access Control
  |
  v
Membuat BookPolicy
  |
  v
Membuat Dashboard Statistik
  |
  v
Membuat Grafik Status Buku
  |
  v
Membuat Model Category
  |
  v
Membuat Tabel Categories
  |
  v
Membuat Tabel Pivot Book Category
  |
  v
Mengatur Relasi Many-to-Many
  |
  v
Mengintegrasikan Form Kategori
  |
  v
Menjalankan Migration dan Seeder
  |
  v
Menguji Fitur dan Hak Akses
  |
  v
Selesai
```

## 📂 Struktur Proyek

Berikut gambaran struktur direktori proyek Authbook setelah pengembangan Tugas 2:

```text
Praktikum 7/
└── authbook/
    ├── app/
    │   ├── Filament/
    │   │   ├── Resources/
    │   │   │   ├── AuthorResource.php
    │   │   │   ├── BookResource.php
    │   │   │   └── CategoryResource.php
    │   │   └── Widgets/
    │   │       ├── LibraryStats.php
    │   │       └── BookStatusChart.php
    │   ├── Models/
    │   │   ├── Author.php
    │   │   ├── Book.php
    │   │   └── Category.php
    │   ├── Policies/
    │   │   ├── AuthorPolicy.php
    │   │   └── BookPolicy.php
    │   └── Providers/
    │       └── Filament/
    │           └── AdminPanelProvider.php
    ├── database/
    │   ├── factories/
    │   ├── migrations/
    │   │   ├── xxxx_add_description_to_books_table.php
    │   │   ├── xxxx_add_role_to_users_table.php
    │   │   ├── xxxx_create_categories_table.php
    │   │   └── xxxx_create_book_category_table.php
    │   ├── seeders/
    │   │   ├── DatabaseSeeder.php
    │   │   └── RoleUserSeeder.php
    │   └── database.sqlite
    ├── resources/
    ├── routes/
    ├── storage/
    ├── screenshots/
    ├── .env.example
    ├── artisan
    ├── composer.json
    └── package.json
```

**Catatan:** Struktur di atas merupakan gambaran direktori yang diharapkan. Nama file migration mengikuti timestamp yang dibuat Laravel. Struktur sebenarnya dapat berbeda sesuai implementasi proyek.

### Penjelasan Direktori Penting

| Direktori atau Berkas | Fungsi |
|---|---|
| `app/Models/` | Menyimpan model Author, Book, dan Category |
| `app/Policies/` | Menyimpan aturan otorisasi |
| `app/Filament/Resources/` | Menyimpan resource pengelolaan data |
| `app/Filament/Widgets/` | Menyimpan widget statistik dan grafik |
| `app/Providers/Filament/` | Menyimpan konfigurasi panel Filament |
| `database/migrations/` | Menyimpan perubahan struktur database |
| `database/seeders/` | Menyimpan data awal aplikasi |
| `database/factories/` | Membuat data contoh |
| `screenshots/` | Menyimpan dokumentasi hasil praktikum |
| `.env.example` | Menyediakan contoh konfigurasi lingkungan |

## 💻 Persyaratan Sistem

Sebelum menjalankan proyek, siapkan:

- PHP 8.2 atau versi yang sesuai dengan Laravel.
- Composer.
- Node.js dan npm jika diperlukan.
- SQLite.
- Browser modern.
- Git untuk pengelolaan repository.

## 🚀 Instalasi dan Konfigurasi

### 1. Menyiapkan Project

Masuk ke direktori repository Praktikum 7 yang berisi project Authbook.

Jika project berada dalam folder `authbook`, masuk ke folder tersebut:

```bash
cd authbook
```

### 2. Menginstal Dependensi

Jalankan perintah:

```bash
composer install
```

Perintah tersebut digunakan untuk memasang dependensi PHP berdasarkan `composer.lock`.

### 3. Menyiapkan File Environment

Salin file konfigurasi:

```powershell
Copy-Item .env.example .env
```

Kemudian buat application key:

```bash
php artisan key:generate
```

Jika file `.env` sudah tersedia, tidak perlu menyalinnya kembali.

### 4. Menyiapkan Database SQLite

Pastikan file berikut tersedia:

```text
database/database.sqlite
```

Atur konfigurasi pada `.env`:

```env
DB_CONNECTION=sqlite
```

### 5. Menjalankan Migration dan Seeder

Jalankan:

```bash
php artisan migrate --seed
```

Perintah tersebut digunakan untuk menjalankan migration dan mengisi data awal sesuai konfigurasi seeder.

**Perhatian:** Jangan menggunakan `migrate:fresh` apabila database berisi data yang masih diperlukan karena perintah tersebut akan menghapus seluruh tabel sebelum membuatnya kembali.

### 6. Menyiapkan Storage

Jalankan:

```bash
php artisan storage:link
```

Perintah tersebut membuat symbolic link untuk mengakses file yang disimpan melalui Laravel Storage.

### 7. Menjalankan Development Server

Jalankan:

```bash
php artisan serve
```

Buka browser:

```text
http://127.0.0.1:8000
```

Panel administrasi Filament dapat diakses melalui:

```text
http://127.0.0.1:8000/admin
```

Alamat panel mengikuti konfigurasi pada `AdminPanelProvider`.

## 🧪 Pemeriksaan Hasil Praktikum

Berikut daftar pemeriksaan fitur yang menjadi bagian dari Tugas 2.

| No. | Pemeriksaan | Hasil yang Diharapkan |
|---|---|---|
| 1 | Kolom description | Deskripsi buku dapat disimpan |
| 2 | Form deskripsi buku | Textarea tampil pada form |
| 3 | Role pengguna | Admin, Staff, dan Viewer tersedia |
| 4 | Hak akses Admin | Dapat melihat, membuat, mengubah, dan menghapus buku |
| 5 | Hak akses Staff | Dapat melihat, membuat, dan mengubah buku |
| 6 | Hak akses Viewer | Hanya dapat melihat buku |
| 7 | Dashboard statistik | Menampilkan jumlah buku dan penulis |
| 8 | Statistik status buku | Menampilkan jumlah Available dan Borrowed |
| 9 | Grafik status buku | Doughnut Chart tampil |
| 10 | Model Category | Model Category tersedia |
| 11 | Relasi kategori | Relasi Book dan Category berjalan |
| 12 | Form kategori buku | Pengguna dapat memilih beberapa kategori |
| 13 | Database | Migration berhasil dijalankan |

Hasil akhir setiap pemeriksaan perlu disesuaikan dengan pengujian langsung pada aplikasi.

## 🛡️ Keamanan dan Pengelolaan Proyek

Beberapa hal yang perlu diperhatikan:

- Jangan mengunggah file `.env` yang berisi konfigurasi rahasia.
- Pastikan `.env.example` tersedia sebagai referensi konfigurasi.
- Jangan mengunggah folder `vendor/` dan `node_modules/`.
- Pastikan setiap pengguna memiliki role yang sesuai.
- Jangan hanya menyembunyikan tombol pada tampilan; hak akses juga harus diperiksa melalui Policy.
- Pastikan Viewer tidak dapat melakukan perubahan data buku.
- Gunakan foreign key pada tabel relasi.
- Pastikan tabel pivot tidak menyimpan pasangan buku dan kategori yang sama secara berulang.
- Periksa konfigurasi database sebelum menjalankan migration.

## 🔧 Penanganan Masalah

### Composer tidak dikenali

Periksa instalasi Composer:

```bash
composer --version
```

### PHP tidak dikenali

Periksa instalasi PHP:

```bash
php --version
```

### Database SQLite tidak ditemukan

Pastikan file `database/database.sqlite` tersedia dan `.env` menggunakan:

```env
DB_CONNECTION=sqlite
```

### Migration gagal

Periksa pesan error, urutan migration, konfigurasi database, dan foreign key. Pastikan tabel yang menjadi referensi telah dibuat sebelum tabel yang menggunakan foreign key.

### Role pengguna tidak berjalan

Periksa kolom `role` pada tabel `users`, data pengguna, dan implementasi `BookPolicy`. Pastikan setiap role memiliki aturan akses yang sesuai.

### Dashboard tidak menampilkan widget

Periksa file widget dan registrasinya pada `AdminPanelProvider.php`. Pastikan widget telah dibuat pada lokasi yang sesuai.

### Grafik tidak tampil

Periksa query jumlah buku berdasarkan status. Pastikan data menggunakan nilai status yang sesuai, misalnya `available` dan `borrowed`.

### Kategori tidak tersimpan

Periksa model Book dan Category, relasi `belongsToMany()`, serta keberadaan tabel pivot `book_category`.

### Git tidak mengunggah perubahan

Dari direktori repository Praktikum 7, jalankan:

```bash
git status
git add .
git commit -m "Praktikum 7 - Tugas 2"
git push origin main
```

Pastikan repository yang digunakan adalah repository Praktikum 7, bukan repository Praktikum 6.

## 🚀 Pengembangan Selanjutnya

Setelah seluruh fitur Tugas 2 selesai, aplikasi Authbook dapat dikembangkan lebih lanjut melalui:

1. Menambahkan validasi deskripsi buku.
2. Menambahkan pengelolaan role pengguna melalui panel admin.
3. Menambahkan pengaturan hak akses yang lebih terperinci.
4. Mengembangkan dashboard dengan informasi tambahan.
5. Menambahkan filter buku berdasarkan kategori.
6. Menambahkan pengelolaan kategori melalui halaman tersendiri.
7. Menambahkan pengujian otomatis untuk Policy dan relasi database.

Daftar tersebut merupakan kemungkinan pengembangan berikutnya, bukan pernyataan bahwa seluruh fitur telah diterapkan.

## 📌 Kesimpulan

Praktikum Pemrograman Berbasis Web Pertemuan 7 Tugas 2 merupakan tahap pengembangan aplikasi Authbook yang sebelumnya telah dibuat pada Praktikum 6.

Pengembangan berfokus pada penambahan deskripsi buku, penerapan Role-Based Access Control, pembuatan dashboard statistik dan grafik, serta pengelolaan kategori buku menggunakan relasi many-to-many.

Melalui praktikum ini, mahasiswa mempelajari pengembangan fitur Laravel, penggunaan Policy untuk mengatur hak akses, pembuatan widget Filament, visualisasi data, dan pengelolaan relasi database.

Dengan penambahan fitur tersebut, aplikasi Authbook memiliki kemampuan pengelolaan data yang lebih lengkap dibandingkan tahap sebelumnya.

---

<p align="center">
  <strong>Ridwan Odi Nugroho</strong><br>
  4524210089<br>
  Teknik Informatika — Universitas Pancasila<br><br>
  <em>Praktikum Pemrograman Berbasis Web — Pertemuan 7</em>
</p>

---

## 🧪 Dokumentasi Langkah Praktikum — Tugas 2

Bagian ini merangkum empat bagian utama pengembangan aplikasi Authbook pada Praktikum 7.

### BAGIAN A — Penambahan Deskripsi Buku

- Membuat migration untuk menambahkan kolom `description` pada tabel `books`.
- Mengatur kolom description agar dapat menyimpan teks panjang.
- Menambahkan `description` pada `$fillable` model Book.
- Menambahkan komponen Textarea pada form BookResource.
- Menguji penyimpanan dan tampilan deskripsi buku.

Perintah utama:

```bash
php artisan make:migration add_description_to_books_table --table=books
php artisan migrate
```

### BAGIAN B — Role-Based Access Control

- Membuat migration untuk menambahkan kolom `role` pada tabel `users`.
- Menambahkan role Admin, Staff, dan Viewer.
- Membuat seeder untuk data pengguna berdasarkan role.
- Membuat atau menyesuaikan `BookPolicy`.
- Mengatur hak akses berdasarkan peran pengguna.
- Menguji izin melihat, membuat, mengubah, dan menghapus buku.

Perintah utama:

```bash
php artisan make:migration add_role_to_users_table --table=users
php artisan make:seeder RoleUserSeeder
php artisan make:policy BookPolicy --model=Book
php artisan migrate --seed
```

### BAGIAN C — Dashboard Statistik dan Grafik

- Membuat widget statistik menggunakan Filament.
- Menampilkan Total Books dan Total Authors.
- Menampilkan Books Available dan Books Borrowed.
- Membuat grafik Doughnut Chart untuk status buku.
- Mendaftarkan widget pada AdminPanelProvider.
- Memeriksa tampilan dashboard.

Perintah utama:

```bash
php artisan make:filament-widget LibraryStats --stats-overview
php artisan make:filament-widget BookStatusChart --chart
```

### BAGIAN D — Pengelolaan Kategori Buku

- Membuat model Category.
- Membuat migration tabel `categories`.
- Membuat migration tabel pivot `book_category`.
- Menambahkan relasi many-to-many pada model Book dan Category.
- Menambahkan pilihan kategori pada form BookResource.
- Menguji penyimpanan buku dengan beberapa kategori.

Perintah utama:

```bash
php artisan make:model Category -m
php artisan make:migration create_book_category_table
php artisan migrate
```

---

## 📝 Tugas dan Evaluasi

### Tugas 2: Pengembangan Fitur Authbook

Implementasikan seluruh bagian A sampai D dan lampirkan screenshot sebagai bukti pengerjaan.

> **Catatan:** Bagian gambar di bawah merupakan placeholder. Screenshot perlu ditambahkan setelah pengujian fitur selesai.

### 1. Screenshot Form Book dengan Deskripsi

Bukti: form penambahan atau pengeditan buku yang menampilkan kolom Description.

<img width="1433" height="859" alt="image" src="https://github.com/user-attachments/assets/abfeb3f7-6ced-4c27-9335-2463e74afc20" />

`Tempat gambar: screenshots/tugas-2-book-description.png`

### 2. Screenshot Role-Based Access Control

Bukti: pengujian hak akses pengguna Admin, Staff, dan Viewer.

Hak Akses Admin : 
<img width="1919" height="1030" alt="image" src="https://github.com/user-attachments/assets/5f10c7e1-ada5-41c3-bc27-841f185d1c1b" />


Hak Akses Staff : 
<img width="1919" height="1024" alt="image" src="https://github.com/user-attachments/assets/6477569e-a2c3-4d5d-831e-1d4d65e697c7" />


Hak Akses Viewer :
<img width="1918" height="1026" alt="image" src="https://github.com/user-attachments/assets/e1cfae21-ec1b-4ba5-9908-47268c48428d" />


`Tempat gambar: screenshots/tugas-2-role-access.png`

### 3. Screenshot Dashboard Statistik

Bukti: dashboard yang menampilkan Total Books, Total Authors, Books Available, dan Books Borrowed.
<img width="1919" height="1023" alt="image" src="https://github.com/user-attachments/assets/3b3f96d5-49c3-4f67-8701-4726bac3c3ec" />

`Tempat gambar: screenshots/tugas-2-dashboard-stats.png`

### 4. Screenshot Grafik Status Buku

Bukti: Doughnut Chart yang menampilkan perbandingan buku Available dan Borrowed.

<img width="498" height="544" alt="image" src="https://github.com/user-attachments/assets/af397557-258b-4626-8f2a-9a712f6d24d3" />


`Tempat gambar: screenshots/tugas-2-book-status-chart.png`

### 5. Screenshot Form Kategori Buku

Bukti: form Book yang menampilkan pilihan beberapa kategori.

<img width="1919" height="1021" alt="image" src="https://github.com/user-attachments/assets/539432b0-171a-4b3a-830a-36c78ee74bbb" />

`Tempat gambar: screenshots/tugas-2-book-categories.png`

### 6. Screenshot Hasil Relasi Kategori

Bukti: data buku yang berhasil tersimpan dengan kategori yang dipilih.

<img width="1348" height="425" alt="image" src="https://github.com/user-attachments/assets/c7801191-76ec-40ba-b4d1-8dbea65ec7ff" />

`Tempat gambar: screenshots/tugas-2-category-relationship.png`

### 7. Screenshot Daftar Kategori

Bukti: halaman daftar kategori yang telah dibuat dan tersimpan.

<img width="1600" height="848" alt="image" src="https://github.com/user-attachments/assets/5e935aea-3aaf-45f7-9609-99e2b69e4d8a" />

`Tempat gambar: screenshots/tugas-2-category-list.png`


