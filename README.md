<p align="center">
  <img src="https://picsum.photos/600/200" alt="Banner Project" width="650">
</p>



<h1 align="center">📌 PHP Native MVC - Gabut Jadi Serius</h1>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.0-blue?logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-Database-orange?logo=mysql" alt="MySQL">
  <img src="https://img.shields.io/badge/AdminLTE-Template-success" alt="AdminLTE">
  <img src="https://img.shields.io/badge/Status-Experimental-yellow" alt="Status">
</p>

Projek ini dibuat dengan **PHP Native** sejak awal.  
Awalnya saya sedang mencoba membangun project sederhana, lalu berdiskusi dengan **AI** untuk membantu menyusun struktur yang lebih terorganisir.

Hasilnya, AI langsung menghasilkan kode-kode berdasarkan struktur tersebut, dan saya jalankan untuk melihat perbedaan, kelebihan, serta hal-hal baru dibandingkan dengan pola campur aduk yang biasanya dipakai pada PHP Native.

Struktur akhir dari project ini akhirnya menyerupai pola **MVC sederhana (Model - View - Controller)**, walaupun tetap berbasis PHP Native tanpa framework besar.

---

### 📂 Struktur Folder

```
php-mvc/
├── index.php                # Entry utama aplikasi
├── app/                     # Folder utama aplikasi
│   ├── config/              # Konfigurasi aplikasi
│   │   └── config.php
│   ├── controllers/         # Logika aplikasi (Controller)
│   │   ├── AuthController.php
│   │   └── EmployeeController.php
│   ├── models/              # Koneksi & query database (Model)
│   │   └── EmployeeModel.php
│   └── views/               # Tampilan (View)
│       ├── pages/
│       │   ├── dashboard.php
│       │   ├── employees.php
│       │   ├── login_form.php
│       │   └── profile.php
│       └── templates/
│           ├── header.php
│           ├── sidebar.php
│           └── footer.php
├── public/                  # Akses publik (Frontend & Assets)
│   ├── index.php
│   ├── login.php
│   ├── logout.php
│   └── assets/
│       ├── custom/          # Script atau style custom
│       └── dist/            # AdminLTE (CSS, JS, Images)
│           ├── css/
│           ├── img/
│           └── ...
```

---

### ⚙️ Teknologi yang Digunakan

- **PHP Native** (tanpa framework besar, manual route & logic).
- **MySQL** (database untuk autentikasi & manajemen data).
- **AdminLTE** (template UI berbasis Bootstrap, sudah include CSS & assets).
- **HTML, CSS, JS** bawaan + sedikit custom.

---

### 🚀 Fitur Utama

- Login & Logout sederhana.
- Manajemen data (contoh: Employee).
- Dashboard dengan template **AdminLTE**.
- Struktur semi-MVC (Controller, Model, View).
- Akses via `public/index.php`.

---

### 🔧 Cara Install & Menjalankan

1.  **Clone repository ini**

    ```bash
    git clone https://github.com/sarambadev/php-mvc.git
    cd php-mvc
    ```

2.  **Setup database**

    - Buat database baru di MySQL, contoh:

      ```sql
         CREATE DATABASE IF NOT EXISTS php_mvc;
         USE php_mvc;

         CREATE TABLE employees (
         id int(11) NOT NULL AUTO_INCREMENT,
         name varchar(100) DEFAULT NULL,
         position varchar(100) DEFAULT NULL,
         salary decimal(15,2) DEFAULT NULL,
         PRIMARY KEY (id)
         );

         CREATE TABLE users (
         id int(11) NOT NULL AUTO_INCREMENT,
         username varchar(50) DEFAULT NULL,
         password varchar(255) DEFAULT NULL,
         PRIMARY KEY (id)
         );

         INSERT INTO users (id, username, password) VALUES
         (1, 'admin', '$2a$12$JaoIswNNU4sv2bK2zs0YLelPwonvNAZ5e/UyDSoPELkz2jT0GqxFK');
         -- password = admin123 (bcrypt)


      ```

    - Atau import file SQL ([`php-mvc.sql`](./php-mvc.sql))

3.  **Sesuaikan konfigurasi database**  
    Edit file `app/config/config.php` dengan kredensial database lokal kamu:

    ```php
    <?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "php_mvc";
    ?>
    ```

4.  **Jalankan project**

    - Jika pakai **XAMPP** → letakkan folder `php-mvc` di dalam `htdocs/`  
      👉 [Download XAMPP](https://www.apachefriends.org/download.html)

    - Jika pakai **Laragon** → letakkan folder `php-mvc` di dalam `www/`  
      👉 [Download Laragon](https://laragon.org/download/)
    - Akses lewat browser:
      ```bash
      http://localhost/php-mvc/public/
      Atau
      http://localhost/php-mvc
      ```

5.  **Login awal**
    - Sudah tersedia akun default
    ```
    Username: admin
    Password: admin123
    ```
    - Password pada database sudah disimpan dalam bentuk hash (bcrypt) untuk keamanan; sangat disarankan menggunakan bcrypt atau algoritma hash yang kuat, dan jangan pernah menyimpan password dalam bentuk plain text.
    - Username & password default bisa kamu set langsung di tabel `users` pada database.

---

### ⚠️ Disclaimer

> Proyek ini ditulis berdasarkan ide random/angan-angan saya, kemudian dikembangkan lewat diskusi bersama **AI**.  
> Jadi, bisa dibilang ini adalah hasil gabut + eksperimen, **bukan aplikasi production-ready**.  
> Project ini **belum selesai** dan **tidak dalam tahap pengembangan lebih lanjut**.
> Jika ingin menggunakan atau meneruskan, silakan dikembangkan sesuai kebutuhan. ✨


---
## License

This project is licensed under the [MIT License](./LICENSE) © 2025 sarambaDev.
