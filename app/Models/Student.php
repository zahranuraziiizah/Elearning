<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    //mendefinisikan kolom yang boleh diisi
    protected $fillable = ['name', 'nim', 'major', 'class', 'courses_id'];


/**
 * ================================================
 * Laravel relationship method:
 * ================================================
 * 
 * 1. One to one
 *      -hasOne()       = tabel saat ini meminjamkan id tabel lain
 *      -belongsTo()    = tabel saat MEMINJAM id dari tabel lain
 * 
 * 2. One to Many / Many to One
 *      -hasMany()      = tabel saat ini meminjamkan id
 *      -belongsTo()    = tabel saat ini MEMINJAM id dari tabel lain
 */


    //mendefinisikan relasi ke model course
    public function course(){
        return $this->belongsTo(Courses::class, 'courses_id');
    }
}
