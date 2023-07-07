## File Laravel API
File yang diperhatikan:
1. app/Http/Controllers/Api/AuthController (Untuk handle register, login, logout, dan refresh
2. app/Http/Controllers/EventController (Untuk handle CRUDS event, belum dipakai)
3. app/Http/Controllers/StudentController (Untuk handle CRUDS student)
4. app/Http/Controllers/TiketController (Untuk handle CRUDS Tiket, belum dipakai)
5. app/Http/Models (Visualisasi dan logic tabel)
6. Database/migrations (Untuk menjalankan migration dari tabel dan logic laravel)
7. Database/seeders/RoleSeeder (Mengisi data default di tabel Role)
8. storage/app/public/profiles (Menyimpan foto yang url lokasinya akan disimpan di dalam kolom profile_picture pada tabel student)
9. routes/api.php (Routing yang digunakan)
