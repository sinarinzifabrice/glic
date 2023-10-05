<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDeBien extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function typede_bien()
    {
        return $this->hasMany(Bien::class);
    }
}
