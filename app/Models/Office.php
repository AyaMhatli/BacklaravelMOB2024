<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'address',
        'email',
        'phone',
        'location',
        'notification',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    // Define relationships with other models if needed

    /**
     * Get the departments for the office.
     */
    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    /**
     * Get the users for the office.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
