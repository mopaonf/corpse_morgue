<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funeral extends Model
{
    use HasFactory;

    protected $fillable = [
        'obituary_id',
        'date',
        'location',
        'details',
        // ...other fields...
    ];

    public function obituary()
    {
        return $this->belongsTo(Obituary::class);
    }
}
