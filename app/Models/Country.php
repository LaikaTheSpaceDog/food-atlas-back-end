<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Country extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'NAME', 
        'CONTINENT',
        'DISH',
        'DESCRIPTION',
        'PHOTO',
        'RECIPE'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public static function fromStrings(array $strings) : Collection
    {
        return collect($strings)->map(fn($str) => trim($str))
            ->unique()
            ->map(fn($str) => Country::firstOrCreate(["name"=>$str]));
    }
}
