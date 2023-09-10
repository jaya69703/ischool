<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = 'positions'; // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
        'divisi_id',
        'name',
        'code',
        'sallary',
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
