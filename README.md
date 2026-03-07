dd($info);

ào thư mục public xóa mục storage
php artisan storage:link

php artisan convert:webp

php artisan serve
php artisan schedule:work
php artisan route:clear
php artisan cache:clear
php artisan config:clear

# mysqldump -u root -p mydatabase > backup.sql

# {{ dd($currentMovie->toArray()) }}

5K8i8N1wwzf554X
1ATM8BUJuC021LqpxL
===============================================================
aaPanel Internet Address: https://62.171.140.37:24751/6877ed9e
aaPanel Internal Address: https://62.171.140.37:24751/6877ed9e
username: ehx0e7vj
password: d5e36a8a
=============================================================
Warning:

If you cannot access the panel,
release the following port (24751|888|80|443|20|21) in the security group
========================================================================
sql_phimcuon_xyz
5134e33c33f588
========================================================================
Cài đặt OPhimCMS trên AAPanel
Cài đặt môi trường (nếu chưa cài đặt)
Php 7.4
Nginx
Mysql 5.7
Redis (tùy chọn)
Phpmyadmin
Thêm website & tạo database
Cấu hình PHP
Install extensions: fileinfo, opcache (tùy chọn), redis (tùy chọn), exif, intl
Xóa disable functions: putenv, symlink, proc_open
Tiến hành cài đặt
Cài đặt Laravel qua terminal: composer create-project laravel/laravel cms
Cấu hình database, cache (redis - nếu cài redis) trong .env
Cài đặt OPhimcms. Xem docs trên git hoặc packagist
Phân quyền thư mục Project
Cài đặt crawler & giao diện (1 hoặc nhiều cái để thay đổi nếu muốn). Xem docs trên git hoặc packagist
Cấu hình nginx cho domain
Trỏ site directory
Url rewrite:
location / {
try_files $uri $uri/ /index.php?$query_string;
}
set ENV production
Trường hợp không load được giao diện hay những cái khác cần phải để ssl cloudflare Full & cấu hình cer
xác tực Origin Server trong cloudflare
Cấu hình ssl nginx
Đã xong! Test thử. Nhớ phải Active 1 giao diện trong admin.

=====================================================

Phim lẻ mới||type|single|updated_at|desc|15|/danh-sach/phim-le|section_thumb
Phim chiếu rạp||is_shown_in_theater|1|created_at|desc|16|/danh-sach/phim-chieu-rap|section_side
Phim bộ mới||type|series|updated_at|desc|15|/danh-sach/phim-bo|section_side
Hoạt hình|categories|slug|hoat-hinh|publish_year|desc|15|/the-loai/hoat-hinh|section_side
Phim sắp chiếu||status|trailer|publish_year|desc|16|/danh-sach/phim-sap-chieu|section_carousel

Ctrl + Shift + P
Format Document With...
Laravel Blade Formatter
Set as Default Formatter

<script disable-devtool-auto src="https://cdn.jsdelivr.net/npm/disable-devtool"></script>
<script async  disable-devtool-auto src="https://cdn.jsdelivr.net/npm/disable-devtool" ></script>

// Nếu file đã tồn tại
if (Storage::disk('public')->exists($path)) {

    // Không force update → giữ ảnh cũ
    if (!$this->forceUpdate) {
        return Storage::url($path);
    }

    // Force update → xóa ảnh cũ
    Storage::disk('public')->delete($path);

}

UPDATE movies
SET
poster_url = CONCAT('/storage/images/', slug, '/', slug, '-poster.webp'),
thumb_url = CONCAT('/storage/images/', slug, '/', slug, '-thumb.webp')
WHERE poster_url LIKE '%img.ophim.live%'
OR thumb_url LIKE '%img.ophim.live%';

php artisan route:clear
php artisan cache:clear
php artisan config:clear
php artisan optimize
Anime Vietsub|categories|slug|hoat-hinh|updated_at|desc|15|/the-loai/hoat-hinh|section_side
