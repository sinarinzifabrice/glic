<?php

namespace App\Models;

use App\Models\Bien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeDeBien extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function typede_bien()
    {
        return $this->hasMany(Bien::class);
    }
}
