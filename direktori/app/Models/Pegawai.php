<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;

     //Nama Table
     protected $table = 'pegawai';

     //Primary Key Table Jawatan
     protected $primaryKey = 'id';

     //Semua field yg berkaitan dengan table pegawai
     protected $fillable = ['nama', 'nokp', 'no_telefon_pejabat', 'no_telefon_bimbit', 'emel', 'jabatan_id', 'jawatan_id', 'daerah_id', 'negeri_id','gred', 'imej'];


     /**
      * Get the user that owns the Pegawai
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function negeri()
     {
         return $this->belongsTo(Negeri::class, 'negeri_id');
     }
     /**
      * Get the user that owns the Pegawai
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function rujukDaerah()
     {
         return $this->belongsTo(Daerah::class, 'daerah_id');
     }

      /**
      * Get the user that owns the Pegawai
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
      public function jawatan()
      {
          return $this->belongsTo(Jawatan::class, 'jawatan_id');
      }
      /**
      * Get the user that owns the Pegawai
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
      public function jabatan()
      {
          return $this->belongsTo(Jabatan::class, 'jabatan_id');
      }
}
