<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodata';

    protected $fillable = [
        'nama',
        'tgl_lahir',
        'jk',
        'agama',
        'alamat',
        'foto',
        'tinggi_badan',
        'berat_badan',
    ];
}
?>
