<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyages extends Model
{
  use HasFactory;
  protected $fillable = [
    'prix',
    'gare_depart',
    'gare_arrivee',
    'reservation_id',
  ];
  public function reservation()
  {
    return $this->belongsTo(Reservations::class);
  }
  public function train()
  {
    return $this->hasMany(Trains::class);
  }
}