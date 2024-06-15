<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentMenu extends Model
{
    protected $fillable = [
        'Name', 'Status', 'office_id'
    ];

    // Relation avec Office
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
