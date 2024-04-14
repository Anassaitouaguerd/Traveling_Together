<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trains extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'voyage_id',
    'gare_id',
  ];
  public function gare()
  {
    return $this->belongsTo(Gares::class);
  }
  public function voyage()
  {
    return $this->belongsTo(Voyages::class);
  }
}