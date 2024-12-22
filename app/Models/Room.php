<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relasi dengan riwayat (seandainya kamu punya relasi)
    public function history()
    {
        return $this->hasMany(History::class);
    }
}
