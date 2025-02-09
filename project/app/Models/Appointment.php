<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'funeral_id',
        'date',
        'time',
        'attendee_name',
        // ...other fields...
    ];

    public function funeral()
    {
        return $this->belongsTo(Funeral::class);
    }
}
