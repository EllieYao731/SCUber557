<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Records extends Model
{

    protected $fillable = ['rider', 'passenger','go_or_leave','start_time_rider', 'end_time_rider','start_time_passenger','end_time_passenger','origin','destination','success'];

    protected $casts = [
        'rider' => 'boolean',
        'passenger' => 'boolean',
        'go_or_leave' => 'boolean',
        'start_time_rider' => 'datetime',
        'end_time_rider' => 'datetime',
        'start_time_passenger' => 'datetime',
        'end_time_passenger' => 'datetime',
        'success' => 'boolean',
    ];
    public $timestamps = true;

}
