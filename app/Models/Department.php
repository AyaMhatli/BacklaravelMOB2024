<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'office_id',
        'name',
        'description',
        'letter',
        'start',
        'temps_estimer',
        'catche_up_date',
        'status',
        'Validation_Type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start' => 'integer',
        'temps_estimer' => 'string',
        'catche_up_date' => 'datetime',
    ];

    // Relations with other models

    /**
     * Get the office that owns the department.
     */
    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    /**
     * Get the users for the department.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
