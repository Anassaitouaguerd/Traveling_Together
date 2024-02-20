<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gares extends Model
{
    use HasFactory;
    protected $info_gares = [
        'name',
        'ville_id',
        'date_depart',
        'date_arrivee',
      ];
      public function ville()
      {
        return $this->BelongsTo(Villes::class);
      }
      public function train()
      {
        return $this->hasMany(Trains::class);
      }
}