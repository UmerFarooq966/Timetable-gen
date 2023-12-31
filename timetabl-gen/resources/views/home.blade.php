@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @auth()
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as a Student!') }}

                        <div class="container">
                            <h2 class="mt-4 mb-3">Your Home Page</h2>
                            <a href="/timetable">View your timetable</a>

                            <x-card>
                                <div class="card-body">
                                    <h3 class="card-title">Enrolled Courses:</h3>

                                    @if($enrolledCourses->isNotEmpty())
                                        <div class="row">
                                            @foreach($enrolledCourses as $enrolledCourse)
                                                <div class="col-md-4 mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $enrolledCourse->course->name }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p>No enrolled courses yet.</p>
                                    @endif
                                </div>

                            </x-card>
                        </div>


                    @else
                    <p>You are not logged in</p>

                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
