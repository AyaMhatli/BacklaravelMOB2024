<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
        'office_id', 'department_id', 'name', 'description', 'letter', 'start', 'temps_estimer', 'catche_up_date', 'status'
    ];
  // Relation avec Office
  public function office()
  {
      return $this->belongsTo(Office::class);
  }

  // Relation avec Department
  public function department()
  {
      return $this->belongsTo(Department::class);
  }


}

