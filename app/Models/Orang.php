<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orang extends Model
{
    use HasFactory;

    protected $table = 'orang';
    protected $guarded = [];

    public function Peran_orang()
    {
        return $this->hasOne(Peran_orang::class, 'orang_id', 'id');
    }
}
