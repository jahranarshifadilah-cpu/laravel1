<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    // secara otomatis model INI MENGGANGAP
    // table yang digunakan adalah table 'posts'

    // TABLE YANG DIGUNAKAN UNTUK MODEL INI ADALAH TABLE 'POST'
    protected $table = 'posts';

    // apa saja yang boleh di isi
    public $fillable = ['title', 'content'];

    // apa saja yaang boleh di perlihatkan 
    public $visible = ['id','title', 'content'];

    // mengisi tanggal kapan dibuat dan kapan di update secara otomatis
    public $timestamps = true;
}