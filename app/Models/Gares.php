<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gares extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'ville_id'
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