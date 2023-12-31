<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function enrolledStudents()
    {
        return $this->belongsToMany(User::class, 'enrolled_courses');
    }

    public function classes()
    {
        return $this->hasMany(Classes::class);
}

}
