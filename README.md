# 📘 RESTful API - Aplikasi Manajemen User

API ini dibangun menggunakan Laravel dan menyediakan fitur CRUD lengkap untuk manajemen pengguna dan departemen.

---

## 🚀 Fitur

- ✅ CRUD User
- ✅ CRUD Departemen
- 🔗 Relasi antar tabel (User ↔ Departement)
---

## 🚀 Endpoint REST API

Semua endpoint menggunakan prefix: `/api/v1/`

### 📁 Users

| Method | Endpoint           | Deskripsi                      |
|--------|--------------------|--------------------------------|
| GET    | /users             | Menampilkan semua user         |
| GET    | /users/{id}        | Menampilkan detail user        |
| POST   | /users             | Menambahkan user baru          |
| PUT    | /users/{id}        | Memperbarui data user          |
| DELETE | /users/{id}        | Menghapus user berdasarkan ID  |

### 📁 Departements

| Method | Endpoint              | Deskripsi                          |
|--------|-----------------------|------------------------------------|
| GET    | /departements         | Menampilkan semua departemen       |
| GET    | /departements/{id}    | Menampilkan detail departemen      |
| POST   | /departements         | Menambahkan departemen baru        |
| PUT    | /departements/{id}    | Memperbarui data departemen        |
| DELETE | /departements/{id}    | Menghapus departemen berdasarkan ID|


## ⚙️ Cara Menjalankan Aplikasi

### 1. Clone Repository
```bash
git clone https://github.com/wstarywbw12/api-laravel.git
cd api-laravel
```

### 2. Install Dependency
```bash
composer install
```

### 3. Copy dan Konfigurasi File .env
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Jalankan Migrasi dan Seeder
```bash
php artisan migrate --seed
```

### 5. Jalankan Server Laravel
```bash
php artisan serve
```