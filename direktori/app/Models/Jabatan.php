<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jabatan extends Model
{
    use HasFactory, SoftDeletes;

     //Nama Table
     protected $table = 'jabatan';

     //Primary Key Table Jabatan
     protected $primaryKey = 'id';

     //Semua field yg berkaitan dengan table jabatan
     protected $fillable = ['nama'];
}
