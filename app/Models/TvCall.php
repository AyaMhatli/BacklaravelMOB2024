<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvCall extends Model
{
    protected $fillable = [
        'ticket', 'guichet', 'date_creation', 'status'
    ];
}
