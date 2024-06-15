<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notications extends Model
{
    protected $fillable = [
        'type', 'notifiable_id', 'notifiable_type', 'data', 'read', 'read_at'
    ];
}
