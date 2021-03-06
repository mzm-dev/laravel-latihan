<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jawatan extends Model
{
    use HasFactory, SoftDeletes;

    //Nama Table
    protected $table = 'jawatan';

    //Primary Key Table Jawatan
    protected $primaryKey = 'id';

    //Semua field yg berkaitan dengan table jawatan
    protected $fillable = ['nama'];
}
