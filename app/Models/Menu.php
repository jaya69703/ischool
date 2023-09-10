<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus'; // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
        'name',
        'code',
        'icon',
        'url',
        'type',
        'locate',
        'parent_id',
    ];

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }
}
