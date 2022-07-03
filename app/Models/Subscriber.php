<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscriber extends Model {
    use HasFactory, Notifiable;

    protected $fillable = ['email','price_above_limit_to_be_notified'];

}
