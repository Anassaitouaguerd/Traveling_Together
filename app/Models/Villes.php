<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villes extends Model
{
    use HasFactory;
    protected $info_ville = [
        'name',
      ];
      public function gare()
      {
        return $this->hasMany(Gares::class);
      }
}