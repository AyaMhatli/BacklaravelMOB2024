<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
   
    protected $fillable = [
        'office_id',
        'department_id',
        'operation_id',
        'number',
        'called',
        'estimated_time'
    ];

    protected $dates = ['created_at', 'updated_at'];

    // Relationships
    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }
}
