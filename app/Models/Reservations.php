<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
  use HasFactory;
  protected $fillable = [
    'date_reservation',
    'user_id',
    'voyage_id',
    'token_id',
    'place',
  ];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function voyage()
  {
    return $this->belongsTo(Voyages::class);
  }
}