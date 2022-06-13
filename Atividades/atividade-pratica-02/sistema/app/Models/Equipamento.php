<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nome'];

    public function registro()
    {
        return $this->hasMany(Registro::class);
    }
}
