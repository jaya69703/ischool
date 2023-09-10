<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staff'; // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
        'staff_name',
        'staff_email',
        'staff_phone',
        'position_id',
        'divisi_id',
        // SPECIAL IDENTITAS STAFF
        'code',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
