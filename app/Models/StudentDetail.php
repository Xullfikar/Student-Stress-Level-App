<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class StudentDetail extends Model
{
    /** @use HasFactory<\Database\Factories\StudentDetailFactory> */
    use HasFactory;

    protected $fillable = [
        'class',
        'gpa',
        'study_hours_per_day',
        'sleep_hours_per_day',
        'extracurricular_hours',
        'physical_activity_hours',
        'social_activity_hours',
        'stress_level',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    protected static function booted()
    {
        static::creating(function ($studentDetail) {
            if (Auth::check()) {
                $studentDetail->id_user = Auth::id();
            }
        });
    }
}
