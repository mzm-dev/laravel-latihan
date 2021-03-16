![Laravel](https://laravel.com/img/logomark.min.svg) ![Laravel](https://laravel.com/img/logotype.min.svg)

![projek](https://i.postimg.cc/15gJMpYc/laravel8.png)

# KURSUS TRANSFER OF TECHNOLOGY (TOT) PEMBANGUNAN SISTEM MENGGUNAKAN FRAMEWORK
* TAJUK : LARAVEL FRAMEWORK (Versi 8.x)
* KATEGORI : ICT
* TARIKH : 15-17 MAC 2021
* LOKASI : BILIK MESYUARAT UPTM
* BAHASA BAHAN : DWIBAHASA

## Pra-syarat
* Untuk mempelajari Framework Laravel, anda mempunyai asas yang kukuh dalam **PHP & MYSQL** disamping pengetahuan lain seperti **HTML,CSS dan JavaScript.**
* Jika peserta berpengalaman dalam Framework CodeIgnator, dapat membantu dalam memahami Framework Laravel dengan lebih mudah.

## Keperluan Asan Latihan
* Apache, PHP 7.4 dan Mysql 5.7 (Laragon Server)
* Virtual Studio Editor sebagai tool untuk menulis pengaturcaraan

## Bahan-bahan latihan
* Muat Turun [Laragon](https://sourceforge.net/projects/laragon/files/releases/4.0/laragon-full.exe)
* Muat Turun [PHP 7.4](https://windows.php.net/downloads/releases/archives/php-7.4.11-Win32-vc15-x64.zip)
* Muat Turun [Virtual Studio Editor](https://code.visualstudio.com/download)
* Pemasangan [Extension Laravel Virtual Studio Editor](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel-extension-pack)
* Muat Turun [Bootstrap 4](https://github.com/twbs/bootstrap/archive/v4.0.0.zip)
* [Nota Latihan](https://github.com/mzm-dev/laravel-latihan/wiki)

## PHP ARTISAN

**Apabila file kandungan/setting dalam env berubah, perlu run**

```php artisan config:cache```

**Senarai Routes**

```php artisan route:list```

**Senarai Routes dengan carian NAME route**

```php artisan route:list --name="home"```

**Senarai Routes dengan carian URL route**

```php artisan route:list --path="api"```

**Senarai Routes dengan carian METHOD route**

```php artisan route:list --method="POST"```

**Generate Controller & Generate Model jika belum wujud**

```
php artisan make:controller JawatanController --resource --model=Jawatan

//app\Http\Controllers\JawatanController.php
//app\Models\Jawatan.php

php artisan make:controller JabatanController --resource --model=Jabatan

//app\Http\Controllers\JabatanController.php
//app\Models\Jabatan.php

//app\Http\Controllers\JawatanController.php
```
> --resource adalah untuk jana function untuk CRUD

**Duplicate (Copy & paste)**

```Shift + Alt + Arrow Down```


**Table Pegawai**
```mysql
-- Dumping structure for table db_direktori.pegawai
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `nokp` varchar(12) DEFAULT NULL,
  `emel` varchar(255) DEFAULT NULL,
  `no_telefon_pejabat` varchar(12) DEFAULT NULL,
  `no_telefon_bimbit` varchar(12) DEFAULT NULL,
  `imej` varchar(255) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `jawatan_id` int(11) DEFAULT NULL,
  `gred` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dumping structure for table db_direktori.jawatan
DROP TABLE IF EXISTS `jawatan`;
CREATE TABLE IF NOT EXISTS `jawatan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping structure for table db_direktori.jabatan
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```
