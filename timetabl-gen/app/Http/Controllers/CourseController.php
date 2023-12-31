<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    //show add Course time
    public function show(Course $course )
    {

        $classTimings = Classes::where('course_id', $course->id)->get();

        return view('addtime', ['course' => $course, 'classTimings' => $classTimings]);
    }




    public function storeClassTiming(Request $request, int $courseId)
    {
        $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        Classes::create([
            'course_id' => $courseId,
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            // Add other relevant fields...
        ]);

        return redirect()->route('admin.home', $courseId)
            ->with('success', 'Class timing added successfully.');
    }
}
