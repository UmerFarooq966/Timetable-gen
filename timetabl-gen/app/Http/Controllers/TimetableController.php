<?php

namespace App\Http\Controllers;

use App\Notifications\ClashNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimetableController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $enrolledCourses = $user->enrolledCourses;

        // Fetch all classes for enrolled courses
        $classes = collect();
        foreach ($enrolledCourses as $enrolledCourse) {
            $classes = $classes->merge($enrolledCourse->course->classes);
        }

        // Group classes by date and time
        $groupedClasses = $classes->groupBy(function ($class) {
            return $class->start_time->format('Y-m-d H:i');
        });

        // Check for timetable clashes
        $clashes = collect();
        foreach ($groupedClasses as $classes) {
            if ($classes->count() > 1) {
                $clashes->push($classes);
            }
        }

        // Notify user about clashes
        if ($clashes->isNotEmpty()) {
            $user->notify(new ClashNotification());
        }

        return view('timetable', compact('enrolledCourses', 'groupedClasses', 'clashes'));
    }
}


