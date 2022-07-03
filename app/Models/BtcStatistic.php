<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BtcStatistic extends Model {
    use HasFactory;

    protected $fillable = ['mid', 'bid', 'ask', 'last_price', 'low', 'high', 'volume'];

}
