<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemList extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'detail_info',
        'deskripsi',
        'lokasi',
        'id_owner',
    ];
}
