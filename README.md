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
* Muat Turun (JQuery)[https://code.jquery.com/jquery-3.6.0.min.js]
* [Nota Latihan](https://github.com/mzm-dev/laravel-latihan/wiki)

## Laravel Cheat Sheet
* https://simplecheatsheet.com/tag/laravel-cheat-sheet/
* https://learninglaravel.net/cheatsheet/
* https://morioh.com/p/80c76e45a5ad

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

**Ubah timezone di dalam config/app.php**

```php
    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'Asia/Kuala_Lumpur',
```


### Shortcut Key

**Duplicate (Copy & paste)**

```Shift + Alt + Arrow Down```

**Komen Code Line**

```Ctrl + /```

**Blade Code**

```b:``` 
follow by syntax

**Emmet Code**
(Emmet)[https://docs.emmet.io/cheat-sheet/]

Table HTML
```html
# jana 1 row 1 colm
table>thead>tr>th

# jana 1 row 2 colm
table>thead>tr>th*2
```


