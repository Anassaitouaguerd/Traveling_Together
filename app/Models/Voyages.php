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
    'date_depart',
    'date_arrivee',
  ];
  public function reservation()
  {
    return $this->hasMany(Reservations::class, 'voyage_id');
  }
  public function train()
  {
    return $this->hasMany(Trains::class, 'voyage_id');
  }
  public function rolation_gare_depart()
  {
    return $this->belongsTo(Gares::class, 'gare_depart');
  }
  public function rolation_gare_arrivee()
  {
    return $this->belongsTo(Gares::class, 'gare_arrivee');
  }
}