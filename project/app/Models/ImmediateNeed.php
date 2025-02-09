<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImmediateNeed extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'planning_for',
        'your_name',
        'your_email',
        'your_phone',
        'first_name',
        'last_name',
        'date_of_death',
        'gender',
        'final_disposition',
        'visitation'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
