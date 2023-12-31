<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $user = auth()->user(); // Assuming the user is logged in
        $enrolledCourses = $user->enrolledCourses;

       // dd($enrolledCourses);
        return view('home',['enrolledCourses' =>$enrolledCourses]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        $courses = Course::all();

        return view('adminHome',['courses' => $courses]);
    }
}
