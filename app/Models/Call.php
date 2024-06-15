<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
     protected $fillable = [
            'office_id',
            'department_id',
            'operation_id',
            'queue_id',
            'counter_id',
            'user_id',
            'number',
            'called_date'
        ];
    
        protected $dates = ['called_date', 'created_at', 'updated_at'];
    
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
    
        public function queue()
        {
            return $this->belongsTo(Queue::class);
        }
    
        public function counter()
        {
            return $this->belongsTo(Counter::class);
        }
    
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    }