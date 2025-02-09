<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obituary extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_of_birth',
        'date_of_death',
        'biography',
        'user_id',
        'status',
        'image_path',
        'admin_notes',
        'approved_at'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'date_of_death' => 'date',
        'approved_at' => 'datetime'
    ];

    public function funeral()
    {
        return $this->hasOne(Funeral::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
