<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;
    protected $info_reservation = [
        'dateReservation',
        'quantite',
        'user_id',
      ];
      public function user()
      {
        return $this->belongsTo(User::class);
      }
      public function voyage()
      {
        return $this->hasMany(Voyages::class);
      }
}