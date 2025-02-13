<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    use HasFactory;

    protected $fillable = ["marca", "modelo", "color", "anio", "precio"];

    public function scopeSearch($query, $search = "")
    {
        return $query->where("marca", "like", "%" . $search . "%");
    }

    public function scopeFilter($query)
    {
        return $query->where(
            "anio",
            ">",
            "2013",
            "and",
            "precio",
            "<",
            "12000"
        );
    }
}
