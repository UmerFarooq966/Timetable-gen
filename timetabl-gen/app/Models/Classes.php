<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'start_time',
        'end_time',
        // Add other relevant fields...
    ];
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        // add other attributes as needed
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
