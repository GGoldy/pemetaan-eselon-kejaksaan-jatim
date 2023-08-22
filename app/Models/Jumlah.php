<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jumlah extends Model
{
    use HasFactory;
    public function satker()
    {
        return $this->belongsTo(Satker::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
